@extends('layout_dashboard.app')

@section('content')

<div class="content-wrapper">
<section class="content-header">

    <h1>all group 
    <small>you can edit  users</small>
    </h1>

<ol class="breadcrump"></ol>
</section>
<section class="content">

@include('partials._errors')
<form action="{{route('dashboard.users.update',$dataa->id)}}" method="POST">

{{ csrf_field() }}
{{ method_field('put') }}

  <div class="form-group">
    <label for="exampleInputEmail1"> user name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1"> email</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1"> password</label>
    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <label for="exampleInputEmail1"> user group</label>
  <select name="group" id="">
   @foreach($data as $dataa)
    <option value="{{$dataa->id}}">{{$dataa->name}}</option>
   @endforeach
  </select>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</section>

</div>


@endsection

