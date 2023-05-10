@extends('layouts.main')

@section('content')

    <div class="container">
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
                            <img class="img-fluid rounded-circle m-4 border border-primary" width="100px" height="100px"
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
                            <ul class="list-inline mb-3" style="font-size: 19px;  color: #3d7bbe;">
                                <li class="list-inline-item mr-2"><span class="font-weight-bold">المنشورات: </span> 1 </li>
                                @if ($profile->type === 'student')
                                    <li class="list-inline-item mr-3"><a href="#"
                                            style="color: #3d7bbe; text-decoration: none;"><i
                                                class="fa fa-folder-open mr-2"></i><span
                                                style="margin-right: 5px;">{{ $profile->major->name }}</span></a></li>

                                    <li class="list-inline-item mr-3"><a href="#"
                                            style="color: #3d7bbe; text-decoration: none;"><i
                                                class="fa fa-graduation-cap mr-2"></i><span
                                                style="margin-right: 5px;">{{ $profile->level->name }}</span></a></li>
                                @endif
                                <select name="post-num" class="mr-3"
                                    style="color: #3d7bbe; font-size: 19px;  border: none;">
                                    <option value="#" selected disabled>الصفحات</option>
                                    <option></option>

                                </select>
                                </li>

                            </ul>


                            <p class="mr-3"><span style="color: rgb(51, 83, 187);"> البايو:</span>
                                {{ Str::limit($profile->bio, 150) }}
                            </p>
                            <p class="mr-3"><a href="{{ $profile->url }}" class="text-primary">زورو موقعنا الإلكتروني
                                    {{ $profile->url }}</a></p>


                        </div>
                    </div>
                </header>
                <hr class="my-4">
                <div class="row w-100">
                    @forelse($videos as $video)
                        @if ($video->processed)
                            <div class="col-sm-6 px-1">
                                <div class="card mb-1">
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
                                            <img src="{{ Storage::url($video->image_path) }}" class="card-img-top"
                                                alt="...">
                                            <time>{{ $video->hours > 0 ? $hours_add_zero . ':' : '' }}{{ $minutes_add_zero }}:{{ $seconds_add_zero }}</time>
                                            <i class="fas fa-play fa-2x"></i>
                                        </a>
                                    </div>
                                    <a href="/videos/{{ $video->id }}">
                                        <div class="card-body pr-2 pt-1 pb-0">
                                            <p class="card-title">{{ Str::limit($video->title, 60) }}</p>
                                        </div>
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
                <!-- add your content here -->
            </div>
            @if ($profile->type === 'university')
                <div class="col-md-3">
                    <h3 class="mr-5 mt-4">الطلاب</h3>
                    <div style="height: 400px; overflow-y: auto;">
                        <nav class="nav flex-column bg-light mr-5">
                            @foreach ($users as $user)
                                <a class="nav-link active" href="{{ route('user.profile',$user->id) }}">{{ $user->name }}</a>
                            @endforeach


                        </nav>
                    </div>
                </div>
            @endif

        </div>
    </div>



@endsection
