<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
         return view('admin.settings',compact('user'));
    }

    public function form_submit(Request $request){

        $user=Auth::user();
        
        $user->name=$request->name;
        $user->tagline=$request->tagline;
        $user->content=$request->content;
        $user->github=$request->github;
        $user->linkedIn=$request->linkedIn;
        $user->facebook=$request->facebook;
        $user->twitter=$request->twitter;

        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->file('image')->extension();
            if($request->file('image')->storeAs('public/profile-images', $imageName))
            {
                $user->image=$imageName;
            }
        }


        if($user->save())
        {
            echo 'saved';
        }else
        {
            echo 'failed';
        }

    }

    public function imageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->thumbnail->move(public_path('app-assets/images/portfolio-images'), $imageName);
        $request->image->storeAs('public/profile-images', $imageName);
        
        /* Store $imageName name in DATABASE from HERE */
        return $imageName;

    }




}
