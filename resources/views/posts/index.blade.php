@extends('layouts.main')

@section('content')
    <p class="my-4 mx-4">{{ $titleOfThePage }} <a href="{{ route('videos.index') }}">الفيديوهات</a></p>
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-4">
                <div class="card mb-4" style="height: 100%;">
                    <img class="card-img-top" src="{{ $post->image_path }}" alt="">
                    <div class="card-body">
                        <h3 class="card-title">{{  Str::limit($post->title,30) }}</h3>
                        <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">المزيد </a>
                        @auth
                            @if ($post->user_id == auth()->user()->id || auth()->user()->administration_level > 0)
                                @if (!auth()->user()->block)
                                    @if (!auth()->user()->block)
                                        <form method="POST" action="{{ route('post.destroy', $post->id) }}"
                                            onsubmit="return confirm('هل أنت متأكد أنك تريد حذف مقطع الفيديو هذا؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="float-left"><i
                                                    class="far fa-trash-alt text-danger fa-lg"></i></button>
                                        </form>
                                        <form action="{{ route('post.edit', $post->id) }}" method="GET">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="float-left"><i
                                                    class="far fa-edit text-success fa-lg ml-3"></i></button>
                                        </form>
                                    @endif
                                @endif
                            @endif
                        @endauth
                    </div>

                    <a href="">
                        <div class="card-footer mt-1 p-2"><a href="{{ route('main.channels.videos', $post->user) }}">
                                <img src="{{ $post->user->profile_photo_url }}" class="rounded-full my-1 mr-3 d-inline"
                                    width="30">
                                @if ($post->user->type == 'university')
                                    <span class="card-text">{{ $post->user->name }}</span> <i class="fa fa-university"></i>
                                    {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                @else
                                    <span class="card-text">{{ $post->user->name }}</span>
                                    {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                @endif
                            </a></div>
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
