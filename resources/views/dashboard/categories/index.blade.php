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
        <div class="col-md-6">

          {{-- Include validation errors --}}
          @include('includes.dashboard.errors')

          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add a new category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
             {{-- add new category form using Form builder --}}

            {!! Form::open(['route'=>'categories.store']) !!}
            <div class="card-body">
              <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Entrer category name']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('about', 'About') !!}
                {!! Form::textarea('about', null, ['class'=>'form-control','cols'=>5,'rows'=>5]) !!}
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              {!! Form::submit('Add new', ['class'=>'btn btn-primary btn-block']) !!}
            </div>
            {!! Form::close() !!}

          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->

        
        <!-- right column -->
        <div class="col-md-6">

          @include('includes.dashboard.success')


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Name</th>
                          <th>Edit</th>
                          <th style="width: 10px">Delete</th>
                        </tr>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td><a class="btn btn-info btn-sm btn-block" href="{{route('categories.edit',['id'=>$category->id])}}">Edit</a></td>
                           
                            {!! Form::open(['route'=>['categories.destroy',$category->id],'method'=>'delete']) !!}
                            <td><button type="submit" class="btn btn-danger btn-sm btn-block">Delete</button></td>
                            {!! Form::close() !!}
                            
                        </tr>
                        @endforeach
                      </table>
                </div>
            </div>

        </div>
        
        <!--/right column -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


@endsection
