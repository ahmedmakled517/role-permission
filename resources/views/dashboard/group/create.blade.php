@extends('layout_dashboard.app')

@section('content')

<div class="content-wrapper">
<section class="content-header">

    <h1>all group 
    <small>you can create new group</small>
    </h1>

<ol class="breadcrump"></ol>
</section>
<section class="content">
@include('partials._errors')

<form action="{{route('dashboard.groups.store')}}" method="POST">
{{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1"> add group</label>
    <input type="text" name="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</section>

</div>


@endsection

