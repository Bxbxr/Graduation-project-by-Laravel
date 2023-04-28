@extends('layouts.main')

@section('content')
    <div class="mx-4">
        <h6 class="my-4 ">{{ $title }} <a href="{{ route('posts') }}"> المنشورات الأجرى </a></h6>
        <div class="row">
            @forelse($videos as $video)
                @if ($video->processed)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-icons">
                                @php
                                    $hours_add_zero = sprintf('%02d', $video->hours);
                                @endphp
                                @php
                                    $minutes_add_zero = sprintf('%02d', $video->minutes);
                                @endphp
                                @php
                                    $seconds_add_zero = sprintf('%02d', $video->seconds);
                                @endphp
                                <a href="/videos/{{ $video->id }}">
                                    <img src="{{ Storage::url($video->image_path) }}" class="card-img-top" alt="...">
                                    <time>{{ $video->hours > 0 ? $hours_add_zero . ':' : '' }}{{ $minutes_add_zero }}:{{ $seconds_add_zero }}</time>
                                    <i class="fas fa-play fa-2x"></i>
                                </a>
                            </div>
                            <a href="/videos/{{ $video->id }}">
                                <div class="card-body pr-2 pt-1 pb-0">
                                    <p class="card-title">{{ Str::limit($video->title, 60) }}</p>
                                </div>
                            </a>
                            <div class="card-footer">
                                <small class="text-muted">
                                    @foreach ($video->views as $view)
                                        <span class="d-block"><i class="fas fa-eye"></i> {{ $view->views_number }}
                                            مشاهدة </span>
                                    @endforeach
                                    <i class="fas fa-clock"></i> <span>{{ $video->created_at->diffForHumans() }}</span>

                                    @auth
                                        @if ($video->user_id == auth()->user()->id || auth()->user()->administration_level > 0)
                                            @if (!auth()->user()->block)
                                                @if (!auth()->user()->block)
                                                    <form method="POST" action="{{ route('videos.destroy', $video->id) }}"
                                                        onsubmit="return confirm('هل أنت متأكد أنك تريد حذف مقطع الفيديو هذا؟')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="float-left"><i
                                                                class="far fa-trash-alt text-danger fa-lg"></i></button>
                                                    </form>
                                                    <form action="{{ route('videos.edit', $video->id) }}" method="GET">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="float-left"><i
                                                                class="far fa-edit text-success fa-lg ml-3"></i></button>
                                                    </form>
                                                @endif
                                            @endif
                                        @endif
                                    @endauth
                                </small>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="mx-auto col-8">
                    <div class="alert alert-primary text-center" role="alert">
                        لا يوجد فيديوهات
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
