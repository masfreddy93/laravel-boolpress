<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
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
            'slug' => 'required|unique:posts',
            'category_id' => 'nullable|exists:categories,id'
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
        $categories = Category::all();

        return view('admin.posts.edit', compact('p', 'categories'));
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
            // 'slug' => 'required|unique:posts',
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($post),
            ],
            'category_id' => 'nullable|exists:categories,id'
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


