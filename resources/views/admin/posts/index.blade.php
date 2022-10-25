@extends('layouts.admin')

@section('content')
    <h2 class="text-center mb-2">List of posts</h2>
    <div class="container-fluid mb-3 text-left">
<<<<<<< HEAD
        <a class="mb-3" href="{{ route('admin.posts.create') }}">Create Post</a>
=======
        <a href="{{ route('admin.posts.create') }}">Create Post (+)</a>
>>>>>>> develop
    </div>
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Category</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Slug</th>
<<<<<<< HEAD
                    <th>Created At</th>
=======
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
>>>>>>> develop
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $p)
                    <tr scope="row">
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->content }}</td>
                        <td>{{ $p->category ? $p->category->name : 'No Category' }}</td>
                        <td>
                            @if ($p->tags)
                                <ul class="list-unstyled">
                                    @foreach ($p->tags as $tag)
                                        <li><a href="{{ route('admin.tags.show', $tag) }}">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            @else
                            'No tags'
                            @endif
                        </td>
                        <td>{{ $p->slug }}</td>
                        <td>{{ $p->created_at }}</td>
<<<<<<< HEAD
=======
                        <td>{{ $p->updated_at }}</td>
>>>>>>> develop
                        <td><a href="{{ route('admin.posts.show', $p) }}">Show</a></td>
                        <td><a href="{{ route('admin.posts.edit', $p) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $p) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
