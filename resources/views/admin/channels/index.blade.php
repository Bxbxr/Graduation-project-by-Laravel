@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('heading')
    صلاحيات المستخدمين
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="videos-table" class="table table-striped text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>الأسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>نوع المستخدم</th>
                        <th>نوع الجامعة</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                        <th>حظر</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{$user->type=='student' ? 'طالب' : 'جامعه'}}</td>
                            <td>{{ $user->isSuperAdmin() ? 'مدير عام' : ($user->isAdmin() ? 'مدير' : 'مستخدم') }}</td>
                            <td>
                                {{-- <form class="ml-4 form-inline" method="POST" action="{{ route('channels.update', $user) }}"
                                    style="display:inline-block">
                                    @method('patch')
                                    @csrf
                                    <select class="form-control form-control-sm" name="administration_level">
                                        <option selected disabled>اختر نوعًا</option>
                                        <option value="0">مستخدم</option>
                                        <option value="1">مدير</option>
                                        <option value="2">مدير عام</option>
                                    </select> --}}
                                    <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                        تعديل</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('channels.delete', $user) }}" style="display: inline-block">
                                    @method('DELETE')
                                    @csrf
                                    @if (auth()->user() != $user && !$user->isSuperAdmin())
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('هل انت متأكد من حذف حساب هذا المستخدم من على المنصة')"><i
                                                class="fa fa-trash"></i> حذف</button>
                                    @else
                                        <div class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>حذف</div>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('channels.block', $user) }}" method="POST" style="display: inline-block">
                                    @method('patch')
                                    @csrf
                                    @if (auth()->user() != $user && !$user->isSuperAdmin())
                                        @if ($user->block)
                                            <div class="btn btn-warning btn-sm disabled"><i class="fa fa-lock"></i> محظور
                                            </div>
                                        @else
                                            <button type="submit" class="btn btn-warning btn-sm"
                                                onclick="return confirm('هل انت متأكد من انك تريد حظر هذا المستخدم!')"><i
                                                    class="fa fa-lock"></i> حظر</button>
                                        @endif
                                    @else
                                        <div class="btn btn-warning btn-sm disabled"> <i class="fa fa-lock"></i> حظر</div>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#videos-table").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/ar.json"
                }
            });
        });
    </script>
@endsection
