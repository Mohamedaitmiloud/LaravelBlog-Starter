@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{$user->profile->avatar}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->isAdmin ? 'Admin' : 'Author'}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Posts</b> <a class="float-right">{{count($user->posts)}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-at"></i> Email</strong>

                <p class="text-muted">
                 {{$user->email}}
                </p>

                <hr>

                <strong><i class="fas fa-money-check"></i> About</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fab fa-facebook"></i> Facebook</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fab fa-instagram"></i> Instagram</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#account" data-toggle="tab">Account</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="account">
                        



                        {!! Form::open(['route'=>['users.update','id'=>$user->id],'method'=>'PUT']) !!}

                        <div class="form-group">
                
                          
                          {!! Form::label('name', 'Name') !!}
                          
                          {!! Form::text('name', $user->name, ['class'=>'form-control' ,'required','autofocus']) !!}
                          
                          
                        </div>
                        <div class="form-group">
                
                          
                            {!! Form::label('email', 'Email') !!}
                            
                            
                            {!! Form::email('email', $user->email, ['class'=>'form-control','required']) !!}
                            
                            
                            
                          </div>
                          <div class="form-group">
                
                          
                              {!! Form::label('password', 'Password') !!}
                              
                              
                              {!! Form::password('password', ['class'=>'form-control']) !!}
                              
                              
                              
                            </div>
                            <div class="form-group">
                
                          
                                {!! Form::label('password-confirm', 'Confirm password') !!}
                                
                                
                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                
                                
                                
                              </div>




                              <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update Changes</button>
                                    {!! Form::close() !!}
                                  </div>
                    







                  </div>
                  <!-- /.tab-pane -->





                  <div class="tab-pane" id="settings">
                        
                        {!! Form::open(['route'=>['profile.update','id'=>$user->id],'method'=>'PUT','files'=>true]) !!}

                        <div class="form-group">

                            Form:l

                        </div>
                        
                        {!! Form::close() !!}
                        
                        


                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection