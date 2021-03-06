@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Posts')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
                <a class="btn btn-primary btn-lg" href="{{ route('posts.trash') }}">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        Trash
                    </a>
                <a class="btn btn-primary btn-lg" href="{{ route('posts.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Add New Post
                </a>
        </div>
        <h1>Posts</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Post Title</th>
                            <th>Short Description</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                    <td><b>{{ $post->post_title }}</b></td>
                                    <td>{{ $post->short_description }}</td>
                                    <td><b>{{ $post->category->category_name }}</b></td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post) }}" type="button" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="{{ route('posts.destroy', $post) }}" type="button" class="btn btn-danger btn-xs action_confirm" data-method="DELETE" data-token="{{ csrf_token() }}">Delete</a>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop
