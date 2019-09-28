	<h5 style="text-align: center;">Total Earning {{$earnings}} Taka</h5>
	<h5 style="color:red;text-align: center;">Total Withdraw {{$earnings}} Taka</h5>
	<h5 style="color:green;text-align: center;">Available balance {{$earnings}} Taka</h5>
	<div class="row">
		<div class="col-md-5"></div>
		<div class="col-md-2">
			<button style="margin: 0 auto;text-align: center;" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
			  Withdraw money
			</button>
		</div>
		<div class="col-md-5"></div>
	</div>
	
	<div class="table-responsive" style="margin-top: 20px; padding: 5px;">

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