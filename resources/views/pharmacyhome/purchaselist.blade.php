<!DOCTYPE html>
@extends('pharmacylayout')
<html>
<head>
  <title>Transaction List</title>
</head>
<body>
  @section('purchaselist') 
  <div id="admininputdiv">
    <br><br><br>
    <input type="text" name="cuscontactno" style="width: 250px;" id="search" maxlength="11"        placeholder="Search by customer contact.no"><input type="button" id="searchpresbutton" value="Search" onclick="info1()""> 
    <br><br>
  	<table id ="list" align="center" style="width: 90%">
        <tr>
            <th colspan="8" align="center"><font color="blue">Transaction List</font><hr></th>
        </tr>
        <tr>
            <th id="listhead">Purchase#</th>
            <th id="listhead">Cus Contact</th>
            <th id="listhead">Date</th>
            <th id="listhead">Time</th>
            <th id="listhead">Total</th>
            <th id="listhead">Discount</th>
            <th id="listhead">Net Ammount</th>
            <th colspan="3" align="center" id="action">Action</th>
        </tr>
        <tbody id="success">
            @foreach($purchaselist as $purchaselist)
            <tr>
                <td>{{$purchaselist->id}}</td>
                <td>{{$purchaselist->cuscontactno}}</td>
                <td>{{$purchaselist->date}}</td>
                <td>{{$purchaselist->time}}</td>
                <td>{{$purchaselist->total}}</td>
                <td>{{$purchaselist->discount}}</td>
                <td>{{$purchaselist->netammount}}</td>
                <td><a id="details" href="/pharmacypurchase/details/{{$purchaselist->id}}">Details</a></td>
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
                    url:'{{URL::to("pharmacypurchase/itemsearch")}}',
                        {{--url:'{{route('pharmacypurchase.itemsearch')}}',--}}
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