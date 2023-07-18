<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <h4 class="text text-primary mt-3" id="datetime"></h4>
    <ul class="navbar-nav">
      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="mail"></i>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
          <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
            <p>9 New Messages</p>
            <a href="javascript:;" class="text-muted">Clear all</a>
          </div>
          <div class="p-1">
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
              </div>
              <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-4">
                  <p>Leonardo Payne</p>
                  <p class="tx-12 text-muted">Project status</p>
                </div>
                <p class="tx-12 text-muted">2 min ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
              </div>
              <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-4">
                  <p>Carl Henson</p>
                  <p class="tx-12 text-muted">Client meeting</p>
                </div>
                <p class="tx-12 text-muted">30 min ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
              </div>
              <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-4">
                  <p>Jensen Combs</p>
                  <p class="tx-12 text-muted">Project updates</p>
                </div>
                <p class="tx-12 text-muted">1 hrs ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
              </div>
              <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-4">
                  <p>Amiah Burton</p>
                  <p class="tx-12 text-muted">Project deatline</p>
                </div>
                <p class="tx-12 text-muted">2 hrs ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
              </div>
              <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-4">
                  <p>Yaretzi Mayo</p>
                  <p class="tx-12 text-muted">New record</p>
                </div>
                <p class="tx-12 text-muted">5 hrs ago</p>
              </div>
            </a>
          </div>
          <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
            <a href="javascript:;">View all</a>
          </div>
        </div>
      </li>
      --}}
      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="bell"></i>
          <div class="indicator">
            <div class="circle"></div>
          </div>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
          <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
            <p>6 New Notifications</p>
            <a href="javascript:;" class="text-muted">Clear all</a>
          </div>
          <div class="p-1">
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="gift"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>New Order Recieved</p>
                <p class="tx-12 text-muted">30 min ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="alert-circle"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Server Limit Reached!</p>
                <p class="tx-12 text-muted">1 hrs ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
              </div>
              <div class="flex-grow-1 me-2">
                <p>New customer registered</p>
                <p class="tx-12 text-muted">2 sec ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="layers"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Apps are ready for update</p>
                <p class="tx-12 text-muted">5 hrs ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="download"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Download completed</p>
                <p class="tx-12 text-muted">6 hrs ago</p>
              </div>
            </a>
          </div>
          <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
            <a href="javascript:;">View all</a>
          </div>
        </div>
      </li> --}}
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
              {{-- <a href="/user/profil/{{ Auth::user()->id }}" class="text-body ms-0"> --}}
                <i class="me-2 icon-md" data-feather="user"></i>
                <span>Profile</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="/user/epassword/{{ Auth::user()->id }}" class="text-body ms-0">
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
