@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tags</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Tags</li>
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
              <h3 class="card-title">Add a new tag</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
             {{-- add new category form using Form builder --}}

            {!! Form::open(['route'=>'tags.store']) !!}
            <div class="card-body">
              <div class="form-group">
                {!! Form::label('tag', 'Tag') !!}
                {!! Form::text('tag',null, ['class'=>'form-control','placeholder'=>'Entrer tag']) !!}
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
                    <h3 class="card-title">Tags</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Tag</th>
                          <th>Edit</th>
                          <th style="width: 10px">Delete</th>
                        </tr>
                        @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->tag}}</td>
                            <td><a class="btn btn-info btn-sm btn-block" href="{{route('tags.edit',['id'=>$tag->id])}}">Edit</a></td>
                           
                            {!! Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'delete']) !!}
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
