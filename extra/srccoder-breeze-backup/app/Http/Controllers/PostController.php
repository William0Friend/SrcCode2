<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

    //         return
    //           Post::latest()->filter(request(['search', 'category', 'author']))->paginate(5);
    // }
        return view('posts.index', [
            // dd(request(['search'])),
            // dd(request->only('search')),
            //4 queries n+1 problem
            //'posts' => Post::all()
            //2 queries only
            //'posts' => Post::latest('published_at')->with('category','author')->get()
            //eager load as part of a new query to solve n+1 problem
            //'posts' => Post::latest()->with(['category','author'])->get()
            //->get() executes the built query
            'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
            // 'categories' => Category::all(),
            // 'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }

    public function show(Post $post){
            return view('posts.show', [
                'post' => $post
        ]);
    }

//     public function getPosts(){
//         //filter posts by user results
//         return Post::latest()->filter()->get();
//     }
 }
