@extends('layouts.admin')

@section('content')
    <div class="container p-2">
        <h2 class="mb-5">Post</h2>
        <h4>Title</h4>
        <p class="font-italic">{{ $p->title }}</p>

        <h4>Content</h4>
        <p class="font-italic">{{ $p->content }}</p>

        <h4>Slug</h4>
        <p class="font-italic">{{ $p->slug }}</p>

        <h4>Category</h4>
        <p class="font-italic">{{ $p->category ? $p->category->name : 'No category' }}</p>
    </div>
    <div class="container mt-4">
        <a href="{{ route('admin.posts.edit', $p) }}">Edit</a>

        <form class="d-inline ml-3" action="{{ route('admin.posts.destroy', $p) }}" method="POST">
            @csrf
            @method('DELETE')

            <input type="submit" value="Delete">
        </form>

    </div>
@endsection
