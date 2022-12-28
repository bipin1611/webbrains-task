<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Admin</title>

    <!-- Bulma is included -->
    <link rel="stylesheet" href="{{ url("admin/assets/css/main.min.css") }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    @yield('head')
</head>
<body>


<div id="app">

    @include('admin.layouts.navbar')

    @include('admin.layouts.sidebar')

    @yield('content')

    <footer class="footer">
        <div class="container-fluid">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        © {{ date('Y') }}
                    </div>

                </div>
            </div>
        </div>
    </footer>
</div>


<!-- Scripts below are for demo only -->
<script type="text/javascript" src="{{ url("admin/assets/js/main.min.js") }}"></script>

<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

@yield('js')
</body>
</html>
