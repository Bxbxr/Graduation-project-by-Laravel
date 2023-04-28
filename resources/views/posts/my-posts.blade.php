@extends('layouts.main')

@section('content')
    <div class="mx-4 ">
        <div class="row justify-content-center">
            <form class="form-inline col-md-6 justify-content-center" action="{{ route('post.search') }}" method="get">
                <input type="text" class="form-control mx-sm-3 mb-3" name="term" placeholder="ابحث هنا...">
                <button type="submit" class="btn btn-secondary bg-success mb-2 mb-3">ابحث</button>
                <hr>
                <br>
            </form>
        </div>

        <p class="my-4">{{ $title }} <a href="{{ route('main') }}">الفيديوهات</a></p>
        <div class="row bg-white">
            @forelse ($posts as $post)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card mb-4" style="height: 90%;">
                        <img class="card-img-top" src="{{ $post->image_path }}" alt="">
                        <div class="card-body">
                            <h3 class="card-title">{{ $post->title }}</h3>
                            <p class="card-text">{{ Str::limit($post->body, 70) }}</p>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">المزيد </a>
                        </div>
                        <a href="">
                            <div class="card-footer mt-1 p-2">
                                <a href="{{ route('main.channels.videos', $post->user) }}">
                                    <img src="{{ $post->user->profile_photo_url }}" class="rounded-full my-1 mr-3 d-inline"
                                        width="30">
                                    @if ($post->user->type == 'university')
                                        <span class="card-text"> {{ $post->user->name }}</span> <i
                                            class="fa fa-university"></i>
                                        {{ $post->user->name }} <a href="#"
                                            class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                        </a>
                                    @else
                                        <span class="card-text">{{ $post->user->name }} <a href="#"
                                                class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                            </a></span>
                                    @endif
                                </a>

                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="mx-auto col-8">
                    <div class="alert alert-primary text-center" role="alert">
                        لا يوجد منشورات
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
