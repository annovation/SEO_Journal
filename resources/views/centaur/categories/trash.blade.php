@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Trash')

@section('content')
    <div class="page-header">
            <div class='btn-toolbar pull-right'>
                    <a class="btn btn-primary btn-lg" href="{{ route('categories.index') }}">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            Back
                    </a>
                </div>
        <h1>
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            Trash
        </h1>
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
                        @forelse ($categories as $category)
                            <tr>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <a href="{{ route('categories.restore', $category) }}" type="button" class="btn btn-warning btn-xs">Restore</a>
                                        <a href="{{ route('categories.destroy', $category) }}" type="button" class="btn btn-danger btn-xs action_confirm" data-method="DELETE" data-token="{{ csrf_token() }}">Permanently Delete</a>
                                    </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan = 6 class="text-center">
                                        Trash is empty.
                                    </td>
                                </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>
@stop
