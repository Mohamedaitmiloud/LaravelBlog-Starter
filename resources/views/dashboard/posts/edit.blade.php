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
            <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Posts</a></li>
            <li class="breadcrumb-item active">Edit post</li>
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
        <div class="col-md-8 offset-2">

          {{-- Include validation errors --}}
          @include('includes.dashboard.errors')

          <!-- general form elements -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Editing post</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
             {{-- add new category form using Form builder --}}

            {!! Form::open(['route'=>['posts.update','id'=>$post->id],'files'=>true,'method'=>'PUT']) !!}
            <div class="card-body">

              <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title',$post->title, ['class'=>'form-control','placeholder'=>'Enter post title']) !!}
              </div>

              <div class="form-group">
                {!! Form::label('category', 'Category') !!}
                
              
                {!! Form::select('category',$categories, $post->category_id, ['class'=>'form-control']) !!}
                
              </div>

              <div class="class="form-check form-check-inline"">
                    @foreach ($tags as $tag)
                    {!! Form::checkbox('tags[]', $tag->id, false) !!}
                    {!! Form::label('tags[]', $tag->tag) !!}
                    @endforeach
                    
             </div>

             <div class="custom-file">
                    
                    {!! Form::label('featured', 'Featured',['class'=>'custom-file-label']) !!}
                    {!! Form::file('featured', ['class'=>'custom-file-input']) !!}
                    
            </div>

            <div class="form-group">
                    {!! Form::label('content', 'Content') !!}
                    {!! Form::textarea('content', $post->content, ['class'=>'form-control']) !!}
            </div>


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              {!! Form::submit('Save changes', ['class'=>'btn btn-info btn-block']) !!}
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


@section('css')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection
@section('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
        $(document).ready(function() {
            $('#content').summernote();
          });
</script>
@endsection
