@extends('pharmacylayout')
<!DOCTYPE html>
<html>
<head>
	<title>Order For Supply</title>
</head>
<body>
	@section('orderforsupply')
	<div id="admininputdiv">
	<select id="search" style="width: 678px" onchange="info1()">
        <option>Select Company</option>
        @foreach($company as $companies)
        <option value="{{$companies->id}}">{{$companies->Name}}</option>
        @endforeach
    </select>
    @if(!empty($medicine))
	<table id ="list">
		<tr>
			<th id="listhead">Name</th>
			<th id="listhead">Price</th>
			<th id="listhead"></th>
			<th id="listhead">Quantity</th>
			<th id="listhead"></th>
			<th id="listhead">Total</th>
		</tr>
		<tbody id="success"> 
		</tbody>
		<div class = "tooltip" id= "tooltip1"></div>
	</table>
	@endif
	<br>
	Total  <input  style="border:none" readonly="readonly" type="text" id="total" name="">
	</div>
	<script type="text/javascript">
	var total = 0;
	function info1()
	{    
		total = 0;
		document.getElementById("total").value = parseInt(total);
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
		var p = parseInt(document.getElementById("tdp"+s).value);
		var q = parseInt(document.getElementById("tdq"+s).value);
        var t = parseInt(document.getElementById("t"+s).value);
		q++;
		t = t + p;
		total = total + p;
		document.getElementById("tdq"+s).value = q;
		document.getElementById("t"+s).value = t;
		document.getElementById("total").value = parseInt(total);
	}
	function dec(s){
		var p = parseInt(document.getElementById("tdp"+s).value);
		var q = parseInt(document.getElementById("tdq"+s).value);
		var t = parseInt(document.getElementById("t"+s).value);
		q--;
		t = t - p;
		total = total - p;
		document.getElementById("tdq"+s).value = q;
		document.getElementById("t"+s).value = t;
		document.getElementById("total").value = parseInt(total);
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
				datatype:'text',
				
				success:function(response){
					console.log(response);
					$("#tooltip1").text(response);
				}
			});
	}
	function show (elem,id) {  
	    var x = document.getElementById("tr"+id).offsetTop+5;
	    elem.style.marginTop = x+"px";
	    details(id);
	    //elem.onmouseover = show(elem,id);
	    elem.style.display="block";
	}
	function hide (elem) { 
	    elem.style.display=""; 
	}
	</script>
	@endsection	
</body>
</html>