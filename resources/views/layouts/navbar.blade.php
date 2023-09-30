<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <h4 class="text text-primary mt-3" id="datetime"></h4>
    <ul class="navbar-nav">

      {{--  --}}
      @guest
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="link-icon" data-feather="lock"></i>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                <div class="text-center">
                    <p class="tx-12 text-muted">Anda harus masuk dulu!</p>
                </div>
            </div>
            @if (Route::has('login'))
            <ul class="list-unstyled p-1">
                <li class="dropdown-item py-2">
                <a href="{{ route('login') }}" class="text-body ms-0">
                    <i class="me-2 icon-md" data-feather="log-in"></i>
                    <span>{{ __('Login') }}</span>
                </a>
                </li>
            </ul>
            @endif
        </div>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
            </div>
            <div class="text-center">
              <p class="tx-16 fw-bolder">Hai, {{ Auth::user()->name }}!</p>
              <p class="tx-12 text-muted">{{ Auth::user()->email }} <i class="me-2 icon-md" data-feather="mail"></i></p>
            </div>
          </div>
          <ul class="list-unstyled p-1">
            <li class="dropdown-item py-2">
              <a href="{{ route('user.profil', Auth::user()->id) }}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="user"></i>
                <span>Profile</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="{{ route('user.edpassword', Auth::user()->id) }}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="edit"></i>
                <span>Edit Password</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
                <div class="text-center">
                    <a class="btn btn-md btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
        </div>
      </li>
      @endguest
    </ul>
  </div>
</nav>
<script>
    function updateTime() {
      var today = new Date();
      var day = today.toLocaleDateString('id-ID', { weekday: 'long' });
      var date = today.toLocaleDateString('id-ID', { month: 'long', day: 'numeric', year: 'numeric' });
      var time = today.toLocaleTimeString('id-ID', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour24: true });
      var dateTime = day + ', ' + date + ' - ' + time;
      document.getElementById('datetime').innerHTML = dateTime;
    }

    setInterval(updateTime, 1000);
</script>
