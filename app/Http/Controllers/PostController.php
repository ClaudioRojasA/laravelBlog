<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function Index(){

        return view('index');
    
    }

    public function add(){

        return view('admin.posts.add');
    
    }

    public function store(Request $request){

        $post = new Post();
        $post->post_title = $request->post_title;
        $post->category_id = $request->category_id;
        //$post->image = $request->image;
        $post->post_content = $request->post_content;

        $post->save();

        return redirect()->back()->with('message','Post Added Successfully');
    }

}
