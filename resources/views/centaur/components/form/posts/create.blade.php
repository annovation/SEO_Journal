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
            <input class="form-control" name="post_title" id="post_title" type="text" value="{{ old('post_title') }}">
            @error('post_title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('short_description') has-error @enderror">
                <label for="short_description">Excerpt*</label> - up to 250 characters max.
                <textarea class="form-control" name="short_description" id="short_description" value="{{ old('short_description') }}"></textarea>
                @error('short_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>

        <div class="form-group @error('description') has-error @enderror">
                <label for="description">Article text*</label>
                <textarea class="form-control tinymce-editor" name="description" id="description" type="text" value="{{ old('description') }}"></textarea>
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
    @slot('buttons')
        <div class="col-md-12">
            <div class ="col-md-5">
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Create">
            </div>
            <div class ="col-md-5 col-md-offset-2">
                <a href="{{ route('posts.index') }}" type="button" class="btn btn-lg btn-warning btn-block">Cancel</a>
            </div>
        </div>
    @endslot
@endcomponent

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 100,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>
