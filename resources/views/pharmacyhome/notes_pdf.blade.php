<div style="margin: auto; width: 40%; border: 1px solid black; padding: 10px;">
	<table align="center">
		<tr>
			<td align="center"><font style="color: blue; font-size: 16px;">{{$pharmacydata->UserName}}</font></td>
		</tr>
		<tr>
			<td align="center"><font style="color: blue; font-size: 8px;">{{$pharmacydata->marketname}}</font></td>
		</tr>
		<tr>
			<td align="center">
				<font style="color: blue; font-size: 8px;">{{$pharmacydata->road}},{{$pharmacydata->district}}</font>
			</td>
		</tr>
		<tr>
			<td align="center"><font style="color: blue; font-size: 8px;">Contactno: {{$pharmacydata->Contactno}}</font></td>
		</tr>
		<tr>
			<td align="center"><font style="color: blue; font-size: 10px;">Sales Receipt</font></td>
		</tr>
		<tr>
			<td align="center"><font style="color: blue; font-size: 10px;">Invoice: {{$purchasedata->invoice}}</td>
		</tr>
	</table>
	<table align="center">
		<tr>
			<td>Date: {{ $purchasedata->date }}</td>
			<td>Time: {{ $purchasedata->time }}</td>
		</tr>
		<tr>
			<td colspan="2">Cus Contactno: {{ $purchasedata->cuscontactno }}</td>
		</tr>
		<tr>
			<td>Purchase Id: {{ $purchasedata->id }}</td>
			<td></td>
		</tr>
	</table>
	<table align="center">
		<tr>
	       <td colspan="3"><hr></td>           
	    </tr>
		<tr>
			<th style="width: 5px">SL. Item</th>
            <th>QTY</th>
            <th>Total</th>
		</tr>
		<tr>
	       <td colspan="4"><hr></td>           
	    </tr>
		@for($i=0;$i<$itemdata->count();$i++)
		{
			<tr>
				<td style="width: 5px">{{$i+1}} {{substr($itemdata[$i]->name, 0, 15)}}</td>
				<td>{{$itemdata[$i]->quantity}}</td>
				<td>{{$itemdata[$i]->total}}</td>
			</tr>
		}
		@endfor
		<tr>
	       <td colspan="3"><hr></td>           
	    </tr>
	    <tr>
	       <td>Total</td>      
	       <td></td>    
	       <td>{{$purchasedata->total}}Tk</td>       
	    </tr>
	    <tr>
	       <td>Dis Ammount</td>       
	       <td></td>    
	       <td>{{$purchasedata->discount}}Tk</td>       
	    </tr>
	    <tr>
	       <td>Net Ammount</td>    
	       <td></td>      
	       <td>{{$purchasedata->netammount}}Tk</td>       
	    </tr>
	    <tr>
	       <td>Paid By Cash</td>        
	       <td></td>    
	       <td>{{$purchasedata->netammount}}Tk</td>       
	    </tr>
	</table>
</div>