<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
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
        $posts = Post::orderBy('created_at', 'desc',)->orderBy('updated_at', 'desc')->get();

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
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $params = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required|unique:posts',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'
        ]);

        $p = Post::create($params);

        if(array_key_exists('tags', $params)){
            $tags = $params['tags'];
            // dd($tags);
            $p->tags()->sync($tags);
        }

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
        $tags = Tag::all();

        return view('admin.posts.edit', compact('p', 'categories', 'tags'));
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
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'
        ]);

        $p->update($params);

        if(array_key_exists('tags', $params)){
            $p->tags()->sync($params['tags']);
        }else{
            $p->tags()->detach();
        }

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


