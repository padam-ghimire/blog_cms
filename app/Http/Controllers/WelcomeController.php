<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;

class WelcomeController extends Controller
{
    //
    public function index(Request $request){
        if($request->query('search')){
            $posts =Post::where('title','LIKE',"%{$request->query('search')}%")->simplePaginate(1);
        }else{
            $posts= Post::paginate(2);
        }
        return view('welcome')
        ->with('categories',Category::all())
        ->with('tags',Tag::all())
        ->with('posts',$posts);
        
    }
}
