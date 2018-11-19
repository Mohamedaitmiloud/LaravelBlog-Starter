<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('admin')}}" class="brand-link">
    <img src="{{asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset(Auth::user()->profile->avatar)}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{route('profile.index')}}" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->






             <li class="nav-item">
                <a href="{{route('posts.create')}}" class="nav-link success">
                    <i class="fas fa-plus nav-icon"></i>
                  <p>
                    New Post
                  </p>
                </a>

              </li>










        <li class="nav-item">
          <a href="{{route('admin')}}" class="nav-link  @if(Route::currentRouteName()==='admin') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
          {{--  <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Active Page</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Inactive Page</p>
              </a>
            </li>
          </ul>  --}}
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-window-restore"></i>
            <p>
              Posts
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('posts.index')}}" class="nav-link @if(Route::currentRouteName()==='posts.index') active @endif">
                  
                <i class="fas fa-window-minimize nav-icon fa-sm"></i>
                <p>Published posts</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{route('posts.trashed')}}" class="nav-link @if(Route::currentRouteName()==='posts.trashed') active @endif">
                <i class="fas fa-window-minimize nav-icon fa-sm"></i>
                <p>Trashed posts</p>
              </a>
            </li>
          </ul> 
        </li>


        <li class="nav-item">
          <a href="{{route('categories.index')}}" class="nav-link @if(Route::currentRouteName()==='categories.index') active @endif">
              <i class="fas fa-tag nav-icon"></i>
            <p>
              Categories
              {{--  <span class="right badge badge-danger">New</span>  --}}
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{route('tags.index')}}" class="nav-link @if(Route::currentRouteName()==='tags.index') active @endif">
                <i class="fas fa-tags nav-icon"></i>
              <p>
                Tags
                {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>

@if (Auth::user()->isAdmin)
<li class="nav-header">ADMIN</li>

<li class="nav-item">
  <a href="{{route('users.index')}}" class="nav-link @if(Route::currentRouteName()==='users.index') active @endif">
        <i class="fas fa-users nav-icon"></i>
      <p>
        Users
        {{--  <span class="right badge badge-danger">New</span>  --}}
      </p>
    </a>
 </li>

 <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fas fa-sliders-h nav-icon"></i>
       
      <p>
        Settings
        {{--  <span class="right badge badge-danger">New</span>  --}}
      </p>
    </a>
 </li>
@endif





      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>