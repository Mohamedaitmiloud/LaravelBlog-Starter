@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$categories}}</h3>

              <p>Categories</p>
            </div>
            <div class="icon">
                    <i class="fas fa-tag nav-icon"></i>
            </div>
            <a href="{{route('categories.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$tags}}</h3>

              <p>Tags</p>
            </div>
            <div class="icon">
                    <i class="fas fa-tags "></i>
            </div>
            <a href="{{route('tags.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$publishedPosts}}</h3>

              <p>Published posts</p>
            </div>
            <div class="icon">
                    <i class="nav-icon fas fa-window-restore"></i>
            </div>
            <a href="{{route('posts.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$trashedPosts}}</h3>

              <p>Trashed posts</p>
            </div>
            <div class="icon">
                    <i class="fas fa-trash"></i>
            </div>
            <a href="{{route('posts.trashed')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->





        <section class="col-lg-7 connectedSortable" id="todo">
          <!-- TO DO List -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                  Todo list
              </h3>
            </div>
            <!-- /.card-header -->


            <div class="card-body">
              <ul class="todo-list">
                <li v-for="todo in todos">
                  <!-- drag handle -->
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <!-- todo text -->
                  <span class="text">@{{todo.body}}</span>
                  <!-- Emphasis label -->
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                      <span v-if="todo.isCompleted" class="badge badge-success">DONE</span>
                    <button v-else="todo.isCompleted" class="badge badge-success" @click="markDone(todo)">Mark Done</button>
                    <button class="badge badge-danger" @click="deleteTodo(todo)" >Delete</button>

                  </div>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->



            <div class="card-footer clearfix">
              <div class="form-group">
                  {!! Form::text('todo', null, ['class'=>'form-control','placeholder'=>'New task','v-model'=>'todo.body']) !!}
                <br>
                  <button type="button" @click="addTodo()" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add item</button>
              </div>

            </div>
          </div>
          <!-- /.card -->
        </section>







        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

                <!-- PRODUCT LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Recently Added Posts</h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-widget="remove">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($lastPosts as  $post)
                            <li class="item">
                                    <div class="product-img">
                                      <img src="{{$post->featured}}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                      <a href="javascript:void(0)" class="product-title">{{$post->title}}
                                        <span class="badge badge-warning float-right">{{$post->created_at->diffForHumans()}}</span></a>
                                    </div>
                                  </li>
                            @endforeach
                      <!-- /.item -->
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{route('posts.index')}}" class="uppercase">View All Products</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('js')
    
<script>

new Vue({
  el:'#todo',
  data:{
    todos:[],
    todo:{
      id:0,
      body:''
    }
  },
  methods:{
    getTodos:function(){
      axios.get('admin/todos/getTodos')
           .then(response=>{
             this.todos = response.data.todos;
           })
           .catch(error=>{
             console.log('error',error);
           })
    },
    addTodo:function(){
      axios.post('admin/todos', this.todo)
            .then(response=>{
              this.todo.id = response.data.id;
              this.todos.unshift(this.todo);
              this.todo={
                id:0,
                body:''
              }
            })
            .catch(error=>{
              cosole.log('error',error);
            })
    },
    markDone:function(todo){
      axios.put('admin/todos/'+todo.id+'/markDone')
           .then(response=>{
              var postion = this.todos.indexOf(todo);
              this.todos[postion].isCompleted = 1;
           })
    },
    deleteTodo:function(todo){
      axios.delete('admin/todos/'+todo.id)
            .then(response=>{
              console.log('Sucess');
            })
    }
  },
  mounted(){
    this.getTodos();
  }
})

</script>


@endsection