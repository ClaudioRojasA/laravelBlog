<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function Index(){

        return view('index');
    
    }

    public function add(){

        return view('admin.posts.add');
    
    }

}
