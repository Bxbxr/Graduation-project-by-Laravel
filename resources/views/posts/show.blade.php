@extends('layouts.main')

@section('content')
    <div class="col-md-6">
        <div class="content bg-light border-2 p-5">
            <h2 class="my-4">
                {{ $post->title }}
            </h2>
            <img class="card-img-top mb-4" src="{{ $post->image_path }}" alt="">

            {{ $post->body }}

        </div>
    </div>

@endsection
