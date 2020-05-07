<!DOCTYPE html>
@extends('companylayout')
<html>
<head>
  <title>Delivered Order</title>
</head>
<body>
  @section('deliveredorderlist') 
  <div id="admininputdiv">
    <br><br><br>
    <table id ="list" align="center" style="width: 90%">
    	<table id ="list" align="center" style="width: 90%">
            <tr>
                <th colspan="6" align="center"><font color="blue">Delivered Order</font><hr></th>
            </tr>
            <tr>
                <th id="listhead">Order#</th>
                <th id="listhead">Placed Date</th>
                <th id="listhead">Delivery Date</th>
                <th id="listhead">Pharmacy</th>
                <th id="listhead">Net Ammount</th>
                <th colspan="3" align="center" id="action">Action</th>
            </tr>
            @foreach($orderlist as $orderlist)
                <tr>
                    <td>{{$orderlist->id}}</td>
                    <td>{{$orderlist->placeddate}}</td>
                    <td>{{$orderlist->deliverydate}}</td>
                    <td>{{substr($orderlist->pname, 0, 20)}}</td>
                    <td>{{$orderlist->total}} Tk</td>
                    <td><a id="details" href="/companydeliveredorder/details/{{$orderlist->id}}">Details</a></td>
                </tr>
            @endforeach
        </table>
    </table>
  </div>
  @endsection
</body>
</html>
