	<h5 style="text-align: center;">Total Earning {{$earnings}} Taka</h5>
	<h5 style="color:red;text-align: center;">Total Withdraw {{$withdraws}} Taka</h5>
	<h5 style="color:green;text-align: center;">Available balance <b> {{$available}} Taka </b></h5>
	<p style="color:green;text-align: center;">Pending Request {{$pendingRequest}}</p>
		<button style="margin: 0 auto;text-align: center;" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
		  Withdraw money
		</button>
	
	<div class="table-responsive" style="margin-top: 20px; padding: 5px;">
		<table style="" id="example3" class="table m-t-40" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Amount</th>
                     <th>Status</th>
                     <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($user->withdraws as $index => $transaction)
                <tr>
                	<td>{{$index+1}}</td>
                    <td>
                        {{$transaction->amount}}
                    </td>
                    <td>
                      @if($transaction->status=="complete")
                      <span class="badge badge-success">Complete</span>
                      @elseif($transaction->status=="pending")
                        <span class="badge badge-warning">Pending</span>
                        @else
                        <span class="badge badge-danger">Rejected</span>
                      @endif
                    </td>
                    <td>{{$transaction->created_at}}</td>
                </tr>
                @empty
                
                @endforelse
            </tbody>
        </table>
	</div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('customer.account.withdraw')}}">
        	@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Amount</label>
		    <input name="amount" type="number" min="500" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter amount">
		    <small id="emailHelp" class="form-text text-muted">Amount have to be more then 500 taka</small>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</form>
      </div>
    </div>
  </div>
</div>