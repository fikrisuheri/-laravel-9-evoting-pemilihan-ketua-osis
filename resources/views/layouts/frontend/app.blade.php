
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $app_name }}</title>

    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/main/app.css" />
    <link
      rel="shortcut icon"
      href="{{ asset('mazer') }}/assets/images/logo/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="{{ asset('mazer') }}/assets/images/logo/favicon.png"
      type="image/png"
    />

    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/shared/iconly.css" />
    <style>
      .header-top{
        background-color: #F2F7FF !important;
      }
    </style>
  </head>

  <body>
    <div id="app">
      <div id="main" class="layout-horizontal">
        <header class="mb-5">
          <div class="header-top">
            <div class="container">
              <div class="logo">
                <a href="index.html"
                  ><img src="{{ $app_logo }}" alt="Logo" style="height: 40px"
                /></a>
              </div>
              <div class="header-top-right">
                @auth
                <div class="dropdown">
                  <a
                    href="#"
                    id="topbarUserDropdown"
                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <div class="avatar avatar-md2">
                      <img src="{{ asset('mazer') }}/assets/images/faces/1.jpg" alt="Avatar" />
                    </div>
                    <div class="text">
                      <h6 class="user-dropdown-name">{{ auth()->user()->name }}</h6>
                      <p class="user-dropdown-status text-sm text-muted text-capitalize">
                       Member
                      </p>
                    </div>
                  </a>
                  <ul
                    class="dropdown-menu dropdown-menu-end shadow-lg"
                    aria-labelledby="topbarUserDropdown"
                  >
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">My Dashboard</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    
                    @auth
                    <li>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="#"  href="{{ route('logout')  }}" onclick="event.preventDefault();
                        this.closest('form').submit();">
                        <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    </form>
                    </li>
                    @endauth
                  </ul>
                </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                @endauth
              </div>
            </div>
          </div>
    
        </header>

        <div class="content-wrapper container">
          <div class="page-content">
            @yield('content')
          </div>
        </div>

        <footer>
          <div class="container">
            <div class="footer clearfix mb-0 text-muted">
              <div class="float-start">
                <p>2022 &copy; {{ $app_name }}</p>
              </div>
              <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                  by <a href="https://ahmadsaugi.com">Saugi</a> Develop Apps by <a href="https://github.com/fikrisuheri">FikriSuheri</a></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="{{ asset('mazer') }}/assets/js/bootstrap.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/app.js"></script>
    <script src="{{ asset('mazer') }}/assets/extensions/jquery/jquery.min.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/pages/horizontal-layout.js"></script>

    <script src="{{ asset('mazer') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
 
    @stack('js')
  </body>
</html>
