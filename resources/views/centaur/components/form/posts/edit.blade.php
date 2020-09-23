@component('Centaur::components.form.main', [
    'id'        => $id ?? '',
    'name'      => $name ?? '',
    'class'     => $class ?? '',
    'method'    => $method ?? '',
    'param'     => $param ?? '',
    'route'     => $route ?? '',
    'categories' => $categories ?? ''
])
    @slot('csrf')
        @csrf
    @endslot
    @slot('elements')
    <div class="form-group @error('post_title') has-error @enderror">
            <label for="post_title">Article Title*</label>
            <input class="form-control" name="post_title" id="post_title" type="text" value="{{ $param->post_title }}">
            @error('post_title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('short_description') has-error @enderror">
                <label for="short_description">Short description*</label>
                <input class="form-control" name="short_description" id="short_description" type="text" value="{{ $param->short_description }}">
                @error('short_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>

        <div class="form-group @error('description') has-error @enderror">
                <label for="description">Description*</label>
                <input class="form-control" name="description" id="description" type="text" value="{{ $param->description }}">
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>

        <div class="form-group @error('category_id') has-error @enderror">
                <label for="category_id">Choose category*</label>
                <select class="form-control" name="category_id" value="{{ old('category_id') }}">
                    <option>Select category</option>
                    @foreach($categories as $category_id => $category)
                        <option value="{{ $category_id }}">
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>

        <p style="padding-bottom: 5%;">* Mandatory data</p>
    @endslot
    @slot('hidden')
        @method('PUT')
    @endslot
    @slot('buttons')
        <div class="col-md-12">
            <div class ="col-md-5">
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Save changes">
            </div>
            <div class ="col-md-5 col-md-offset-2">
                <a href="{{ route('posts.index') }}" type="button" class="btn btn-lg btn-warning btn-block">Cancel</a>
            </div>
        </div>
    @endslot
@endcomponent
