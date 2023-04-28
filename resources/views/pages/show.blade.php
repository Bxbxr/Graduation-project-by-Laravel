@extends('layouts.main')

@section('content')
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="col-md-6 bg-light">

            <div class="content bg-light p-5">
                <h2 class="my-4">
                    {{ $page->title }}
                </h2>

                {!! $page->content !!}

            </div>

        </div>
    </div>
@endsection
