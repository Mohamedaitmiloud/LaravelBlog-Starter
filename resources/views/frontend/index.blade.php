@extends('layouts.frontend')


@section('content')
        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Laravel
            <small>simple blog CMS</small>
          </h1>

          @foreach ($posts as $post)
              
          
          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="{{$post->featured}}" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">{{$post->title}}</h2>
              <a href="{{route('post.single',$post->slug)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on {{$post->created_at->toFormattedDateString()}} by
              <a href="#">{{$post->user->name}}</a>
            </div>
          </div>
          @endforeach

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>
@endsection