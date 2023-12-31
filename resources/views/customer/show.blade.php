@extends ('layout')
@section ('content')
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Customer
            <a href="{{url('admin/customer')}}"  class="float-right btn btn-success btn-ssm">View  all</a>
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            
            
                @csrf
                <table class="table table-bordered"> 
                    <tr>
                    <th>Full Name</th>
                    <td>{{$data->full_name}}</td>
                    
                    </tr>
                    <tr>
                    <th>Photo</th>
                    <td> <img width='100'src="{{ asset('storage/' .$data->photo ) }}" ></td>
                    <!--  -->
                    
                    </tr>
                    <tr>
                    <th>Email</th>
                    <td>{{$data->email}}</td>
                    
                    </tr>

                    <tr>
                    <th>Mobile</th>
                    <td>{{$data->mobile}}</td>
                    
                    </tr>
                    <tr>
                    <th>Address</th>
                    <td>{{$data->address}}</td>
                    
                    </tr>
                   
                </table>
            
            
        </div>
    </div>
</div>

</div>


@endsection