<!DOCTYPE html>
@extends('companylayout')
<html>
<head>
	<title>Product Release Request</title>
</head>
<body>
	@section('productrelease')
	<form method="post" style="background: none">
		{{csrf_field()}}
		<div id="admininputdiv" style="margin: 0px 80px">
			<table align="center">
				<tr>
					<td colspan="2" align="center">
						<font color="blue" style="font-size: 26px">Make A Product Release Request</font><hr>
					</td>
				</tr>
				<tr>
					<td>Product Name</td>
					<td>
						<input type="text" name="name" placeholder="Give A Product Name" id="admininput" style="width: 300px">
						<font color="red">
						@if ($errors->has('name'))
							{{ $errors->first('name') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>Generic</td>
					<td>
						<input type="text" name="genericname" id="genericname" placeholder="Type Desire Generic Name" 
						       style="width: 300px">
                        <input type="hidden" name="genericid" id="genericid">
                        <font color="red">
						@if ($errors->has('genericid'))
							{{ $errors->first('genericid') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>Select Type</td>
					<td>
						<select name="typeid" id="admininput" style="width: 300px">
							<option value="">Select A Type</option>
							@foreach($typelist as $typelist)
							<option value="{{$typelist->id}}">{{$typelist->name}}</option>
							@endforeach
						</select>
						<font color="red">
						@if ($errors->has('typeid'))
							{{ $errors->first('typeid') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>mg(Optional)</td>
					<td>
						<input type="number" name="mg" placeholder="Provide mg if needed" id="admininput" style="width:300px">
						<font color="red">
						@if ($errors->has('mg'))
							{{ $errors->first('mg') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>Unit/Box</td>
					<td>
						<input type="number" name="unitperbox" id="admininput" style="width: 300px">
						<font color="red">
						@if ($errors->has('unitperbox'))
							{{ $errors->first('unitperbox') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
					</td>
				</tr>
				<tr>
					<td>Price/Box</td>
					<td>
						<input type="number" name="price" step="0.01" id="admininput" style="width: 300px">
						<font color="red">
						@if ($errors->has('price'))
							{{ $errors->first('price') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>MRP/Unit</td>
					<td>
						<input type="number" name="mrp" step="0.01" id="admininput" style="width: 300px">
						<font color="red">
						@if ($errors->has('mrp'))
							{{ $errors->first('mrp') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<font color="red">
						@if ($errors->has('details'))
							{{ $errors->first('details') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>Product Details</td>
					<td><textarea name="details" rows="5" cols="70" placeholder="Write Details"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="" value="Submit" id="admininput" style="width: 200px"></td>
				</tr>
			</table>
		</div>
	</form>
	<script type="text/javascript">
		$("#genericname").autocomplete({
        source : '{!!URL::route('companygeneric.search')!!}',
        minLenght:1,
        autoFocus:true,
        select:function(e, ui){
          $('#genericid').val(ui.item.id);
        }
      });
	</script>
	@endsection
</body>
</html>