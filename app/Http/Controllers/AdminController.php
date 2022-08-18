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
        $categories = DB::table('categories')->get();
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

    
  
    /* Blog Functions */

    public function blog()
    {
        $blogList = Blog::all()->where('deleted','=',0);
        return view('admin.blog', compact('blogList'));
    }

    

    public function blog_new($id = null){
        $categories = DB::table('categories')->get();
        $user = Auth::user();
        $blog= new Blog();
        return view('admin.blog-new',compact('categories','user', 'blog')); 
    }

    public function blog_edit_form($id = null){
        $categories = DB::table('categories')->get();
        $user = Auth::user();
        $blog=Blog::firstWhere('id',$id);
        return view('admin.blog-new',compact('blog','categories','user'));
    }

    public function blog_save(Request $request)
    {   $user = Auth::user();
        $id = Auth::user()->id; 
        $newblog=new Blog;
        $newblog->title=$request->title;
        $newblog->overview=$request->overview;
        $newblog->category=$request->categories;
        $newblog->tags=$request->tags;
        $newblog->slug=$request->slug;
        $newblog->content=$request->content;
        $newblog->user()->associate($user);
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
        $newblog->user_id=$id;
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
    public function blog_edit(Request $request)
    {
        $id = Auth::user()->id;
        $blog=Blog::firstWhere('id',$request->id);
        $blog->title=$request->title;
        $blog->overview=$request->overview;
        $blog->category=$request->categories;
        $blog->slug=$request->slug;
        $blog->tags=$request->tags;
        $blog->content=$request->content;
        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->file('image')->extension();
            if($request->file('image')->storeAs('public/blog-images', $imageName))
            {
                $blog->thumbnail=$imageName;
            }
        }
        $blog->created_at=now();
        $blog->updated_at=now();
        $blog->user_id=$id;
        $blog->updated_by=$id;
        $blog->active=$request->active;
        if($blog->save())
        {
            echo 'saved';
        }else
        {
            echo 'failed';
        }
    }

    public function blog_delete($id)
    {
        $blog=Blog::firstWhere('id',$id);
        $blog->deleted=1;
        $blog->save();
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

    /*Common Funtions */


   
}
