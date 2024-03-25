@extends('master')

@section('content')
    <h1>New Category Form</h1>

    <form method="POST" action="{{ action([\App\Http\Controllers\CategoryController::class, 'store'])}}">
        @csrf
        @include('partials.categoriesForm', ['name' => '', 'description' => '', 'buttonName' => 'Submit'])
    </form>

    @include('partials.errors')

@endsection
