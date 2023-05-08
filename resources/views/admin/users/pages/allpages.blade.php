@extends('theme.default')

@section('heading')
    جميع الفيديوهات
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="videos-table" class="table table-stribed text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>عنوان الفيديو</th>
                        <th>اسم الناشر</th>
                        <th>تاريخ النشر</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td><a href="{{ route('allpages', $page->id) }}">{{ $page->title }}</a></td>
                            <td>{{ $page->user->name }}</td>
                            <td>
                                <p>{{ $page->created_at }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
   
@endsection
