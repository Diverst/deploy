<ul class="nav">
    <li class="{{ (request()->is('home')) ? 'active' : '' }}">
      <a href="./">
        <i class="nc-icon nc-chart-bar-32"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="{{ (request()->is('projects*')) ? 'active' : '' }}">
      <a href="/projects">
        <i class="nc-icon nc-tile-56"></i>
        <p> Projects</p>
      </a>
    </li>
    @if (auth()->user()->role == 'admin')
    <li class="{{ (request()->is('UserManagement*')) ? 'active' : '' }}">
      <a href="/UserManagement">
        <i class="nc-icon nc-single-02"></i>
        <p>User Management</p>
      </a>
    </li>
    @else
    <li class="{{ (request()->is('UserProfile*')) ? 'active' : '' }}">
      <a href="/UserProfile">
        <i class="nc-icon nc-single-02"></i>
        <p>User Profile</p>
      </a>
    </li> 
    @endif
    <li>
      <a href="{{ route('logout') }}" class="nc-icon nc-single-02">Logout</a>
    </li>
  </ul>

    {{-- <h5>Selamat datang di halaman dashboard, <strong>{{ Auth::user()->name }}</strong></h5> --}}