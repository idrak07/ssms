@extends('pharmacylayout')
<!DOCTYPE html>
<html>
<head>
	<title>Order For Supply</title>
</head>
<body>
	@section('orderforsupply')
	<div id="admininputdiv">
		<form method="post" style="background: none; width: 1024px; left: 0px; top:0px; padding: 0px">
		{{csrf_field()}}
			<select id="search" name="companyid" style="width: 678px" onchange="info1()" onmouseover="hide(tooltip1)">
	        <option value="">Select Company</option>
	        @foreach($company as $companies)
	        <option value="{{$companies->id}}">{{$companies->Name}}</option>
	        @endforeach
		    </select>
		    @if(!empty($medicine))
		    <div id="totaldiv"  style="visibility: hidden; width: 1000px; left: 0px; padding: 0px" >
		    	<table name="table" id ="list" style=" width: 1000px; left: 0px">
					<tr onmouseover="hide(tooltip1)">
						<th id="listhead" style=" max-width: 250px">Product</th>
						<th id="listhead">Generic</th>
						<th id="listhead">Type</th>
						<th id="listhead">mg</th>
						<th id="listhead" style=" max-width: 80px">Price</th>
						<th id="listhead"></th>
						<th id="listhead" style=" max-width: 30px">Qty</th>
						<th id="listhead"></th>
						<th id="listhead" style="max-width: 70px">Total</th>
					</tr>
					<tbody id="success"> 
					</tbody>
					<div class = "tooltip" id= "tooltip1"></div>
				</table>
				@endif
				<br>
				<table onmouseover="hide(tooltip1)" style="width: 90%">
					<tr>
						<td>
							<font color="blue">Net Ammount:</font><input style="border:none;background-color: #f2f2f2; width: 200px" value="0.00Tk" name="total" readonly="readonly" type="text" id="total" onmouseover="hide(tooltip1)">
						</td>
					</tr>
					<tr>
						<td>
							<input id="admininput" type="submit" name="processorder" onmouseover="hide(tooltip1)" 
			       			style="visibility: hidden; width: 200px" value="Place Order">
						<td>
					</tr>
				</table>   
			</div>				
		</form>
	</div>
	<script type="text/javascript">
	var total = 0.00;
	function info1()
	{    
		total = 0.00;
		document.getElementById("total").value = Math.abs(parseFloat(total)).toFixed(2)+"Tk";
		document.getElementById("admininput").visibility = "hidden";
		document.getElementById("totaldiv").style.visibility = "visible";
		var search = $('#search').val();
		console.log(search);
			$.ajax({
				type:"get",
		        url:'{{URL::to("orderforsupply/search")}}',
					{{--url:'{{route('order.search')}}',--}}
				data:{
					search:search,
					_token:$('#signup-token').val()
					},
				datatype:'html',
				
				success:function(response){
					console.log(response);
					$("#success").html(response);
				}
			});
	}

	function inc(s){
		document.getElementById("admininput").style.visibility = "visible";
		var p = parseFloat(document.getElementById("tdp"+s).value);
		var q = parseInt(document.getElementById("tdq"+s).value);
        var t = parseFloat(document.getElementById("t"+s).value);
		q++;
		t = t + p;
		total = total + p;
		document.getElementById("tdq"+s).value = q;
		document.getElementById("t"+s).value = t.toFixed(2)+"Tk";
		document.getElementById("total").value = Math.abs(parseFloat(total).toFixed(2))+"Tk";
	}
	function dec(s){
		var p = parseFloat(document.getElementById("tdp"+s).value);
		var q = parseInt(document.getElementById("tdq"+s).value);
		var t = parseFloat(document.getElementById("t"+s).value);
		if(q>0)
		{
			q--;
			t = t - p;
			total = total - p;
			document.getElementById("tdq"+s).value = q;
			document.getElementById("t"+s).value = t.toFixed(2)+"Tk";
			if(total==0)
			{
				document.getElementById("total").value = "0.00"+"Tk";
			}
			else
			{
				document.getElementById("total").value = Math.abs(parseFloat(total).toFixed(2))+"Tk";
			}
			
		}

		if(parseInt(document.getElementById("total").value)<=0)
		{
			document.getElementById("admininput").style.visibility = "hidden";
		}
	}
	function details (search) {  
		console.log(search);
			$.ajax({
				type:"get",
		        url:'{{URL::to("orderforsupply/meddetails")}}',
					{{--url:'{{route('order.meddetails')}}',--}}
				data:{
					search:search,
					_token:$('#signup-token').val()
					},
				datatype:'html',
				
				success:function(response){
					console.log(response);
					$("#tooltip1").html(response);
				}
			});
	}
	function show (elem,id) {  
	    var x = document.getElementById("tr"+id).offsetTop+15;
	    elem.style.marginTop = x+"px";
	    var y = document.getElementById("td"+id).offsetWidth;
	    elem.style.marginLeft = y+"px";
	    details(id);
	    elem.style.display="block";
	}
	function hide (elem) { 
	    elem.style.display=""; 
	}
	</script>
	@endsection	
</body>
</html>