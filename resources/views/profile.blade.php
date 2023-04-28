@extends('layouts.main')

@section('content')
    <div class="container">
        <header class="d-flex flex-row-reverse">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <img class="img-fluid rounded-circle" width="100px" height="100px" src="{{ $profile->profile_photo_url }}"
                        alt="{{ $profile->name }}">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <h1 class="font-weight-light ml-3" style="white-space: nowrap;">{{ $profile->name }}</h1>
                            @if (Auth::user() != null && Auth::user()->name == $profile->name)
                                <a href="#" class="btn btn-secondary ml-3"
                                    style="white-space: nowrap;">{{ __('site.Edit Profile') }}</a>
                                <a href="/posts/create" class="btn btn-primary"
                                    style="white-space: nowrap;">{{ __('site.Add Post') }}</a>
                            @else
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
                </div>
            </div>
        </header>
        <hr class="my-4">
    </div>
    
@endsection
