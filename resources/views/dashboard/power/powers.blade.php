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
<div class="row">
            <div class="col-md-4">
            
            <input type="text" name="search" class="form-control" placeholder="search">
            
            </div>
            <a href="{{route('dashboard.powers.create')}}" class="btn btn-primary" ><i class="fa fa-plus"></i> addPowers</a>
            </div>

            <div>
        @if ($data->count() > 0)
                <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">group name</th>
                            
                                <th scope="col">edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                        @foreach($data as $index=>$dataa)
                                <tr>

                                    <td>{{$index +1}}</td>
                                    
                                    <td>{{$dataa->name}}</td>

                                    
                                    

                                    <td>

                                    <a href="{{route('dashboard.powers.edit',$dataa->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>edit</a> 
                                
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>

                </table>
         @else
                    <h2>not found data</h2>

        @endif
</section>

</div>


@endsection

