@extends('layout_dashboard.app')

@section('content')

<div class="content-wrapper">
<section class="content-header">

    <h1>hellow 
    <small>you can edit  powers</small>
    </h1>

<ol class="breadcrump"></ol>
</section>
<section class="content">




<form action="{{route('dashboard.powers.update',$data->id)}}" method="POST">
{{ csrf_field() }}
{{ method_field('put') }}
  
  @php
  $maps= ['group','powers','user','first'];
  @endphp
  
<label for="exampleInputEmail1"> can select group</label>
            <select name="group" >
            
                    <option value="{{$data->id}}"> {{$data->name}} </option>
              
            </select>
            <div class="tab-pane" id="">
            <ul>
         @foreach($maps as $map )

      
            <li><label><input type="checkbox" name="permissions[]" {{$data->hasPermission($map . '-' . 'users') ? 'checked' : '' }} value="{{$map . '-' . 'users'}}" > {{$map}}</label></li>
         
          @endforeach
            </ul>
            </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



</section>

</div>


@endsection

