<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Blog</a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <p>Account</p>
        
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="{{ route('logout')}}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="dropdown-item" >
         
          <div class="media">
            <div class="media-body">
                  logout
            </div>
          </div>
     
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      </div>
    </li>

  </ul> 



</nav>
<!-- /.navbar -->