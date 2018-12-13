@extends('layouts.frontend')
@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">

  <h1 class="my-4">{{$post->title}}
  </h1>

  <!-- Blog Post -->
  <div class="card mb-4">
    <img class="card-img-top" src="{{$post->featured}}" alt="Card image cap">
    <div class="card-body">
      <h2 class="card-title">{{$post->title}}</h2>
      <div>
        {!! $post->content!!}
      </div>
      
    </div>
    <div class="card-footer text-muted">
      Posted on {{$post->created_at->toFormattedDateString()}} by
      <a href="#">{{$post->user->name}}</a>
    </div>
  </div>
  <div class="card mb-4">
    <div class="row">
        <div class="col-md-6 text-center">
        @if ($prevPost)
        <a href="{{route('post.single',$prevPost->slug)}}"><h4>Prev</h4>
            <p>{{$prevPost->title}}</p></a>
        @endif
        </div>
        <div class="col-md-6 text-center">
            @if ($nextPost)
            <a href="{{route('post.single',$nextPost->slug)}}"><h4>Next</h4>
                <p>{{$nextPost->title}}</p></a>
            @endif
                
        </div>
    </div>
  </div>
  


</div>





@endsection