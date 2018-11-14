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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- left column -->
        <div class="col-md-6 offset-3">

          {{-- Include validation errors --}}
          @include('includes.dashboard.errors')

          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Editing category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
             {{-- add new category form using Form builder --}}

            {!! Form::open(['route'=>['categories.update','id'=>$category->id],'method'=>'PUT']) !!}
            <div class="card-body">
              <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name',$category->name, ['class'=>'form-control','placeholder'=>'Entrer category name']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('about', 'About') !!}
                {!! Form::textarea('about', $category->about, ['class'=>'form-control','cols'=>5,'rows'=>5]) !!}
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              {!! Form::submit('Save changes', ['class'=>'btn btn-success btn-block']) !!}
            </div>
            {!! Form::close() !!}

          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


@endsection
