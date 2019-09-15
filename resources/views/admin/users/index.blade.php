@extends('admin.layouts.master')


@section('style')

<style>
    .required{
		color: red;
		font-size: 15px;
	}
</style>
@endsection



@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">All Customers</h4>
        <div class="table-responsive m-t-40">
            <table id="myTable1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Orders</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$user->id}}</td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->orders->count()}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection



@section('script')
<script>
    $('#myTable1').DataTable({
        
    });
    $('#myTable2').DataTable({
        
    });
   
    </script>
@endsection