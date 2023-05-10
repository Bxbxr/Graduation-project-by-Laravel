@extends('theme.default')

@section('heading')
    جميع المنشورات
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="videos-table" class="table table-striped text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>عنوان المنشور</th>
                        <th>اسم الناشر</th>
                        <th>تاريخ النشر</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                <p>{{ $post->created_at }}</p>
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
