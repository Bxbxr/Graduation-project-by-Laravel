@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    اضافة تخصص
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>
            </div>
            <div class="card-body">
                <div class="container">
                    <form method="POST" action="{{ route('majors.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-5 form-group">
                            <label for="name">اسم التخصص </label>
                            <input type="name" class="form-control" name="name" value="">
                        </div>
                        {{-- description --}}
                        <div class="col-lg-12 form-group">
                            <label for="description"> الوصف </label>
                            <textarea name="description" class="form-control flor" id="flor"></textarea>
                        </div>

                        {{-- goals --}}
                        <div class="col-lg-12 form-group">
                            <label for="goals"> الاهداف </label>
                            <textarea name="goals" class="form-control flor" id="flor"></textarea>
                        </div>

                        {{-- jobs_in_future --}}
                        <div class="col-lg-12 form-group">
                            <label for="jobs_in_future"> الوضائف المستقبلية للتخصص </label>
                            <textarea name="jobs_in_future" class="form-control flor" id="flor"></textarea>
                        </div>

                        {{-- user_id --}}
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