@extends('master')
@section('content')
    <h1>Category</h1>
    <p>
        <span>Id: {{$category->id}}</span><br>
        <span>Name: {{$category->name}}</span><br>
        <span>Description: {{$category->description}}</span>
    </p>
    <h4>Articles:</h4>
    <p>
        @foreach($category->articles as $article)
            <span>ID: {{$article->id}}</span><br>
            <span>Name: {{$article->name}}</span><br>
            <span>Body: {{$article->body}}</span><br>
            <span>Author ID: {{$article->author_id}}</span><br><br>
        @endforeach
    </p>
@endsection
