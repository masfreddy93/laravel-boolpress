<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $params = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
        ]);

        $p = Post::create($params);

        return redirect()->route('admin.posts.show', $p);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $p = Post::findOrFail($post);

        return view('admin.posts.show', compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $p = Post::findOrFail($post);

        return view('admin.posts.edit', compact('p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {   
        $p = Post::findOrFail($post);

        $params = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
        ]);

        $p->update($params);

        return redirect()->route('admin.posts.show', $p);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $p = Post::findOrFail($post);

        $p->delete();

        return redirect()->route('admin.posts.index');
    }
}
