<!DOCTYPE html>
@extends('companylayout')
<html>
<head>
  <title>Product List</title>
</head>
<body>
  @section('productlist') 
    <div id="admininputdiv">
        <br><br><br>
        <input type="text" id="search" placeholder="Search by Product's Name" 
               onkeyup="info1()" style="width:250px;left:190px;position:absolute;">
    	<br><br>
        <table id ="list" align="center" style="width: 90%">
        	<tr>
                <th colspan="8" align="center"><font color="blue">Product List</font><hr></th>
            </tr>
            <tr>
                <th id="listhead" style=" max-width: 250px">Product</th>
				<th id="listhead">Generic</th>
				<th id="listhead">Type</th>
				<th id="listhead">mg</th>
				<th id="listhead" style=" max-width: 80px">Price/Box</th>
				<th id="listhead" style=" max-width: 50px">MRP</th>
				<th id="listhead">Status</th>
                <th align="center" id="action">Action</th>
            </tr>
            <tbody id="success">
	            @foreach($productlist as $productlist)
	                <tr>
	                    <td>{{substr($productlist->name, 0, 20)}}</td>
	                    <td>{{substr($productlist->gname, 0, 20)}}</td>
	                    <td>{{$productlist->tname}}</td>
	                    <td>{{$productlist->mg}}</td>
	                    <td>{{$productlist->price}}</td>
	                    <td>{{$productlist->mrp}}</td>
	                    <td>{{$productlist->status}}</td>
	                    <td>
	                    	<a id="details" href="/companyproduct/details/{{$productlist->id}}">Details</a>
	                    	@if($productlist->status == "Listed")
	                    		<a id="trash" onclick="return confirm('Are you sure?')" 
                                   href="/companyproduct/hide/{{$productlist->id}}">&nbsp;&nbsp;Hide&nbsp;&nbsp;</a>
	                    	@endif
	                    	@if($productlist->status == "Hidden")
	                    		<a id="details" onclick="" href="/companyproduct/unhide/{{$productlist->id}}">Unhide</a>
	                    	@endif
	                    </td>
	                </tr>
	            @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function info1()
        { 
            var search = $('#search').val();
            console.log(search);
                $.ajax({
                    type:"get",
                    url:'{{URL::to("companyproduct/productsearch")}}',
                        {{--url:'{{route('companyproduct/productsearch')}}',--}}
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
    </script>
  @endsection 
</body>
</html>
