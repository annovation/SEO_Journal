@extends('Centaur::layout')

@section('title', 'SEO Journal')

@section('content')
<div class="row">
                        @foreach ($posts as $post)
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="card bg-light mb-3" style="width: 45rem;">
                                <img class="card-img-top" src="..." alt="Image alt title">
                                <div class="card-header">{{ $post->category_id }}</div>
                                <div class="card-body">
                                  <h2 class="card-title">{{ $post->post_title }}</h2>
                                  <p class="card-text">{{ $post->short_description }}</p>
                                  <a href="#" class="btn btn-primary">Read more</a>
                                </div>
                              </div>
                            </div>
                        @endforeach
                {{$posts->links()}}
            </div>
@stop
