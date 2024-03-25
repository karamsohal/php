@extends('master')

@section('content')
    <h1>All Articles</h1>
    @foreach($articles as $article)
        <p>
            <span>ID: {{$article->id}}</span><br>
            <span>Name: {{$article->name}}</span><br>
            <span>Body: {{$article->body}}</span><br>
            <span>Author ID: {{$article->author_id}}</span>
        <form method="POST" action="{{route("articles.destroy", $article->id)}}">
            @csrf
            @method("DELETE")
            <input type="submit" value="Delete"/>
        </form>
        </p>
    @endforeach
    <div>
        {{ $articles->links() }}
    </div>
@endsection
