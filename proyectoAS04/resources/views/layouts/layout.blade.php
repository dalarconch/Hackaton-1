<!DOCTYPE html>
<html class="no-js h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>3IT  @yield('title')</title> 
        <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('styles/shards-dashboards.1.1.0.min.css') }}">
        <link rel="stylesheet" href="{{ asset('styles/extras.1.1.0.min.css') }}">
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </head>
    <body class="h-100">

        <div class="d-flex container-fluid justify-content-end border-bottom sticky-top" style=" background-color: #FFFFFF; border-color: #007bff">
            @guest
                <a class="justify-content-end navbar-brand w-100 mr-3" href="{{ url('/') }}" style="line-height: 30px;">  
                    <div class="d-table m-0">
                      <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 30px;" src="{{ asset('images/minilogo2.png') }}">
                      <span class="d-none d-md-inline ml-1">3IT</span>
                    </div>
                </a>
                <li class="nav align-items-center">
                  <a class="nav-link text-nowrap px-5" href="{{ route('login') }}" ><i class="far fa-user"></i> {{ __('Ingresar') }}</a>
                </li>
            @else
                <a class="justify-content-end navbar-brand w-100 mr-3" href="{{ url('/home') }}" style="line-height: 30px;">  
                    <div class="d-table m-0">
                      <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 30px;" src="{{ asset('images/minilogo2.png') }}">
                      <span class="d-none d-md-inline ml-1">3IT</span>
                    </div>
                </a> 
                <li class="nav dropdown align-items-center">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" style="max-width:30px;" src="{{ asset('images/avatars/2.jpg') }}" alt="User Avatar">
                    <span class="d-none d-md-inline-block" >{{Auth::user()->nombre}}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="#">
                      <i class="material-icons">&#xE7FD;</i> Perfíl</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>
                                        {{ __('Cerrar Sesión') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
            @endguest            
        </div>
        
        <div class="d-flex align-middle py-0 justify-content-center ">
            <div class="w-100 ">
                @yield('content')
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
        <script src="{{ asset('scripts/extras.1.1.0.min.js') }}"></script>
        <script src="{{ asset('scripts/shards-dashboards.1.1.0.min.js') }}"></script>
        <script src="{{ asset('scripts/app/app-blog-overview.1.1.0.js') }}"></script>
    </body>
</html>