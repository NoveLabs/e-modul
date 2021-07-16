<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EksplanasiController extends Controller
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
        return view('eksplanasi.index');
    }

    public function indexTujuan()
    {
        return view('eksplanasi.tujuan');
    }

}
