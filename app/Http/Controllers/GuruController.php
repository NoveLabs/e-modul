<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class GuruController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $model;

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:ROLE_GURU');
        $this->model = new User();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $name = Auth::user()->name;
        return view('guru.index', compact('name'));
    }

    public function profile()
    {
        $name = Auth::user()->name;
        $nama_sekolah = Auth::user()->nama_sekolah;
        $email = Auth::user()->email;

        return view('guru.profile', compact('name', 'nama_sekolah', 'email'));
    }

    public function profile_edit()
    {
        $data = Auth::user()->all();

        // dd($data[0]->name);

        return view('guru.edit_profile', compact('data'));
    }

    public function profilePost(Request $request)
    {
        $data = $request->all();

        $find_data = $this->model->getSingleData($data['id']);

        $find_data->name = $data['name'];
        $find_data->nama_sekolah = $data['nama_sekolah'];
        $find_data->email = $data['email'];
        if($data['password'] != null) {
            $find_data->password = Hash::make($data['password']);
        }

        $find_data->save();

        return redirect('/profile/guru');
    }
}
