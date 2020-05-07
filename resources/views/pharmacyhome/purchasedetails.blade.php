<!DOCTYPE html>
@extends('pharmacylayout')
<html>
<head>
  <title>Transaction Details</title>
</head>
<body>
  @section('purchasedetails') 
  <div id="admininputdiv">
    <br><br>
  	&nbsp;&nbsp;&nbsp;<font color="blue">Purchase#</font> {{$purchase->id}} <br>
    &nbsp;&nbsp;&nbsp;<font color="blue">Cus Contactno:</font> {{$purchase->cuscontactno}} <br>
  	&nbsp;&nbsp;&nbsp;<font color="blue">Date:</font> {{$purchase->date}} <br>
    &nbsp;&nbsp;&nbsp;<font color="blue">Time:</font> {{$purchase->time}} <br>
  	&nbsp;&nbsp;&nbsp;<font color="blue">Total Ammount:</font> {{$purchase->total}} Tk <br>
  	&nbsp;&nbsp;&nbsp;<font color="blue">Discount:</font> {{$purchase->discount}} Tk <br>
    &nbsp;&nbsp;&nbsp;<font color="blue">Net Ammount:</font> {{$purchase->netammount}} Tk <br>
  	<table id ="list" align="center" style="width: 90%">
        <tr>
            <th colspan="6" align="center"><font color="blue">Puchase Items</font><hr></th>
        </tr>
        <tr>
            <th id="listhead" style="min-width: 280px; max-width: 280px;">Product</th>
            <th id="listhead">Type</th>
            <th id="listhead">mg</th>
            <th id="listhead">MRP</th>
            <th id="listhead">Quantity</th>
            <th id="listhead">Total</th>
        </tr>
        @foreach($items as $items)
            <tr>
                <td style="min-width: 280px; max-width: 280px;">{{substr($items->name, 0, 20)}}</td>
                <td>{{$items->tname}}</td>
                <td>{{$items->mg}}</td>
                <td>{{$items->mrp}}</td>
                <td>{{$items->quantity}}</td>
                <td>{{$items->total}}</td>
            </tr>
        @endforeach
    </table>
  </div>
  @endsection 
</body>
</html>