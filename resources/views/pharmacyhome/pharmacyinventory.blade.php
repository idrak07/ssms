<!DOCTYPE html>
@extends('pharmacylayout')
<html>
<head>
  <title>Pharmacy Inventory</title>
</head>
<body>
  @section('inventory') 
    <div id="admininputdiv">
        <br><br><br>
        <input type="search" class="form-control" id="search" placeholder="Search by Product's Name"
                                 onkeyup="info1()" style="width:250px;left:190px;position:absolute;" />
        <br><br>
        <table id ="list" align="center" style="width: 90%">
            <tr>
                <th colspan="5" align="center"><font color="blue">Inventory</font><hr></th>
            </tr>
            <tr>
                <th id="listhead" style="min-width: 280px; max-width: 280px;">Product</th>
                <th id="listhead">Type</th>
                <th id="listhead">mg</th>
                <th id="listhead">Unit</th>
                <th id="listhead">MRP</th>
            </tr>
            <tbody id="success">
                @foreach($inventorylist as $inventorylist)
                    <tr>
                        <td style="min-width: 280px; max-width: 280px;">{{substr($inventorylist->mname, 0, 20)}}</td>
                        <td>{{$inventorylist->tname}}</td>
                        <td>{{$inventorylist->mg}}</td>
                        <td>{{$inventorylist->unit}}</td>
                        <td>{{$inventorylist->mrp}}</td>
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
                url:'{{URL::to("pharmacyinventory/itemsearch")}}',
                    {{--url:'{{route('pharmacyinventory.itemsearch')}}',--}}
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