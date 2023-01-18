<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="routeName" content="{{ Route::currentRouteName() }}">

  <script src="https://kit.fontawesome.com/87748ef48c.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ url('/static/css/admin.css?v='.time()) }}">
  <title>@yield('title') - MyCms</title>
</head>
<body>

  <div class="wrapper">
    <div class="col1">@include('admin.sidebar')</div>
    <div class="col2">
      <nav class="navbar navbar-expand-lg shadow">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="{{ url('/admin') }}" class="nav-link">
                <i class="fas fa-home"></i>Dashboard
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="page">
        <div class="container-fluid">
          <nav aria-label="breadcrumb shadow">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href=" {{ url('/admin') }} ">
                  <i class="fas fa-home"></i>
                  Dashboard
                </a>
              </li>
              @section('breadcrumb')
              @show
            </ol>
          </nav>
        </div>

        @if(Session::has('messages'))
          @if ($errors->any())
          <div class="alert alert-danger mtop16">
              <ul>
                  <p>{{'Se ha producido un error: '}}</p>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
        @endif

        @section('content')
        @show
      </div>
    </div>
  </div>
  
</body>
</html>