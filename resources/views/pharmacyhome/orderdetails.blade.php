<!DOCTYPE html>
@extends('pharmacylayout')
<html>
<head>
  <title>Order Details</title>
</head>
<body>
  @section('orderdetails') 
  <div id="admininputdiv">
    <br><br><br>
      &nbsp;&nbsp;&nbsp;<font color="blue">Order#</font> {{$order->id}} <br>
      &nbsp;&nbsp;&nbsp;<font color="blue">Placed Date:</font> {{$order->placeddate}} <br>
      @if($order->deliverydate != "")
        &nbsp;&nbsp;&nbsp;<font color="blue">Delivery Date:</font> {{$order->deliverydate}} <br>
      @endif
      &nbsp;&nbsp;&nbsp;<font color="blue">Company:</font> {{$order->cname}} <br>
      &nbsp;&nbsp;&nbsp;<font color="blue">Net Ammount:</font> {{$order->total}} Tk <br>
      &nbsp;&nbsp;&nbsp;<font color="blue">Status:</font> {{$order->status}} <br>
    <table id ="list" align="center" style="width: 90%">
      <tr>
          <th colspan="6" align="center"><font color="blue">Order Items</font><hr></th>
      </tr>
      <tr>
        <th id="listhead" style="min-width: 250px; max-width: 250px;">Product</th>
        <th id="listhead">Type</th>
        <th id="listhead">mg</th>
        <th id="listhead">Price/Box</th>
        <th id="listhead">Qty(Box)</th>
        <th id="listhead">Total</th>
      </tr>
      @foreach($items as $items)
        <tr>
          <td style="min-width: 250px; max-width: 250px;">{{substr($items->mname, 0, 20)}}</td>
          <td>{{$items->tname}}</td>
          <td>{{$items->mg}}</td>
          <td>{{$items->price}}</td>
          <td>{{$items->quantity}}</td>
          <td>{{$items->total}}</td>
        </tr>
      @endforeach
      @if($order->status == "Pending")
        <tr>
          <td colspan="6">
            <a id="trash" onclick="return confirm('Are you sure?')" 
              href="{{route('pharmacyorder.ordercancel', ['oid' => $order->id])}}">Cancel</a>
          </td>
        </tr>
      @endif
      @if($order->status == "Delivered")
        <tr>
          <td colspan="6">
            <a id="details" href="/pharmacyorder/confirm/{{$order->id}}">Confirm</a>
          </td>
        </tr>
      @endif
    </table>
  </div>
  @endsection 
</body>
</html>