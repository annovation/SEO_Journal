@extends('Centaur::layout',['navbar' => true])

@section('title', 'Edit Category')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('Centaur::components.panel.content', [
            'class' => 'panel-default',
            'heading' => [
                'visible' => true,
                'title' => 'Edit Category'
            ],
            'body' => [
                'visible' => true,
                'component' => true,
                'content' => [
                    [
                        'component_path' => 'Centaur::components.form.categories.edit',
                        'component_options' => [
                        'method' => 'POST',
                        'route' => 'categories.update',
                        'param' => $category
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
