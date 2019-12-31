<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href={{asset('css/app.css')}}>
    <script src={{asset('js/app.js')}}></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href={{url('/')}}>
        <img width="50px" height="50px" src={{asset('storage/rose.png')}} alt="">
    </a>

    <!-- Links -->
    <ul class="navbar-nav ml-auto">
        @if(!\Illuminate\Support\Facades\Auth::check())
            <li class="nav-item">
                <a class="nav-link" href={{url('login')}}>Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{url('register')}}>Register</a>
            </li>
        @elseif(\Illuminate\Support\Facades\Auth::check() && auth()->user()->role == 'Member')
            <li class="nav-item">
                <a class="nav-link" href={{url('transaction-history')}}>My Transaction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{url('cart')}}>My Cart</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    {{auth()->user()->name}}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href={{url('profile')}}>Profile</a>
                    <a class="dropdown-item" href={{url('doLogout')}}>Logout</a>
                </div>
            </li>
        @elseif(!empty(auth()->user()) && auth()->user()->role == 'Admin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Manage
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href={{url('admin/manage-user')}}>User</a>
                    <a class="dropdown-item" href={{url('admin/manage-courier')}}>Courier</a>
                    <a class="dropdown-item" href={{url('admin/manage-flower')}}>Flower</a>
                    <a class="dropdown-item" href={{url('admin/manage-flower-type')}}>Flower Type</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{url('admin/transaction-history')}}>All Transaction History</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    {{auth()->user()->name}}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href={{url('profile')}}>Profile</a>
                    <a class="dropdown-item" href={{url('doLogout')}}>Logout</a>
                </div>
            </li>
        @endif
    </ul>
</nav>
    @yield('content')
</body>
</html>
