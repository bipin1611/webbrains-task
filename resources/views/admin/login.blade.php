<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
</head>
<body>


<section class="hero is-primary is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop is-3-widescreen">

                    <h1 class="title text-center">Admin Login</h1>
                    @if(session('error'))
                        <div class="notification is-danger">
                            <button onclick="hide()" class="delete"></button>
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.login.post') }}" method="post" class="box">
                        @csrf
                        <div class="field">
                            <label for="" class="label">Email</label>
                            <div class="control">
                                <input type="email" name="email" placeholder="e.g. bobsmith@gmail.com" class="input" required>
{{--                                <span class="icon is-small is-left">--}}
{{--                                  <i class="fa fa-envelope"></i>--}}
{{--                                </span>--}}
                            </div>
                        </div>
                        <div class="field">
                            <label for="" class="label">Password</label>
                            <div class="control">
                                <input type="password" name="password" placeholder="*******" class="input" required>
{{--                                <span class="icon is-small is-left">--}}
{{--                                  <i class="fa fa-lock"></i>--}}
{{--                                </span>--}}
                            </div>
                        </div>

                        <div class="field">
                            <button type="submit" class="button is-success">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
