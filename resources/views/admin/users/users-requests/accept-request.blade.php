@extends('theme.default')

@section('heading')
    جميع الطلبات
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>اسم المستخدم</th>
                        <th>الايميل</th>
                        {{-- <td>صورة البطاقة</td> --}}
                        <th>تاريخ التسجيل</th>
                        <th>حالة المستخدم</th>
                    </tr>
                </thead>

                <tbody>
                    @if (Auth::user()->administration_level === 2)
                        @foreach ($admin_users as $admin_user)
                            <tr>
                                <td>{{ $admin_user->name }}</td>
                                <td>{{ $admin_user->email }}</td>
                                {{-- <td><img style="width: 40px ;height: 20px;" src="{{ Storage::url($admin_user->student_card_photo) }}"
                                    alt="">
                            </td> --}}
                                <td>
                                    <p>{{ $admin_user->created_at->diffForHumans() }}</p>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('users.update', $admin_user->id) }}"
                                        enctype="multipart/form-data" id="update-user-status-{{ $admin_user->id }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="checkbox" value="1" name="active_status"
                                            onchange="updateUserStatus({{ $admin_user->id }})"
                                            {{ $admin_user->active_status ? 'checked' : '' }}>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><img style="width: 40px ;height: 20px;" src="{{ Storage::url($user->student_card_photo) }}"
                                    alt="">
                            </td>
                            <td>
                                <p>{{ $user->created_at->diffForHumans() }}</p>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('users.update', $user->id) }}"
                                    enctype="multipart/form-data" id="update-user-status-{{ $user->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="checkbox" value="1" name="active_status"
                                        onchange="updateUserStatus({{ $user->id }})"
                                        {{ $user->active_status ? 'checked' : '' }}>
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
    <script>
        function updateUserStatus(userId) {
            // Get the form by its ID
            const form = document.getElementById(`update-user-status-${userId}`);

            // Submit the form
            form.submit();
        }
    </script>
@endsection
