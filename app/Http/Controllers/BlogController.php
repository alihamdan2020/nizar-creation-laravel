<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\blogs;
use App\Models\portfolio;


class BlogController extends Controller
{
    public function index(){
        $blogs=DB::table('blogs')->get();
        $portfolio=DB::table('portfolios')->get();
        return view ('Blog.blog',['allBlogs'=>$blogs],['allportfolio'=>$portfolio]);
    }

    public function addBlogs(request $req){
        $blog = new blogs();
        
        $blogImageName = $req->file('blogImage')->getClientOriginalName();
        $req->file('blogImage')->move(public_path('images'), $req->file('blogImage')->getClientOriginalName());
        
        $blog->blogTitle=$req->input('blogTitle');
        $blog->blogText=$req->input('blogText');
        $blog->blogImage=$blogImageName;

        $blog->save();
        return redirect()->back()->with("message",true);
    }
}
