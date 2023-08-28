@extends ('layout')
@section ('content')
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Add Payment
            <a href="{{url('admin/staff')}}"  class="float-right btn btn-success btn-ssm">View  all</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success"> {{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form  method="post" action="{{url('admin/staff/payment/'.$staff_id)}}">
            
                @csrf
                <table class="table table-bordered"> 
                    <tr>
                        <th>Amount</th>
                        <td><input name="amount" type="number"class="form-control"> </td>
                    </tr>

                    
                    <tr>
                        <th>Date</th>
                        <td><input type="date" class="form-control" name="payment_date" /> </td>
               
                    </tr>
                    <tr>

                    <td colspan="2">
                        <input type="submit"class="btn btn-primary"> </td>
                    </tr>
                </table>
            </form>
            
        </div>
    </div>
</div>

</div>


@endsection