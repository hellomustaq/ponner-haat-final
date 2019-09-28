<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

	<link href='https://fonts.googleapis.com/css?family=Black+Ops+One|Luckiest+Guy|Sonsie+One|Shojumaru&effect=3d|3d-float|anaglyph|brick-sign|canvas-print|
            crackle|decaying|destruction|distressed|distressed-wood|emboss|fire|fire-animation|fragile|grass|ice|mitosis|neon|outline|putting-green|
            scuffed-steel|shadow-multiple|splintered|static|stonewash|vintage|wallpaper' 
            rel='stylesheet' type='text/css'>
	<style type="text/css">
		

		.stylish {
		  	font-family: 'Tangerine', serif;
        	font-size: 48px;
        	text-shadow: 4px 4px 4px #aaa;
        	color: #FF9800;
		}
		.geffect {
		  font-family: 'Rancho';
		  font-size: 68px;
		  line-height: 1.4;
		  margin: 0;
		}
		#banner {
          display: block;
        }
        
        .images {
          display: inline-block;
          max-width: 20%;
          margin: 0 2.5%;
        }
	</style>
</head>
<body style="background-color: gray;">

	<div class="container">

	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-4"></div>
			<div class="col-md-4">
			     <div id="banner">
                    <div class="images">
                        <img style="margin-left: 80%;" height="50" width="50" src="{{asset("images/logos/kina_kini_logo1.png")}}" alt="">
                    </div>
            
                    <div class="images">
                        <img style="margin-left: 30%;" height="50" width="110" src="{{asset("images/logos/kina_kini_logo.png")}}" alt="">
                    </div>
            
                    
                </div>
				
				
				<!--<h2 align="center">Pinjira</h2>-->
			</div>
			<div class="col-md-4"></div>
			</div>
			
			
		</div>
		<div class="card-header">
			<span>Invoice No : <b>#INV0000{{$order->id}}</b></span><br>
			<span style="display: inline;">Date : 
			<strong>{{$order->created_at->format('d-m-Y')}}</strong></span>

			{{-- <span class="float-right" style="    margin-top: -20px;"> <strong>Status:</strong> <span class="font-effect-shadow-multiple" style="color:green;font-size:25px; font-family:Sonsie One;">Paid</span></span> --}}

		</div>
		<div class="card-body">
			<div class="row mb-4">
				<div class="col-sm-9">
					<h6 class="mb-3">From:</h6>
					<div>
						<strong>Ponnerhaat</strong>
					</div>
					<div>Purana paltan</div>
					<div>Dhaka</div>
					<div>Email: sales@ponnerhaat.com</div>
					<div>Phone: (+88) 017#########</div>
				</div>

				<div class="col-sm-3" >
					<h6 class="mb-3">To:</h6>
					<div>
						<strong>{{$order->user->name}}</strong>
					</div>
					<div>{{$order->shipping_address}}</div>
					
					<div>Phone: {{$order->phone}}</div>
					<div>Email: {{$order->user->email}}</div>
				</div>



			</div>

			<div class="table-responsive-sm">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="center">#</th>
							<th>Item</th>
							

							<th class="right">Unit Cost</th>
							<th class="center">Qty</th>
							<th style="text-align: center;" class="center">VAT</th>
							<th style="text-align: right;" class="right">Total</th>
						</tr>
					</thead>
					<tbody>
						@php
						$orderDub=$order;
						@endphp
						@foreach($order->orderDetails as $index => $order)
						<tr>
							<td class="center">{{$index+1}}</td>
							<td class="left strong">{{$order->product->name}}</td>

							<td class="right">{{$order->total_after_discount}}</td>
							<td class="center">{{$order->quantity}}</td>
							<td align="center" class="right">{{$order->product->vat}}%</td>
							<td align="right" class="right">{{$order->total_after_vat}} Tk</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-lg-4 col-sm-5">

				</div>

				<div class="col-lg-4 col-sm-5 ml-auto">
					<table class="table table-clear">
						<tbody>
							<tr>

								<th align="left">Sub Total</th>
								<th style="text-align: right;"> {{$orderDub->total}} Tk</th>
							</tr>
							<tr>
								<th align="left">Coupon Applied</th>
								<th style="text-align: right; color: red;">- {{$orderDub->total-$orderDub->total_after_coupon}} Tk</th>
							</tr>
							<tr>
								<th align="left">Total After Coupon</th>
								<th style="text-align: right;">{{$orderDub->total_after_coupon}} Tk</th>
							</tr>
							<tr>
								<th align="left">Shipping Cost</th>
								<th style="text-align: right;"> + {{$orderDub->orderShippingMethod->cost}} Tk</th>
							</tr>
							<tr>
								<th align="left">TOTAL</th>
								<th style="text-align: right; color: green;">{{$orderDub->total_after_shipping}} Tk</th>
							</tr>
							
						</tbody>
					</table>

				</div>

			</div>
			<hr>
			<h3 align="center" class="stylish display-6">Thank You!</h3>
			

		</div>
	</div>
</div>
	
</body>
</html>


