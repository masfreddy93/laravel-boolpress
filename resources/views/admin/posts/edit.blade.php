@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Post</h2>
        <form action="{{route('admin.posts.update', $p)}}" method="POST">
            @csrf
            @method('PUT')

            <p>
                {{-- <label for="title">Title</label> --}}
                <input type="text" id="name" name="title" placeholder="Title" value="{{ $p->title }}">
                @error('title')
                    <div style="color:red; font-size:12px"> {{ $message }} </div>
                @enderror
            </p>

            <p>
                {{-- <label for="content">Content</label> --}}
                <input type="textarea" id="content" name="content" placeholder="Content" value="{{ $p->content }}">
                @error('content')
                    <div style="color:red; font-size:12px"> {{ $message }} </div>
                @enderror
            </p>

            <p>
                {{-- <label for="slug">Slug</label> --}}
                <input type="text" id="slug" name="slug" placeholder="Slug" value="{{ $p->slug }}">
                @error('slug')
                    <div style="color:red; font-size:12px"> {{ $message }} </div>
                @enderror
            </p>

            <input type="submit" value="Invia">
        </form>
    </div>
@endsection