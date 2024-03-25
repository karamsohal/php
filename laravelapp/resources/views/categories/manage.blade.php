@extends('master')

@section('content')
    <h1>Deleted Category</h1>
    @foreach($categories as $category)
        <span>Category ID: {{$category->id}}</span><br>
        <span>Name: {{$category->name}}</span><br>
        <span>Description: {{$category->description}}</span><br>
        <a href="{{route('categories.restore', $category->id)}}">
            [Restore]
        </a><br/>
        <a href="{{route('categories.forcedelete', $category->id)}}">
            [Force Delete]
        </a><br/>
    @endforeach
@endsection
