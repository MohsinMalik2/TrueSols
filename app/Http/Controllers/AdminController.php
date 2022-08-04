<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function portfolio()
    {
        return view('admin.portfolio');
    }

    public function blogs()
    {
        return view('admin.blogs');
    }

    public function settings()
    {
        return view('admin.settings');
    }
   
}
