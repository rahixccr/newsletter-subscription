<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Site;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
    
        $request->validate([
            'id_site' => 'required|exists:sites,id',
            'title' => 'required|string|max:191',
            'body' => 'required|string',
        ]);
       
        $post = Post::create([
            'id_site' => $request->id_site,
            'title' => $request->title,
            'body' => $request->body,
        ]);

       
        return response()->json([
            'message' => 'Post created successfully.',
            'data' => $post
        ], 201);
    }
    public function index()
    {
        return "api route test";
    }
}
