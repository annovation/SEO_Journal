@extends('Centaur::layout')

@section('title', 'SEO Journal')

@section('content')

<div class="row">

    @if (Sentinel::check())
    <div class="jumbotron">
        <h1>Hello, {{ Sentinel::getUser()->email }}!</h1>
        <p>You are now logged in.</p>
    </div>
    @else
        <div class="jumbotron">
            <h1>Welcome to SEO Journal</h1>
            <p>Get all the latest news from SEO world in one place.</p>
        </div>
    @endif

    @foreach ($posts as $post)
        <div class="col-sm-6 col-md-4">
           <div class="thumbnail">
                <!--<img src="..." alt="...">-->
             <div class="caption">
               <h3>{{$post->post_title}}</h3>
               <h5>Category: {{ $post->category->category_name }}</h5>
               <p>{{$post->short_description}}</p>
               <p><a href="{{ route('posts.show', $post) }}" class="btn btn-primary" role="button">Read more</a></p>
             </div>
           </div>
        </div>
    @endforeach
    {{$posts->links()}}
</div>
@stop
