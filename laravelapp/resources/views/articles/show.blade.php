@extends('master')

@section('content')
    <h1>Article #{{ $article->id }}</h1>
    <p>Name: {{ $article->name }}</p>
    <p>Body: {{ $article->body }}</p>
    <p>Author ID: {{ $article->author_id }}</p>

    {{-- Display the image if it exists --}}
    @if($article->file)
        <div>
            <h3>Image:</h3>
            <img src="{{ asset('storage/' . $article->file) }}" alt="Article Image" style="">
        </div>
    @endif

    <h3>Belongs to</h3>
    <p>Category: {{ $article->category->name }}</p>
    <p>Description: {{ $article->category->description }}</p>

    <h3>Tags:</h3>
    <ul>
        @foreach($article->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
@endsection
