@component('Centaur::components.form.main', [
    'id'        => $id ?? '',
    'name'      => $name ?? '',
    'class'     => $class ?? '',
    'method'    => $method ?? '',
    'param'     => $param ?? '',
    'route'     => $route ?? ''
])
    @slot('csrf')
        @csrf
    @endslot
    @slot('elements')
        <div class="form-group @error('category_name') has-error @enderror">
            <label for="category_name">Category Name*</label>
            <input class="form-control" name="category_name" id="category_name" type="text" value="{{ old('category_name') }}">
            @error('category_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <p style="padding-bottom: 5%;">* Mandatory data</p>
    @endslot
    @slot('buttons')
        <div class="col-md-12">
            <div class ="col-md-5">
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Create">
            </div>
            <div class ="col-md-5 col-md-offset-2">
                <a href="{{ route('categories.index') }}" type="button" class="btn btn-lg btn-warning btn-block">Cancel</a>
            </div>
        </div>
    @endslot
@endcomponent
