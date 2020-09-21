@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Categories')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
                <a class="btn btn-primary btn-lg" href="{{ route('categories.trash') }}">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        Trash
                    </a>
                <a class="btn btn-primary btn-lg" href="{{ route('categories.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Add New Category
                </a>
        </div>
        <h1>Categories</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category) }}" type="button" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="{{ route('categories.destroy', $category) }}" type="button" class="btn btn-danger btn-xs action_confirm" data-method="DELETE" data-token="{{ csrf_token() }}">Delete</a>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>
@stop
