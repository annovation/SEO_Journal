@component('Centaur::components.panel.main', ['class' => $class ?? null])
    @if ($heading['visible'])
        @slot('panelHeading')
            <div class='panel-heading'>
                <h3 class='panel-title'>{{ $heading['title'] }}</h3>
            </div>
        @endslot
    @endif
    @if($body['visible'])
        @slot('panelBody')
            <div class='panel-body'>
                @if ($body['component'])
                    @if (array_key_exists(1, $body['content']))
                        @foreach ($body['content'] as $item)
                            @component($item['component_path'], $item['component_options'])

                            @endcomponent
                        @endforeach
                    @else
                        @component($body['content'][0]['component_path'], $body['content'][0]['component_options'])

                        @endcomponent
                    @endif
                @else
                    {!! $body['content'] !!}
                @endif
            </div>
        @endslot
    @endif
    @if($footer['visible'])
        @slot('panelFooter')
            <div class='panel-footer'>
                {!! $footer['content'] !!}
            </div>
        @endslot
    @endif
@endcomponent
