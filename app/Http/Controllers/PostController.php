<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();
        return Inertia::render('Posts', ['posts' => $posts]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::create($validatedData);

        return redirect()->route('posts.show')->with('success', 'Post created successfully.');
    }

    public function show($id){

        $post = Post::find($id);
        return Inertia::render('Post', ['post' => $post]);
    }

    public function edit($id){

        $post = Post::find($id);
        return Inertia::render('EditPost', ['post' => $post]);
    }

    public function update(Request $request, $id){

        $post = Post::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.show', ['id' => $id])->with('success', 'Post updated successfully.');
    }
    
    public function destroy($id){

        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.show')->with('success', 'Post deleted successfully.');
    }

}
