@extends('layouts.main')

@section('content')
    <div class="mx-4 ">
        <div class="row justify-content-center">
            <form class="form-inline col-md-6 justify-content-center" action="{{ route('video.search') }}" method="GET">
                <input type="text" class="form-control mx-sm-3 mb-3" name="term" placeholder="ابحث هنا...">
                <button type="submit" class="btn btn-secondary bg-success mb-2 mb-3">ابحث</button>
                <hr>
                <br>
            </form>
        </div>

        <p class="my-4">{{ $title }}  <a href="{{ route('all.posts') }}">   المنشورات الأخرى   </a></p>
        <div class="row">
            @forelse($videos as $video)
                @if ($video->processed)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card mb-3" >
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
                                </small>
                            </div>
                            <a href="{{ route('main.channels.videos', $video->user) }}">
                                <img src="{{ $video->user->profile_photo_url }}" class="rounded-full my-1 mr-3 d-inline"
                                    width="30">
                                @if ($video->user->type == 'university')
                                    <span class="card-text">{{ $video->user->name }}</span> <i
                                        class="fa fa-university"></i>
                                @else
                                    <span class="card-text">{{ $video->user->name }}
                                @endif
                            </a>
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

@section('script')
    <script>
        $('.nav-link').click(function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });
    </script>
@endsection
