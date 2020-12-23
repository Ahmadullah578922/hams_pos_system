<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Daily Purchase Report PDF</title>
	<link rel="stylesheet" href="{{asset('/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table width="100%">
					<tbody>
						<tr>
							<td width="25%"></td>
							<td>
								<span style="font-size: 20px; background: #1781BF; padding: 3px 10px 3px 10px; color: #fff;">Santo Shopping Mall</span><br> Gulshan, Dhaka
							</td>
							<td><span>Showroom No : 0192345678<br>Owner No: 01678956789</span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table>
					<tbody>
						<tr>
							<td  width="25%"></td>
							<td>
								<u><strong><span style="font-size: 15px;">Daily Purchase Report({{date('Y-m-d', strtotime($start_date))}} - {{date('Y-m-d', strtotime($end_date))}})</span></strong></u>
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				  <table width="100%" border="1">
	                  <thead>
	                    <tr>
	                      <th>SL.</th>
	                      <th>Purchase No</th>
	                      <th>Date</th>
	                      <th>Product Name</th>
	                      <th>Quantity</th>
	                      <th>Unit Price</th>
	                      <th>Total Price</th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                  	@php
                      		$total_sum = '0';
                  		@endphp

	              		@foreach($allData as $key => $purchase)
	                    <tr>
	                      <td>{{$key+1}}</td>
	                      <td>{{$purchase->purchase_no}}</td>
	                      <td>{{date('Y-m-d',strtotime($purchase->date))}}</td>
	                       >
	                      <td>{{$purchase['product']['name']}}</td>
	                       <td>
	                        {{$purchase->buying_qty}}
	                        {{$purchase['product']['unit']['name']}}

	                      </td>
	                       <td>{{$purchase->unit_price}}</td>
	                       <td>{{$purchase->buying_price}}</td>
	                       </td>
	                    </tr>
	                      @php
                      		$total_sum += $purchase->buying_price;
                  		@endphp
	                    @endforeach
	                    <tr>
                    		<td colspan="6" style="text-align: right;">Grand Total</td>
                    		<td>{{ $total_sum }}</td>
                   		</tr>
	                  </tbody>

                </table>
                  @php
                  	$date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                  @endphp
                  <i>Printing Time: {{$date->format('F j, Y, g:i a')}}</i>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table border="0" width="100%">
					<tbody>
						<tr>
							<td style="width: 40%">	
							</td>
							<td style="width: 20%"></td>
							<td style="width: 40%; text-align: center;">
								<p style="text-align: center; border-bottom: 1px solid #000;">Owner Signature</p>	
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>