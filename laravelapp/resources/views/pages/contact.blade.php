@extends('master')

@section('content')
    <h1>Contact page</h1>
    @if(empty($email))
        <p>No email address given</p>
        @else
        <p>{{$email}}</p>
    @endif
@endsection
