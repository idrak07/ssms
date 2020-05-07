<!DOCTYPE html>
@extends('companylayout')
<html>
<head>
  <title>Order Details</title>
</head>
<body>
  @section('deliveredorderdetails') 
  <div id="admininputdiv">
    <br><br><br>
    &nbsp;&nbsp;&nbsp;<font color="blue">Order#</font> {{$order->id}} <br>
    &nbsp;&nbsp;&nbsp;<font color="blue">Placed Date:</font> {{$order->placeddate}} <br>
    &nbsp;&nbsp;&nbsp;<font color="blue">Placed Time:</font> {{$order->time}} <br>
    &nbsp;&nbsp;&nbsp;<font color="blue">Delivery Date:</font> {{$order->deliverydate}} <br>
    &nbsp;&nbsp;&nbsp;<font color="blue">Pharmacy:</font> {{$order->pname}} <br>
    &nbsp;&nbsp;&nbsp;<font color="blue">Address:</font> {{$order->market}},{{$order->road}},{{$order->district}}<br>
    &nbsp;&nbsp;&nbsp;<font color="blue">Contact:</font> {{$order->contact}} <br>
  	&nbsp;&nbsp;&nbsp;<font color="blue">Net Ammount:</font> {{$order->total}} Tk<br>
   	&nbsp;&nbsp;&nbsp;<font color="blue">Status:</font> {{$order->status}} <br>
    <table id ="list" align="center" style="width: 90%">
        <tr>
            <th colspan="5" align="center"><font color="blue">Order Items</font><hr></th>
        </tr>
        <tr>
            <th id="listhead">Product</th>
            <th id="listhead">Price/Box</th>
            <th id="listhead">Qty(Box)</th>
            <th id="listhead">Total</th>
            <th id="listhead">Batch</th>
        </tr>
        @foreach($items as $items)
            <tr>
                <td>{{substr($items->mname, 0, 20)}}</td>
                <td>{{$items->price}}</td>
                <td>{{$items->quantity}}</td>
                <td>{{$items->total}}</td>
                <td>
                    @foreach($batchitems as $bitems)
                    	@if($bitems->mid == $items->mid)
                        	{{$bitems->batchno}}   
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
  </div>
  @endsection
</body>
</html>