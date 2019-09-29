@extends('admin.layouts.master')
@section('preloader')

@endsection
@section('content')
<style>
    .card-header{
        background: #7ce2c6 !important;
    }
    .card{
            border: 3px solid #7ce2c6!important;
    }
</style>
 <div class="row">
    <div class="col-lg-12 col-md-12">

        <div class="card">
            <div class="card-header">
                <h3 class="">Earning List</h3>
                <h5 class=""><b>Name : {{ $user->name }}</b></h5>
                <h5 class="">Phone : {{ $user->phone }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Earning form</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($earnings as $index => $earning)
                            <tr>
                              <td>{{ $index+1 }}</td>
                              <td><a href="{{ route('order.show',$earning->order->id)}}"><u>View invoice</u></a></td>
                              <td>{{ $earning->amount }}</td>
                              <td>{{ $earning->created_at }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div><br><br>


    <div class="col-lg-12 col-md-12">

        <div class="card">
            <div class="card-header">
                <h3 class="">Successfull withdrawal List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->withdraws->where('status','complete') as $index => $withdraw)
                            <tr>
                              <td>{{ $index+1 }}</td>
                              <td>{{ $withdraw->amount }}</td>
                              <td>{{ $withdraw->created_at }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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