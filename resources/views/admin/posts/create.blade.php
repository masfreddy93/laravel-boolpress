@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-4">Create Post</h2>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <p>
                <input type="file" id="image" name="image" id="image" class="@error('image') is-invalid @endif">
                {{-- <label for="image">Choose Image</label> --}}
                @error('image')
                    <div style="color:red; font-size:12px"> {{ $message }} </div>
                @enderror
            </p>

            <p>
                {{-- <label for="title">Title</label> --}}
                <input type="text" id="name" name="title" placeholder="Title" value="{{ old('title') }}">
                @error('title')
                    <div style="color:red; font-size:12px"> {{ $message }} </div>
                @enderror
            </p>

            <p>
                {{-- <label for="content">Content</label> --}}
                <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                @error('content')
                    <div style="color:red; font-size:12px"> {{ $message }} </div>
                @enderror
            </p>

            <p>
                {{-- <label for="slug">Slug</label> --}}
                <input type="text" id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}">
                @error('slug')
                    <div style="color:red; font-size:12px"> {{ $message }} </div>
                @enderror
            </p>

            <p>
                {{-- <label for="slug">Slug</label> --}}
                <select name="category_id" id="category_id">
                    <option selected value="">No Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div style="color:red; font-size:12px"> {{ $message }} </div>
                @enderror
            </p>

            <p>
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="tags[]" type="checkbox" @if(in_array($tag->id, old(('tags'), []))) checked @endif id="tag-{{ $tag->id }}" value="{{ $tag->id }}">
                        <label class="form-check-label" for="tag-{{ $tag->id }}"> {{ $tag->name }} </label>
                    </div>
                @endforeach
            {{-- @error('tags.*')
                    <div style="color:red; font-size:12px"> {{ $message }} </div>
            @enderror --}}
            </p>

            
            <input type="submit" value="Invia">
        </form>
    </div>
@endsection
