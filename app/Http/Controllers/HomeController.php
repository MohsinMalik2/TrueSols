<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    
    public function index() {
        $blogList = Blog::all();
        $portfolioList = Portfolio::all();
        return view('pages.index',compact('blogList','portfolioList'));
    }

    public function services() {
        return view('pages.services');
    }

    public function blogs() {
        return view('pages.blogs');
    }

    public function contactUs() {
        return view('pages.contact_us');
    }

    public function aboutUs() {
        return view('pages.about_us');
    }

    public function requestDemo(){
        return view('pages.request_demo');

    }
    public function comingSoon(){
        return view('pages.coming_soon');

    }

    public function singleBlog(){
        return view('pages.single_blog');
    }

    public function portfolio(){
        return view('pages.portfolio');
    }

    public function singlePortfolio(){
        return view('pages.single_portfolio');
    }
}
