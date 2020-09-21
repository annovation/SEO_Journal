@extends('Centaur::layout',['navbar' => true])

@section('title', 'Add New Category')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('Centaur::components.panel.content', [
            'class' => 'panel-default',
            'heading' => [
                'visible' => true,
                'title' => 'Add New Category'
            ],
            'body' => [
                'visible' => true,
                'component' => true,
                'content' => [
                    [
                        'component_path' => 'Centaur::components.form.categories.create',
                        'component_options' => [
                        'method' => 'POST',
                        'route' => 'categories.store',
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
