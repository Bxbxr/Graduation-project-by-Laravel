@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>{{ $major->name }}</h1>
        <p>{{ $major->description }}</p>
    </div>
    @foreach ($major->userss as $user)
        <li>{{ $user->name }}</li>
    @endforeach
@endsection