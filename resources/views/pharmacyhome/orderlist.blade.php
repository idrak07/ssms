<!DOCTYPE html>
@extends('pharmacylayout')
<html>
<head>
  <title>Order List</title>
</head>
<body>
  @section('orderlist') 
  <div id="admininputdiv">
        <table id ="list" align="center" style="width: 90%">
            <br><br><br>
            <tr>
                <th colspan="6" align="center"><font color="blue">Your Supply Request List</font><hr></th>
            </tr>
            <tr>
                <th id="listhead">Order#</th>
                <th id="listhead">Placed Date</th>
                <th id="listhead">Company</th>
                <th id="listhead">Net Ammount</th>
                <th id="listhead">Status</th>
                <th colspan="3" align="center" id="action">Action</th>
            </tr>
            @foreach($orderlist as $orderlist)
                <tr>
                    <td>{{$orderlist->id}}</td>
                    <td>{{$orderlist->placeddate}}</td>
                    <td>{{$orderlist->cname}}</td>
                    <td>{{$orderlist->total}}Tk</td>
                    <td>{{$orderlist->status}}</td>
                    <td><a id="details" href="/pharmacyorder/details/{{$orderlist->id}}">Details</a>
                        @if($orderlist->status == "Delivered")
                            <a id="details" href="/pharmacyorder/confirm/{{$orderlist->id}}">Confirm</a>
                        @endif
                        @if($orderlist->status == "Pending")
                            <a id="trash" onclick="return confirm('Are you sure?')" 
                            href="{{route('pharmacyorder.ordercancel', ['oid' => $orderlist->id])}}">Cancel</a>    
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
  </div>
  @endsection 
</body>
</html>