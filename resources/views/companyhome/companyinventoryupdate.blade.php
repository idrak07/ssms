<!DOCTYPE html>
@extends('companylayout')
<html>
<head>
  <title>Add New Batch</title>
</head>
<body>  
  @section('inventoryupdate') 
  <div id="admininputdiv">
  	<form method="post" style="background: none">
		{{csrf_field()}}
		<input type="hidden" name="id"   id="id">
	  	<table align="center">
	  		<tr>
            	<th colspan="2" align="center"><font color="blue">Add A Batch For A Product</font></th>
        	</tr>
        	<tr>
        		<td colspan="2"><hr></td>
        	</tr>
        	<tr>
				<td colspan="2" align="center"><font color="red">{{session('msginvalidproduct')}}</font></td>
			</tr>
        	<tr>
	  			<td colspan="2" align="center"><font color="red">@if ($errors->has('medicinename'))
																	{{ $errors->first('medicinename') }}
																@endif</font>
				</td>
	  		</tr>
	  		<tr>
	  			<td>Product</td>
	  			<td><input type="text"   name="medicinename"   id="searchname" placeholder="Select Product" style="width: 200px"></td>
	  		</tr>
	  		<tr>
				<td colspan="2" align="center"><font color="red">{{session('msgusedbatch')}}</font></td>
			</tr>
	  		<tr>
	  			<td colspan="2" align="center"><font color="red">@if ($errors->has('batch'))
																	{{ $errors->first('batch') }}
																 @endif</font>
				</td>
	  		</tr>
	  		<tr>
	  			<td>Batch No.</td>
	  			<td><input type="text" name="batch" id="admininput" style="width: 200px" minlength="4" maxlength="20"></td>
	  		</tr>
	  		<tr>
	  			<td colspan="2" align="center"><font color="red">@if ($errors->has('box'))
																	{{ $errors->first('box') }}
																 @endif</font>
				</td>
	  		</tr>
	  		<tr>
	  			<td>Quantity(Box)</td>
	  			<td><input type="number" id="admininput" name="box" style="width: 200px" min="1"></td>
	  		</tr>
	  		<tr>
	  			<td colspan="2" align="center"><input type="submit" name="" id="admininput" value="Save"></td>
	  		</tr>
	  	</table>    	
  	</form>
  </div>
    <script type="text/javascript">
	$("#searchname").autocomplete({
	  source : '{!!URL::route('companyinventoryupdate.updatesearch')!!}',
	  minLenght:1,
	  autoFocus:true,
	  select:function(e, ui){
	    $('#id').val(ui.item.id);
	  }
	});
	</script>
  @endsection 
</body>
</html>