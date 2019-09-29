@extends('admin.layouts.master')
@section('preloader')

@endsection
@section('content')

<h3 class="text-center">Payments</h3><br>
<div class="row">
                    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-success"><i class="ti-user"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0"> {{ $transactions->where('status','pending')->count() }}</h3>
                        <h5 class="text-muted m-b-0">Pending request</h5></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-info"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">Tk. {{ $transactions->where('status','pending')->sum('amount') }}</h3>
                        <h5 class="text-muted m-b-0">Pending amount</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">Tk. {{ $last7days }}</h3>
                        <h5 class="text-muted m-b-0">Last 7 days paid</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-success"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">Tk. {{ $transactions->where('status','complete')->sum('amount') }}</h3>
                        <h5 class="text-muted m-b-0">Total paid</h5></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

 <div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Withdrawal Request</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $index => $transaction)
                                <tr>
                                  <td>{{ $index+1 }}</td>
                                  <td><a href="{{ route('payments.user.details',$transaction->user->id) }}">{{ $transaction->user->name }}</a></td>
                                  <td>{{ $transaction->user->phone }}</td>
                                  <td>{{ $transaction->amount }}</td>
                                  <td>
                                        @if($transaction->status=="complete")
                                        <span class="badge badge-success">Complete</span>
                                        @elseif($transaction->status=="pending")
                                          <span class="badge badge-warning">Pending</span>
                                          @else
                                          <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                  <td>{{ $transaction->created_at }}</td>
                            
                                    

                                    <td>
                                        <button data-toggle="modal" data-target="#verticalcenter1{{$index}}" class="btn btn-sm btn-info waves-effect waves-light" type="button">
                                            <span class="btn-label">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>

                                <div id="verticalcenter1{{$index}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="vcenter"> Transaction Update</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('transaction.status.update',$transaction->id)}}" class="form-control" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name="transaction_status" id="" class="form-control">
                                                            
                                                            <option {{ $transaction->status == 'pending' ?'selected' : ''}} value="pending">Pending</option>
                                                            <option {{ $transaction->status == 'complete' ?'selected' : ''}} value="complete">Complete</option>
                                                            <option {{ $transaction->status == 'return' ?'selected' : ''}} value="return">Reject</option>
                                                          
                                                        </select>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="btn btn-success" type="submit" name="submit" id="" value="Update">
                                                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                      
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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