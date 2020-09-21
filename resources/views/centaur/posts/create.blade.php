@extends('Centaur::layout',['navbar' => true])

@section('title', 'Add New Article')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('Centaur::components.panel.content', [
            'class' => 'panel-default',
            'heading' => [
                'visible' => true,
                'title' => 'Add New Article'
            ],
            'body' => [
                'visible' => true,
                'component' => true,
                'content' => [
                    [
                        'component_path' => 'Centaur::components.form.posts.create',
                        'component_options' => [
                        'method' => 'POST',
                        'route' => 'posts.store',
                        'param' => false
                        ]
                    ]
                ]
            ],
            'footer' => [
                'visible' => false,
                'content' => ''
            ]
        ])

        @endcomponent
    </div>
</div>
@stop
