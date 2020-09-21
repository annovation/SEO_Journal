<form
    role="form"
    accept-charset="UTF-8"
    id="{{ $id ?? '' }}"
    name="{{ $name ?? '' }}"
    class="{{ $class ?? '' }}"
    method="{{ $method ?? '' }}"
    action="{{ $param ? route($route, $param, $categories) : route($route, $categories) }}"
    enctype = "{{ $enctype ?? 'application/x-www-form-urlencoded'}}"
>
    {{ $csrf ?? '' }}
    {{ $elements ?? '' }}
    {{ $hidden ?? ''}}
    {{ $buttons ?? '' }}

</form>

<!--Kreira se main komponenta koja sadrži slotove, a onda se složi content koji se prosljeđuje u ovu main komponentu-->
