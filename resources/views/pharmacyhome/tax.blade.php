<!DOCTYPE html>
@extends('pharmacylayout')
<html>
<head>
  <title>Pharmacy Tax Status</title>
</head>
<body>
  @section('tax') 
  <div id="admininputdiv">
  	<br><br><br>
  	<table align="center" style="width: 30%">
  		<tr>
  			<td><font style="font-size: 20px; color: blue;">Tax Payable:</font></td>
  			<td><font style="font-size: 20px">{{$taxinfo->ammount}} Tk</font></td>
  		</tr>
  		<tr>
  			<td><font style="font-size: 20px; color: blue;">Last Deposite Date:</font></td>
  			<td><font style="font-size: 20px;">{{$taxinfo->lastdeposited}}</font></td>
  		</tr>
  		<tr>
  			<td><font style="font-size: 20px; color: blue;">Status:</font></td>
  			<td><font style="font-size: 20px">{{$taxinfo->status}}</font></td>
  		</tr>
  	</table>
  </div>
  @endsection
</body>
</html>