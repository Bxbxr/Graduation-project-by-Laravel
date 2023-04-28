@extends('layouts.main')

@section('content')
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="col-md-6 bg-white">
            <h2 class="my-4">{{ $title }}</h2>
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="حدد عنوان الموضوع"
                        value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="body" rows="3" placeholder="محتوى الموضوع">{{ old('text') }}</textarea>
                </div>
                <div class="form-group file-area">
                    <label for="image"> ادرج صورة</label>
                    <input type="file" id="image" accept="image/*" name="image"
                        class="form-control @error('image') is-invalid @enderror">
                    <div class="input-title">اسحب الصورة إلى هنا أو انقر للاختيار يدويًا</div>

                </div>
                <button type="submit" class="btn btn-primary">أرسل </button>
            </form>
        </div>
    </div>
@endsection
