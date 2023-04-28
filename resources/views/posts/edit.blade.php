@extends('layouts.main')

@section('content')
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="col-md-6 bg-white">
            <h2 class="my-4">تعديل مشاركة </h2>

            <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="حدد عنوان الموضوع"
                        value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="body" rows="5" placeholder="محتوى الموضوع">{{ $post->body }}</textarea>
                </div>
                <div class="form-group file-area">
                    <label for="image"> اختر صورة تتعلق بالموضوع </label>
                    <img name="image" accept="image/*" id="image" class="form-control w-25 h-25"
                        src="{{ $post->image_path }}">
                    <input type="file" id="image" accept="image/*" name="image"
                        class="form-control @error('image') is-invalid @enderror">
                        <div class="input-title">اسحب الصورة إلى هنا أو انقر للاختيار يدويًا</div>
                </div>
                <button type="submit" class="btn btn-primary">تحديث </button>
            </form>
        </div>
    </div>
@endsection
