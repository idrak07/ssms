<!DOCTYPE html>
@extends('companylayout')
<html>
<head>
  <title>Company Inventory</title>
</head>
<body>
  @section('inventory') 
    <div id="admininputdiv">
        <br><br><br>
    	<a href="/companyupdateinventory" style="left: 190px;position: absolute;"><font id="uplinkfont">Add New Batch</font></a>
        <br><br>
        <input type="search" id="search" placeholder="Search by Product's Name" 
               onkeyup="info1()" style="width:250px;left:190px;position:absolute;" />
        <br><br>
    	<table id ="list" align="center" style="width: 90%">
        <tr>
            <th colspan="4" align="center"><font color="blue">Inventory</font><hr></th>
        </tr>
        <tr>
            <th id="listhead">Product</th>
            <th id="listhead">Batch No</th>
            <th id="listhead">Quantity(Box)</th>
            <th id="listhead">Action</th>
        </tr>
        <tbody id="success">
            @foreach($inventorylist as $inventorylist)
                <tr>
                    <td>{{substr($inventorylist->mname, 0, 30)}}</td>
                    <td>{{$inventorylist->batchno}}</td>
                    <td>{{$inventorylist->quantitybox}}</td>
                    <td>
                        @if($inventorylist->status == "")
                        <a onclick="return confirm('Are you sure?')" id="trash" 
                           href="{{route('companyinventory.delete', ['inventoryid' => $inventorylist->id])}}">Delete</a>
                        @else
                            Assigned
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
                url:'{{URL::to("companyinventory/itemsearch")}}',
                    {{--url:'{{route('companyinventory.itemsearch')}}',--}}
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