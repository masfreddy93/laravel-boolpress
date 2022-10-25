@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="">
            <h2 class="mb-5">Tag Name: {{ $tag->name }}</h2>
            <h3 class="mb-3">List of Posts</h3>
            <ul class=" list-unstyled">
                @foreach ($posts as $p)
                    <li class="">
                        <p>Title-> <a href="{{ route('admin.posts.show', $p) }}">{{ $p->title }}</a></p>
                        <p>Content-> {{ $p->content }}</p>
                    </li>
                    <br>
                @endforeach
                </ul>
        </div>
    </div>
@endsection