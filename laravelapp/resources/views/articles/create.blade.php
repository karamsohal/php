@extends('master')

@section('content')
    <h1>New Article</h1>

    {{-- Note the addition of enctype="multipart/form-data" for file upload --}}
    <form method="POST" action="{{ action([\App\Http\Controllers\ArticleController::class, 'store'])}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <label for="name">Name:</label>
        <input name="name" type="text"><br>

        <label for="body">Body:</label>
        <input name="body" type="text"><br>

        <label for="category_id">Gallery</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br>

        <label for="tags">Tags:</label>
        <select name="tags[]" >
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select><br>

        {{-- File input for image upload --}}
        <label for="file">Image:</label>
        <input type="file" name="file" id="file"><br>

        <input type="submit" value="Create"><br>
    </form>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
@endsection
