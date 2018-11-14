@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fa fa-ban"></i> Error!</h5>
    @foreach (Session::get('error') as $message)
       <ul>
         <li> {{$message}}</li>
       </ul>
    @endforeach
  </div>
@endif