@extends('layouts.admin')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Settings</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

            <div class="col-md-8 offset-2">

                    {{-- Include validation errors --}}
                    @include('includes.dashboard.errors')

                     {{-- Include validation success --}}
                    @include('includes.dashboard.success')

                    <!-- general form elements -->
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Update blog settings</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      
                       {{-- add new category form using Form builder --}}
          
                      {!! Form::open(['route'=>['settings.update','id'=>$settings->id],'method'=>'PUT']) !!}
                      <div class="card-body">
          
                        
                        <div class="form-group">
                            
                            {!! Form::label('title','Blog title') !!}
                            {!! Form::text('title', $settings->title, ['class'=>'form-control']) !!}
                            
                        </div>
                        <div class="form-group">
                            
                                {!! Form::label('about','Blog about') !!}
                                
                                {!! Form::textarea('about', $settings->about, ['class'=>'form-control','cols'=>5,'rows'=>5]) !!}
                                
                                
                        </div>
                        <div class="form-group">
                            
                                {!! Form::label('contact_email','Contact email') !!}
                                
                                
                                {!! Form::email('contact_email', $settings->contact_email, ['class'=>'form-control']) !!}
                                
                                
                                
                        </div>
                        <div class="form-group">
                            
                                {!! Form::label('contact_number','Contact number') !!}
                                
                                
                                {!! Form::text('contact_number', $settings->contact_number, ['class'=>'form-control']) !!}
                                
                                
                                
                        </div>

                        
                        


                        
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        {!! Form::submit('Update settings', ['class'=>'btn btn-success btn-block']) !!}
                      </div>
                      {!! Form::close() !!}
          
                    </div>
                    <!-- /.card -->
                  </div>
    
      </div>
    </div>
  </section>
    
@endsection