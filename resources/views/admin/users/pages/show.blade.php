@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
   الصفحة/  <span class="text-primary">{{$page->title}}</span>
@endsection

@section('content')
<div class="col-md-8 bg-white content">
    <h2 class="my-4">{{ $page->title }}</h2>

    {!! $page->content !!}
</div>
@endsection
