@extends('master')

@section('content')
    <h1>All Category</h1>
    @foreach($categories as $category)
        <p>
            <span>ID: {{$category->id}}</span><br>
            <span>Name: {{$category->name}}</span><br>
            <span>Description: {{$category->description}}</span><br>
        </p>
        <form method="POST" action="{{route("categories.destroy", $category->id)}}">
            @csrf
            @method("DELETE")
            <input type="submit" value="Delete"/>
        </form>
    @endforeach
@endsection
