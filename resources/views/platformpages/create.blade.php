@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    إنشاء صفحة
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>
            </div>
            <div class="card-body">
                <div class="container">
                    <form method="POST" action="{{ route('platformpage.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-5 form-group">
                            <label for="title">عنوان الصفحة </label>
                            <input type="text" class="form-control" name="title" value=""
                                placeholder="مثال: About">
                        </div>

                        {{-- <div class="col-lg-5 form-group">
                            <label for="title"> الوصف </label>
                            <input type="text" class="form-control" name="title" value=""
                                placeholder="مثال: نبذة عنا ">
                        </div> --}}

                        <div class="col-lg-12 form-group">
                            <label for="body"> المحتوى </label>
                            <textarea name="content" class="form-control flor" id="flor"></textarea>
                        </div>
                        <input type="hidden" name="user_id" id="" value="{{ auth()->user()->id }}">
                        <div class="col-lg-12 form-group">
                            <button type="submit" class="btn btn-primary mt-3">إنشاء </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- include summernote css/js-->
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
        type='text/css' />
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/languages/ar.js"></script>

    <script>
        var editor = new FroalaEditor('#flor', {
            direction: 'rtl',
            language: 'ar'
        })
    </script>
@endsection