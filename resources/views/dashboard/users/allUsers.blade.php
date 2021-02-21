@extends('layout_dashboard.app')

@section('content')

<div class="content-wrapper">
<section class="content-header">

    <h1>all users 
    <small>you can maintain about this</small>
    </h1>

<ol class="breadcrump"></ol>
</section>
<section class="content">

<div class="row">
            <div class="col-md-4">
            
            <input type="text" name="search" class="form-control" placeholder="search">
            
            </div>
            <a href="{{route('dashboard.users.create')}}" class="btn btn-primary" ><i class="fa fa-plus"></i> addUsers</a>
            </div>

            <div>

   @if ($data->count() > 0)
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">user name</th>
                    <th scope="col">user group</th>
                    <th scope="col">maintain</th>
                  </tr>
                </thead>
                <tbody>
                              @foreach($data as $index=>$dataa)
                      <tr>

                        <td>{{$index +1}}</td>
                        
                        <td>{{$dataa->name}}</td>
                        <td>{{$dataa->group}}</td>
                        

                          <td>

                              <!-- <a href="#" class="btn btn-info btn-sm">edit</a> 
                              <button type="submit" class="btn btn-danger btn-sm ">delete</button> -->
                    
                              <form action="{{ route('dashboard.users.destroy', $dataa->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> delete</button>
                              </form>


                          <a href="{{route('dashboard.users.edit',$dataa->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>edit</a> 
                    
                          </td>
                      </tr>

                      @endforeach

                  </tbody>

       </table>
@else
<h2>not found data</h2>

@endif


            
           
            </div>


        </div> 





</section>

</div>


@endsection

