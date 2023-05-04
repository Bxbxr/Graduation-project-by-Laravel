@extends('layouts.main')

@section('content')
<style>
    .my-container {
        width: 1600px;
        margin: 0 auto;
    }
</style>
    <div class="my-container">
        <div class="row">
            @if ($profile->type === 'university')
            <div class="col-md-3">
                <h3 class="ml-5 mt-4">التخصصات</h3>
                @include('partials.majors-list')
            </div>
            @endif


            <div class="col-md-6">
                <header class="d-flex flex-row-reverse">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <img class="img-fluid rounded-circle" width="100px" height="100px"
                                src="{{ $profile->profile_photo_url }}" alt="{{ $profile->name }}">
                            <h1 class="font-weight-light ml-3" style="white-space: nowrap;">{{ $profile->name }}</h1>
                            @if (Auth::user() != null && Auth::user()->name == $profile->name)
                                {{-- <a href="#" class="btn btn-secondary ml-3"
                                    style="white-space: nowrap;">{{ __('site.Edit Profile') }}</a> --}}
                                <a href="/post/create" class="btn btn-primary"
                                    style="white-space: nowrap;">{{ __('site.Add Post') }}</a>
                                <a href="/post/create" class="btn btn-primary mr-2"
                                    style="white-space: nowrap;">{{ __('site.Add Video') }}</a>
                            @else
                                <a href="/chatify/{{ $profile->id }}" class="btn btn-primary"
                                    style="white-space: nowrap;">مراسلة</a>
                                <!-- Livewire code here -->
                            @endif
                        </div>
                        <div class="col-12">
                            <ul class="list-inline mb-3">
                                <li class="list-inline-item mr-3">المنشورات 12</li>
                                <li class="list-inline-item mr-3"><a href="#"> {{ __('site.followers') }} 12</a></li>
                                <li class="list-inline-item mr-3"><a href="#"> {{ __('site.following') }} 7</a></li>
                            </ul>
                            <p class="font-weight-bold mb-1">{{ $profile->name }}</p>
                            <p>{{ $profile->bio }}</p>
                            <p><a href="{{ $profile->url }}" class="text-primary">{{ Str::limit($profile->url, 40) }}</a>
                            </p>
                        </div>
                    </div>
                </header>
                <hr class="my-4">
                <!-- add your content here -->
            </div>
            <div class="col-md-3">
                <h3 class="mr-5 mt-4">الطلاب</h3>
                <div style="height: 400px; overflow-y: auto;">
                    <nav class="nav flex-column bg-light mr-5">
                        @foreach ($users as $user)
                            <a class="nav-link active" href="/chatify/{{ $user->id }}">{{ $user->name }}</a>
                        @endforeach


                    </nav>
                </div>
            </div>

        </div>
    </div>
@endsection
