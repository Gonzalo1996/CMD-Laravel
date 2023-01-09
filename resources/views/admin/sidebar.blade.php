<div class="sidebar shadow">
  <div class="section-top">
    <div class="logo">
      <p>Mi logo</p>
    </div>

    <div class="user">
      <spann class="subtitle">Hola:</spann>
      <div class="name">
        {{ Auth::user()->name }} {{ Auth::user()->lastname }}
        <a href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i></a>
      </div>
      <div class="email"> {{ Auth::user()->email }} </div>
    </div>
  </div>

  <div class="main">
    <ul>
      <li><a href="{{ url('/admin')}}"> <i class="fas fa-home"></i> Dashboard</a></li>
      <li><a href="{{ url('/admin/products')}}"> <i class="fas fa-user-friends"></i> Productos</a></li>
      <li><a href="{{ url('/admin/users')}}"> <i class="fas fa-boxes"></i> Usuarios</a></li>
    </ul>
  </div>
</div>