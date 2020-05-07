<!DOCTYPE html>
@extends('companylayout')
<html>
<head>
  <title>Product Details</title>
</head>
<body>
  @section('productdetails') 
    <div id="admininputdiv">
        <br><br>
        <table id ="list" align="center" style="width: 90%">
        	<tr>
        		<td colspan="2"><font style="color: blue; font-size: 28px">{{$productinfo->name}}</font></td>
        	</tr>
        	<tr>
        		<td>
        			<font style="color: blue; font-size: 16px">Generic: </font>{{$productinfo->gname}}<br>
        			<font style="color: blue; font-size: 16px">Type: </font>{{$productinfo->tname}}<br>
        			<font style="color: blue; font-size: 16px">mg: </font>{{$productinfo->mg}}<br>
        			<font style="color: blue; font-size: 16px">Price/Box: </font>{{$productinfo->price}}<br>
        			<font style="color: blue; font-size: 16px">Unit/Box: </font>{{$productinfo->unitperbox}}<br>
        			<font style="color: blue; font-size: 16px">MRP: </font>{{$productinfo->mrp}}<br>
        			<font style="color: blue; font-size: 16px">Status: </font>{{$productinfo->status}}
        		</td>
        		<td style="width: 70%">
        			{{$productinfo->details}}
        		</td>
        	</tr>
        	<tr>
        		<td colspan="2" align="center">
        			@if($productinfo->status == "Listed")
                    		<a id="trash" onclick="return confirm('Are you sure?')" 
                               href="/companyproduct/hide/{{$productinfo->id}}">&nbsp;&nbsp;Hide&nbsp;&nbsp;</a>
                    @endif
                   	@if($productinfo->status == "Hidden")
                   		<a id="details" onclick="" href="/companyproduct/unhide/{{$productinfo->id}}">Unhide</a>
                   	@endif
        		</td>
        	</tr>
        </table>
    </div>
  @endsection 
</body>
</html>