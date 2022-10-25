<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag){

        $posts = Post::all();

        return view('admin.tags.show', compact('tag', 'posts'));

    }
}
