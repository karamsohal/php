@extends('master')

@section('content')
    <h1>Edit Category Form</h1>

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @method('PATCH')
        @csrf
        @include('partials.categoriesForm', ['name' => $category->name, 'description' => $category->description, 'buttonName' => 'Update'])
    </form>

    @include('partials.errors')

@endsection
