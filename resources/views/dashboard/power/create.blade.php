@extends('layout_dashboard.app')

@section('content')

<div class="content-wrapper">
<section class="content-header">

    <h1>hellow 
    <small>you can create new powers</small>
    </h1>

<ol class="breadcrump"></ol>
</section>
<section class="content">




<form action="{{route('dashboard.powers.store')}}" method="POST">
{{ csrf_field() }}
  
  @php
  $maps= ['group','powers','user','first'];
  @endphp
  
<label for="exampleInputEmail1"> can select group</label>
            <select name="group" >
                @foreach($data as $dataa)
                    <option value="{{$dataa->id}}"> {{$dataa->name}} </option>
                @endforeach
            </select>
            <div class="tab-pane" id="">
            <ul>
            @foreach($maps as $map )
            <li><label><input type="checkbox" name="permissions[]" value="{{$map . '-' . 'users'}}"   > {{$map}}</label></li>
            @endforeach
            </ul>
            </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



</section>

</div>


@endsection

