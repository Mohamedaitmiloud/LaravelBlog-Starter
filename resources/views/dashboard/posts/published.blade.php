@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Posts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Published posts</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">        
        <!-- right column -->
        <div class="col-md-12">

          @include('includes.dashboard.success')


          <div class="card">

                <div class="card-header">
                  <h3 class="card-title">Published posts</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="posts" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Featured</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Tags</th>
                      <th>Published date</th>
                      <th>Edit</th>
                      <th>Trash</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $posts as $post )
                        <tr>
                                <td>{{$post->id}}</td>
                                <td><img src="{{$post->featured}}" width="90px" height="40px"></td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>
                                    @foreach ($post->tags as $tag )
                                        <span class="badge bg-info">{{$tag->tag}}</span>
                                    @endforeach
                                </td>
                                <td>{{$post->created_at->toFormattedDateString()}}</td>
                                <td><a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-success btn-block">Edit</a></td>

                                
                                {!! Form::open(['route'=>['posts.destroy','id'=>$post->id],'method'=>'DELETE']) !!}
                                

                                <td>
                                {!! Form::submit('Trash', ['class'=>'btn btn-danger btn-block']) !!}
                                </td>
                              
                                
                                {!! Form::close() !!}
                                
                              </tr>
                        @endforeach
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

        </div>
        
        <!--/right column -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/dataTables.css')}}">
@endsection

@section('js')
<script src="{{asset('js/dataTables.js')}}"></script>
<script>
        $(function () {
          $("#posts").DataTable();
        });
      </script>
@endsection
