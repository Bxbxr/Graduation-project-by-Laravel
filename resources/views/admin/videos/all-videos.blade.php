@extends('theme.default')

@section('heading')
    جميع الفيديوهات
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="videos-table" class="table table-striped text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>عنوان الفيديو</th>
                        <th>اسم الناشر</th>
                        <th>تاريخ النشر</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($videos as $video)
                        <tr>
                            <td><a href="/videos/{{$video->id}}">{{ $video->title }}</a></td>
                            <td>{{ $video->user->name }}</td>
                            <td>
                                <p>{{ $video->created_at }}</p>
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
