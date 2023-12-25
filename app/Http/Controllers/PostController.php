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

        $image_image = "";
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_image = $image->getClientOriginalName();
        }
        $post = new Post();
        $post->post_title = $request->post_title;
        $post->category_id = $request->category_id;

        $post->image = $image_image;
        $post->post_content = $request->post_content;

        $post->save();

        $this->uploadImage($request, $post->id);

        return redirect()->back()->with('message','Post Added Successfully');
    }

    public function uploadImage(Request $request, $post_id){

        if($request->hasFile('image')){
            $path = public_path("post_images/post_$post_id");

            if(! file_exists($path)){
                mkdir($path, 0777, true);
            }
            $image = $request->file('image');
            $image_image = $image->getClientOriginalName();

            $image->move($path, $image_image);
        }
    }

}
