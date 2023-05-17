@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h1 class="text-center mb-4">كل التخصصات المتوفرة</h1>
      <div class="list-group">
        @foreach ($majors as $major)
        <a href="/majors/{{ $major->id }}" target="_blank" class="list-group-item list-group-item-action ">
          <span class="d-flex justify-content-between align-items-center">
            <span class="mr-3 ">{{ $major->name }}</span>
            <span class="badge badge-primary">{{ $major->count }}</span>
          </span>
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection