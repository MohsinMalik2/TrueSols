<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Blog;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Intervention\Image\Facades\Image;

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

    public function portfolio_form(Request $request){

        Portfolio::create($request->all());
        return redirect()->route('admin.portfolio');

    }

    public function blog()
    {
        $blogList = Blog::all();
        // return $blogList;
        return view('admin.blog', compact('blogList'));
    }

    public function blog_new(){

        return view('admin.blog-new');

    }

    public function blog_form(Request $request){

        $fileName = '';

        if(isset($request->thumbnail)){
            
            $fileName = $this->file_upload($request);
        }
           
        
        Blog::create([
            'name' => $request->name,
            'description' => $request->description,
            'tags' => $request->tags,
            'thumbnail' => $fileName,
            'attachments' => $request->attachments,

        ]);

        return redirect()->route('admin.blog');

    }

    public function file_upload(Request $request)
    {
        $request->validate([
            
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]);

        $imageName = time().'.'.$request->thumbnail->extension(); 
       
        $request->thumbnail->move(public_path('blog-thumbnail-images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        return $imageName; 

    }

    
   
}
