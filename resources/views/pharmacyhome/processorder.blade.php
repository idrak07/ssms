@extends('pharmacylayout')
<!DOCTYPE html>
<html>
<head>
	<title>Process Order</title>
</head>
<body>
	@section('orderforsupply')
	<div id="admininputdiv">
		<form action="{{url('orderproceed')}}" method="post" style="background: none;">
		{{csrf_field()}}
			<input type="hidden" name="cid" value="{{$company->id}}">
			<input type="hidden" name="total" value="{{$data->total}}">
			{{csrf_field()}}
			<font color="blue" style="font-size: 20px">Order Details</font><hr><br>
			<font color="blue">Company Name: </font>{{$company->Name}}<br>
			<font color="blue">Net Ammount : </font>{{$data->total}}<hr><br><br>
			<table id="list">
				<tr>
					<td colspan="4" align="center"><font color="blue">Order Contains</font><hr></td>
				</tr>
				<tr>
						<th id="listhead" style="max-width: 250px; min-width: 250px;">Product</th>
						<th id="listhead" style="max-width: 70px">Price/Box</th>
						<th id="listhead" style="max-width: 50px">Quantity(Box)</th>
						<th id="listhead" style="max-width: 70px">Total</th>
				</tr>
				@for($i=0; $i<= $data->j; $i++)
					<?php
						$mid = 'mid'.$i;
						$name = 'm'.$i;
						$price = 'p'.$i;
						$quantity = 'q'.$i;
						$total = 't'.$i;
					?>
					@if($data->$quantity>0)
					<tr>	
						<td style="display:none;"><input type="hide" name="mid[]" value="{{$data->$mid}}"></td>
						<td style="max-width: 250px; min-width: 250px;"><input type="text" name="m[]" value="{{$data->$name}}" 
							 style="border:none;background-color: #f2f2f2; width: 350px" readonly>
						</td>			
						<td style="max-width: 70px" align="center"><input type="text" name="p[]" value="{{$data->$price}}"     
							 style="border:none;background-color: #f2f2f2; width: 70px" readonly>
						</td>		
						<td style="max-width: 50px" align="center"><input type="text" name="q[]" value="{{$data->$quantity}}"  
							 style="border:none;background-color: #f2f2f2; width: 50px" readonly>
						</td>
						<td style="max-width: 70px" align="center"><input type="text" name="t[]" value="{{$data->$total}}"    	
							 style="border:none;background-color: #f2f2f2; width: 70px" readonly>
						</td>	
					</tr>
					@endif
				@endfor
				<tr>
					<td colspan="4" align="center"><input id="admininput" type="submit" name="processorder" value="Proceed" style="width: 100px"></td>
				</tr>			
			</table>
		</form>
	</div>
	@endsection	
</body>
</html>