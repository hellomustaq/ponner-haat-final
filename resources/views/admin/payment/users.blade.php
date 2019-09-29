@extends('admin.layouts.master')
@section('preloader')

@endsection
@section('content')

 <div class="row">
    <div class="col-lg-12 col-md-12">

        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Users List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Earning</th>
                                <th>withdraw</th>
                                <th>Remaining</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index => $user)
                            <tr>
                              <td>{{ $index+1 }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->phone }}</td>
                              <td>{{ $earn = $user->earnings->sum('amount') }}</td>
                              <td>{{ $withdraw = $user->withdraws->where('status','complete')->sum('amount') }}</td>
                              <td>{{ $earn-$withdraw }}</td>
                                <td>
                                    <a href="{{ route('payments.user.details',$user->id) }}" class="btn btn-sm btn-info waves-effect waves-light" >
                                        <span class="btn-label">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Column -->
</div>

@endsection

@section('script')
<script>
    $('#myTable1').DataTable({
        
    });
</script>
@endsection