@extends('Centaur::layout',['navbar' => true])

@section('title', 'Show Post')

@section('content')
<div class="row">
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
    </div>
    <h2>{{$post->post_title }}</h2>
    <div>Category: {{ $post->category->category_name }}</div><br></div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="table-responsive"><div>
                    <div>{{ $post->short_description }}</div><br>
                    <div><p>{!!  $post->description !!}</p></div><br>
                </div>
            </div>
        </div>
    </div>
@stop
