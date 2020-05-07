<!DOCTYPE html>
@extends('companylayout')
<html>
<head>
  <title>Pending Order Details</title>
</head>
<body>
  @section('pendingorderdetails') 
  <div id="admininputdiv">
    <form method="post" style="background: none">
      {{csrf_field()}} 
    	&nbsp;&nbsp;&nbsp;<font color="blue">Order#</font> {{$order->id}} <br>
    	&nbsp;&nbsp;&nbsp;<font color="blue">Placed Date:</font> {{$order->placeddate}} <br>
      &nbsp;&nbsp;&nbsp;<font color="blue">Placed Time:</font> {{$order->time}} <br>
    	&nbsp;&nbsp;&nbsp;<font color="blue">Pharmacy:</font> {{$order->pname}} <br>
      &nbsp;&nbsp;&nbsp;<font color="blue">Address:</font> {{$order->market}},{{$order->road}},{{$order->district}}<br>
      &nbsp;&nbsp;&nbsp;<font color="blue">Contact:</font> {{$order->contact}} <br>
    	&nbsp;&nbsp;&nbsp;<font color="blue">Net Ammount:</font> {{$order->total}} Tk <br>
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
              <th id="listhead">Select Batch</th>
          </tr>
          @foreach($items as $items)
              <tr>
                  <td>{{substr($items->mname, 0, 30)}}<input type="hidden" name="mid[]" id="mid" value="{{$items->mid}}"></td>
                  <td>{{$items->price}}</td>
                  <td>{{$items->quantity}}<input type="hidden" name="q[]" id="q" value="{{$items->quantity}}"></td>
                  <td>{{$items->total}}</td>
                  <td>
                    <select name="batchid[]">
                      <option>Select Batch</option>>
                    @foreach($batchitems as $bitems)
                      @if($bitems->mid == $items->mid)
                        <option value="{{$bitems->id}}">{{$bitems->batchno}}({{$bitems->quantitybox}} Box Left)</option>    
                      @endif
                    @endforeach
                    </select>
                  </td>
              </tr>   
          @endforeach 
          <tr>
            <td colspan="5" align="center"><font color="red">{{session('msg')}}</font></td>
          </tr>  
          <tr>
            <td colspan="5"><input type="submit" name=""  value="Confirm" id="admininput" style="width: 200px"></td>
          </tr>  
      </table>
    </form>
  </div>
  <script type="text/javascript">
    
  </script>
  @endsection 
</body>
</html>