<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vivo Nepal Offer</title>
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('public/assets/admin/css/style.css')}}">

  <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('public/assets/css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/font-awesome.min.css') }}">

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand" href="">Vivo Nepal Offer</a>
          </div>
          {{-- text --}}
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav navbar-nav-right">
              @if(Auth::check())
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                  {{-- <img src="" alt="profile"/> --}}
                  <i class="ti-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    <i class="ti-settings text-primary"></i>
                    Settings
                  </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <i class="ti-power-off text-primary"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
              @else
              <ul class="nav page-navigation">
                @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.home') }}">
                      <i class="ti-user menu-icon"></i>
                      <span class="menu-title">Home</span>
                    </a>
                  </li>
                @endguest 
              </ul>
              @endif
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="ti-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          @if(Auth::check())
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="{{route('get.home')}}">
                <i class="ti-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('campaignfrom.index')}}">
                <i class="ti-headphone-alt menu-icon"></i>
                <span class="menu-title">Campaign From</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('phonemodel.index')}}" class="nav-link">
                <i class="ti-mobile menu-icon"></i>
                <span class="menu-title">Phone Model</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('prize.index')}}" class="nav-link">
                <i class="ti-gift menu-icon"></i>
                <span class="menu-title">Prizes Name</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('prizedate.index')}}" class="nav-link">
                <i class="ti-calendar menu-icon"></i>
                <span class="menu-title">Prize Date</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('customer.index')}}" class="nav-link">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Customers</span>
              </a>
            </li>

            {{-- <li class="nav-item">
              <a href="{{route('imei.index')}}" class="nav-link">
                <i class="ti-credit-card menu-icon"></i>
                <span class="menu-title">IMEI</span>
              </a>
            </li> --}}

            <li class="nav-item">
              <a href="{{route('awardedprize.index')}}" class="nav-link">
                <i class="ti-medall menu-icon"></i>
                <span class="menu-title">Winners</span>
              </a>
            </li>
            
          </ul>
          @endif
        </div>
      </nav>
    </div>