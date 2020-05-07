@extends('pharmacylayout')
<!DOCTYPE html>
<html>
<head>
	<title>Placed Order</title>
</head>
<body>
	@section('placedorder')
	<div id="admininputdiv">
		<br><br>
		<table align="center">
			<tr>
				<td>
					Your Order Has Been Placed
					Order# {{$oid}}
				</td>
			</tr>
		</table>
	</div>
	@endsection	
</body>
</html>