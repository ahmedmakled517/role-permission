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



<form action="{{ route('dashboard.groups.update', $data->id) }}" method="post">

    {{ csrf_field() }}
    {{ method_field('put') }}

    <div class="form-group">
        <label>group name</label>
        <input type="text" name="name" class="form-control" value="{{ $data->name }}">
    </div>




    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> edit</button>
    </div>

</form>


</section>

</div>


@endsection

