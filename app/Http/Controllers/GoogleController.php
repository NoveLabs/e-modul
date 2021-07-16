<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
 
class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
 
    public function callback(Request $request)
    {
        try {
            $oauthUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // jika user masih login lempar ke home
        if (Auth::check()) {
            return redirect('/login');
        }
        $user = User::where('google_id', $oauthUser->id)->first();
        if ($user) {
            // dd($user);
            Auth::loginUsingId($user->id);
            return view('siswa.index');

        } else {
            $newUser = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'google_id'=> $oauthUser->id,
                // password tidak akan digunakan ;)
                'password' => md5($oauthUser->token),

            ]);
            $newUser->roles()->attach(2);

            Auth::login($newUser);
            return view('siswa.index');
        }

        // if ($request->user()->hasRole('guru')){
        //     $user = User::where('google_id', $oauthUser->id)->first();
        //     if ($user) {
        //         Auth::loginUsingId($user->id);
        //         return view('guru.index');

        //     } else {
        //         $newUser = User::create([
        //             'name' => $oauthUser->name,
        //             'email' => $oauthUser->email,
        //             'google_id'=> $oauthUser->id,
        //             // password tidak akan digunakan ;)
        //             'password' => md5($oauthUser->token),

        //         ]);
        //         $newUser->roles()->attach(Role::where('role_name', 'guru')->first());

        //         Auth::login($newUser);
        //         return view('guru.index');
        //     }

        // }

       
    }
}