<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>جامعتي</title>


    <!-- bootstarp -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>

    <!-- fontawesome -->
    <link href="{!! asset('theme/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('theme/css/sb-admin-2.css') !!}">

</head>

<body dir="rtl" style="text-align: right">
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark">
            <a class="navbar-brand text-light" href="#">جامعتي</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="visibility: visible">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item">
                        <a href="{{ route('main') }}" class="nav-link text-light">
                            <i class="fa fa-home"></i>
                            الصفحة الرئيسية
                        </a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a href="{{ route('majors') }}" class="nav-link text-light">
                                <i class="fas fa-history"></i>
                                التخصصات
                            </a>
                        </li>
                    @endguest
                    @auth
                        {{-- الصفحات --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-file m-1"></i>{{ __('site.Pages') }}
                            </a>
                            <div class="dropdown-menu text-right " aria-labelledby="navbarDropdown">

                                @foreach ($pages as $page)
                                    <a href="{{ route('page.show', $page->title) }}" class="dropdown-item"
                                        target="_blank">{{ $page->title }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endauth

                    @auth
                        <li class="nav-item">
                            <a href="{{ route('history') }}" class="nav-link text-light">
                                <i class="fas fa-history"></i>
                                سجل المشاهدة
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-upload m-1"></i>رفع منشور
                            </a>
                            <div class="dropdown-menu text-right " aria-labelledby="navbarDropdown">
                                <a href="{{ route('videos.create') }}" class="dropdown-item">رفع مقطع فيديو</a>
                                <a href="{{ route('posts.create') }}" class="dropdown-item">رفع منشور</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-newspaper"></i> منشوراتي
                            </a>
                            <div class="dropdown-menu text-right " aria-labelledby="navbarDropdown">
                                <a href="{{ route('videos.index') }}" class="dropdown-item">فيديوهاتي</a>
                                <a href="{{ route('posts') }}" class="dropdown-item">منشوراتي الأخرى</a>
                            </div>
                        </li>


                    @endauth

                    <li class="nav-item">
                        <a href="{{ route('channel.index') }}" class="nav-link text-light">
                            <i class="fas fa-university"></i>
                            الجامعات
                        </a>
                    </li>

                    @auth

                        <li class="nav-item">
                            <a href="/chatify" class="nav-link text-light">
                                <i class="fas fa-comments"></i>
                                المحادثات
                            </a>
                        </li>

                        <li class="nav-item mr-5">
                            <a href="{{ route('contact.index') }}" class="nav-link text-light">
                                <i class="fas fas fa-inbox"></i>
                                تواصل معنا
                            </a>
                        </li>
                    @endauth


                </ul>
                <ul class="navbar-nav mr-auto">
                    <div class="topbar" style="z-index:1">
                        @auth
                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow alert-dropdown mx-1 ">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw text-white fa-lg"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter notif-count"
                                        data-count='{{ App\Models\Alert::where('user_id', Auth::user()->id)->first()->alert }}'>{{ App\Models\Alert::where('user_id', Auth::user()->id)->first()->alert }}</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in text-right mt-2"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header bg-secondary text-center text-bold">
                                        مركز الإشعارات
                                    </h6>

                                    <div class="alert-body">

                                    </div>
                                    <a class="dropdown-item text-center small text-gray-500"
                                        href="{{ route('all.Notification') }}">عرض جميع
                                        الإشعارات</a>
                                </div>
                            </li>


                        @endauth
                    </div>


                    @guest
                        <li class="nav-item mt-2">
                            <a href="{{ route('login') }}" class="nav-link text-light">{{ __('تسجيل الدخول') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item mt-2">
                                <a class="nav-link text-light" href="{{ route('register') }}">{{ __('انشاء حساب') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown justify-content-left mt-2">
                            <a id="navbarDropdown" class="nav-link" href="#" data-toggle="dropdown">
                                <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-left px-2 text-right mt-2">
                                @can('update-videos')
                                    <a href="{{ route('admin.index') }}" class="dropdown-item text-right">لوحة التحكم</a>
                                @endcan
                                <div class="pt-4 pb-1 border-t border-gray-200">
                                    <div class="flex items-center px-4">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <div class="shrink-0 ml-3">
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="{{ Auth::user()->profile_photo_url }}"
                                                    alt="{{ Auth::user()->name }}" />
                                            </div>
                                        @endif

                                        <div class="ml-3">
                                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}
                                            </div>
                                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                        </div>
                                    </div>

                                    <div class="mt-3 space-y-1">
                                        <!-- Account Management -->
                                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                            {{ __('site.profile') }}
                                        </x-jet-responsive-nav-link>
                                        <x-jet-responsive-nav-link href="{{ route('profile') }}" :active="request()->routeIs('profile.show')">
                                            {{ __('site.my-profile') }}
                                        </x-jet-responsive-nav-link>

                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                                                :active="request()->routeIs('api-tokens.index')">
                                                {{ __('site.api_token') }}
                                            </x-jet-responsive-nav-link>
                                        @endif

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <div class="nav-item">
                                                <a class="nav-link" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit(); "
                                                    role="button">
                                                    <i class="fas fa-sign-out-alt"></i>

                                                    {{ __('site.logout') }}
                                                </a>
                                            </div>
                                        </form>

                                        <!-- Team Management -->
                                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                            <div class="border-t border-gray-200"></div>

                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('site.manage_team') }}
                                            </div>

                                            <!-- Team Settings -->
                                            <x-jet-responsive-nav-link
                                                href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                                :active="request()->routeIs('teams.show')">
                                                {{ __('site.team_settings') }}
                                            </x-jet-responsive-nav-link>

                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-jet-responsive-nav-link href="{{ route('teams.create') }}"
                                                    :active="request()->routeIs('teams.create')">
                                                    {{ __('site.new_team') }}
                                                </x-jet-responsive-nav-link>
                                            @endcan

                                            <div class="border-t border-gray-200"></div>

                                            <!-- Team Switcher -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('site.team_switch') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-jet-switchable-team :team="$team"
                                                    component="jet-responsive-nav-link" />
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <main class="my-4">
            @if (Session::has('success'))
                <div class="p-3 mb-2 bg-success text-white rounded mx-auto col-8">
                    <span class="text-center">{{ session('success') }}</span>
                </div>
            @endif

            @yield('content')
        </main>

    </div>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('0ffb7450e8d8c74e0f11', {
            cluster: 'ap2'
        });
    </script>

    <script src="{{ asset('js/pushNotifications.js') }}"></script>
    <script src="{{ asset('js/failedNotifications.js') }}"></script>

    <script>
        var token = '{{ Session::token() }}';
        var urlNotify = '{{ route('notification') }}';
        $('#alertsDropdown').on('click', function(event) {
            event.preventDefault();
            var notificationsWrapper = $('.alert-dropdown');
            var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
            var notificationsCountElem = notificationsToggle.find('span[data-count]');

            notificationsCount = 0;
            notificationsCountElem.attr('data-count', notificationsCount);
            notificationsWrapper.find('.notif-count').text(notificationsCount);
            notificationsWrapper.show();
            $.ajax({
                method: 'POST',
                url: urlNotify,
                data: {
                    _token: token
                },
                success: function(data) {
                    var resposeNotifications = "";
                    $.each(data.someNotifications, function(i, item) {
                        var responseDate = new Date(item.created_at);
                        var date = responseDate.getFullYear() + '-' + (responseDate.getMonth() +
                            1) + '-' + responseDate.getDate();
                        var time = responseDate.getHours() + ":" + responseDate.getMinutes() +
                            ":" + responseDate.getSeconds();

                        if (item.success) {
                            resposeNotifications +=
                                '<a class="dropdown-item d-flex align-items-center" href="#">\
                                                                                                            <div class="ml-3">\
                                                                                                                <div class="icon-circle bg-secondary">\
                                                                                                                    <i class="far fa-bell text-white"></i>\
                                                                                                                </div>\
                                                                                                            </div>\
                                                                                                            <div>\
                                                                                                                <div class="small text-gray-500">' +
                                date +
                                ' الساعة ' +
                                time +
                                '</div>\
                                                                                                                <span>تهانينا لقد تم معالجة مقطع الفيديو <b>' +
                                item
                                .notification + '</b> بنجاح</span>\
                                                                                                            </div>\
                                                                                                        </a>';
                        } else {
                            resposeNotifications +=
                                '<a class="dropdown-item d-flex align-items-center" href="#">\
                                                                                                            <div class="ml-3">\
                                                                                                                <div class="icon-circle bg-secondary">\
                                                                                                                    <i class="far fa-bell text-white"></i>\
                                                                                                                </div>\
                                                                                                            </div>\
                                                                                                            <div>\
                                                                                                                <div class="small text-gray-500">' +
                                date +
                                ' الساعة ' +
                                time +
                                '</div>\
                                                                                                                <span>للأسف حدث خطأ غير متوقع أثناء معالجة مقطع الفيديو <b>' +
                                item.notification + '</b> يرجى رفعه مرة أخرى</span>\
                                                                                                            </div>\
                                                                                                        </a>';
                        }
                        $('.alert-body').html(resposeNotifications);
                    });
                }
            });
        });
    </script>
    @yield('script')
</body>

</html>
