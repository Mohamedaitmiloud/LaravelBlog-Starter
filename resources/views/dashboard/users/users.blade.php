@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Categories</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        
          <div class="col-md-12">
              @include('includes.dashboard.errors')
              @include('includes.dashboard.success')
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Users</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addNewModal">Add new</button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">

                    @foreach ($users as $user)
    

                    <div class="col-md-4">
                            <!-- Widget: user widget style 2 -->
                            <div class="card card-widget widget-user-2">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header {{$user->isAdmin ? 'bg-warning' : 'bg-info' }}">
                                <div class="widget-user-image">
                                  <img class="img-circle elevation-2" src="{{$user->profile->avatar}}" alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">{{$user->name}}</h3>
                                <h5 class="widget-user-desc">
                                    {{$user->isAdmin ? 'Admin' :' Author'}}
                                </h5>
                              </div>
                              <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                  <li class="nav-item">
                                    <a href="#" class="nav-link">
                                      Posts <span class="float-right badge bg-primary">{{count($user->posts)}}</span>
                                    </a>
                                  </li>
                                    @if(Auth::id() != $user->id)
                                      <li class="nav-item">
                                          <p class="nav-link">
                                            @if(!$user->isAdmin)
                                            <a href="{{route('users.makeAdmin',['id'=>$user->id])}}" class="btn btn-primary btn-block">Make Admin</a>

                                            @else
                                            <a href="{{route('users.removeAdmin',['id'=>$user->id])}}" class="btn btn-danger btn-block">Remove permissions</a>
                                            @endif
                                          </p>
                                    </li>
                                    @endif
                                </ul>
                              </div>
                            </div>
                            <!-- /.widget-user -->
                          </div>
                    
                    
                    @endforeach
                  </div>
                </div>

                  </div>
              </div>
          </div>
          






      </div>
    </div>
  </section>
</div>



<!-- Modal -->
<div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="addNewModalLable" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        {!! Form::open(['route'=>'users.store']) !!}

        <div class="form-group">

          
          {!! Form::label('name', 'Name') !!}
          
          {!! Form::text('name', null, ['class'=>'form-control' ,'required','autofocus']) !!}
          
          
        </div>
        <div class="form-group">

          
            {!! Form::label('email', 'Email') !!}
            
            
            {!! Form::email('email', null, ['class'=>'form-control','required']) !!}
            
            
            
          </div>
          <div class="form-group">

          
              {!! Form::label('password', 'Password') !!}
              
              
              {!! Form::password('password', ['class'=>'form-control']) !!}
              
              
              
            </div>
            <div class="form-group">

          
                {!! Form::label('password-confirm', 'Confirm password') !!}
                
                
                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                
                
                
              </div>

          
          
         
          
        
       
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add user</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>


    
@endsection