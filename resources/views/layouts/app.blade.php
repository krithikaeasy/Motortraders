<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->userDetail->first_name . ' ' . Auth::user()->userDetail->last_name }} <span class="caret"></span>
                            </a>

                                   
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ url('motor') }}">Motor List</a>
            
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script>
    var Body = $('body');

    var PageUrl = '{!! request()->url() !!}';
    var SuccessMsg = '{{ session('success_msg') }}';
    var ErrorMsg = '{{ session('error_msg') }}';
    var WarningMsg = '{{ session('warning_msg') }}';
    var InfoMsg = '{{ session('info_msg') }}';
    var Csrf = '@csrf';
    var CsrfToken = '{{ csrf_token() }}';
    var AlertifyTimeOut = 5;
    var AlertTypes = [
        'success',
        'error',
        'warning',
        'message'
    ];
    var MonthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var DaysNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];


    function messageAlert(message, type, timeout) {
        try {
            if (timeout === undefined) timeout = AlertifyTimeOut;

            if (message && $.inArray(type.toLowerCase(), AlertTypes) !== -1) {
                alertify.notify(message, type, timeout, function (e) {
                });
            }
        } catch (e) {
            console.warn(e);
        }
    }

    function successAlert(message) {
        messageAlert(message, 'success');
    }

    function errorAlert(message) {
        messageAlert(message, 'error');
    }

    function warningAlert(message) {
        messageAlert(message, 'warning');
    }

    function infoAlert(message) {
        messageAlert(message, 'message');
    }

    successAlert(SuccessMsg);
    errorAlert(ErrorMsg);
    warningAlert(WarningMsg);
    infoAlert(InfoMsg);

</script>

@yield('js-add')

</html>
