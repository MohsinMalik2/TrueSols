<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Blog;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

    /* Portfolio Functions */
    
    public function portfolio()
    {
        $categories = DB::table('portfolio_categories')->get();
        $portfolioList = Portfolio::all();

        return view('admin.portfolio',compact('categories','portfolioList'));
    }
    public function portfolio_form(Request $request){
        if(!$request->is_active){
            $is_active = 'off';
        }
        else{
            $is_active = 'on';
        }
        $arr = $request->tags;
        $tagString =  implode(",",$arr);

        $fileName = '';
        if(isset($request->thumbnail)){
            
            $fileName = $this->imageUpload($request);
        }

        // return $fileName;
        Portfolio::create([
            'name' => $request->name,
            'description' => $request->description,
            'tags' => $tagString,
            'url' => $request->url,
            'category' => $request->category,
            'thumbnail' => $fileName,
            'is_active' => $is_active,
        ]);
        
        return redirect()->route('admin.portfolio');

    }

    /* Portfolio Functions */

    public function settings()
    {
        return view('admin.settings');
    }
  
    /* Blog Functions */

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

    /* Blog Functions */


    /*Common Funtions */

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

    public function imageUpload(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $imageName = time().'.'.$request->thumbnail->extension();  
     
        // $request->thumbnail->move(public_path('app-assets/images/portfolio-images'), $imageName);
        $request->thumbnail->storeAs('public/portfolio-images', $imageName);
        
        /* Store $imageName name in DATABASE from HERE */
        return $imageName;
    }

    public static function saveFile(Request $request)
    {
        $uniqueFileName = time().'.'.$request->thumbnail->extension();
        $filePath = THUMBNAIL_PATH . $uniqueFileName;
        Storage::put($filePath,$request->thumbnail);
        return $filePath;
    }


    function createUniqueName(){
        return time() . uniqid(rand());
    }

     /**
     * Function to get attachment  from storage
     */
    public function getFile()
    {
        return Storage::get($this->filename);
    }

    /**
     * Function to get storage path of attachment
     */
    public function getFilePath()
    {
        return Storage::path($this->filename);
    }

    /**
     * Function to destroy attachment from storage
     */
    public function destroyFile()
    {
        return Storage::delete($this->filename);
    }





    //
    public function blog_save(Request $request)
    {   
        $id = Auth::user()->id; 
        $newblog=new Blog;
        $newblog->title=$request->title;
        $newblog->category=$request->categories;
        $newblog->slug=$request->slug;
        $newblog->content=$request->content;
        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->file('image')->extension();
            if($request->file('image')->storeAs('public/blog-images', $imageName))
            {
                $newblog->thumbnail=$imageName;
            }
        }
        $newblog->created_at=now();
        $newblog->updated_at=now();
        $newblog->created_by=$id;
        $newblog->updated_by=$id;
        $newblog->active=$request->active;
        if($newblog->save())
        {
            echo 'saved';
        }else
        {
            echo 'failed';
        }
    }

    /*Common Funtions */
   
}
