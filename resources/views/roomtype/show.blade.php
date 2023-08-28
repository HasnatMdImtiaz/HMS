@extends ('layout')
@section ('content')
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$data->title}}
            <a href="{{url('admin/roomtype')}}"  class="float-right btn btn-success btn-ssm">View  all</a>
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            
            
                @csrf
                <table class="table table-bordered"> 
                    <tr>
                    <th>Title</th>
                    <td>{{$data->title}}</td>
                    
                    </tr>

                    <tr>
                    <th>Price</th>
                    <td>{{$data->price}}</td>
                    
                    </tr>

                    <tr>
                        <th>Detail</th>
                        <td>{{$data->detail}}</td>
                        
                    </tr>
                    <tr>
                        <th>Gallery Images</th>
                        <td>
                        <table class="table table-bordered  mt-2">
                                <tr>
                                    
                                    @foreach($data->roomtypeimgs as $img)
                                        <td class="imgcol{{$img->id}}"> <img width='300' src="{{ asset('storage/'.$img->img_src ) }}"/> 
                                        </td>
                                    @endforeach
                                </tr>
                        </table>
                        </td>
                        
                    </tr>
                   
                </table>
            
            
        </div>
    </div>
</div>

</div>


@endsection