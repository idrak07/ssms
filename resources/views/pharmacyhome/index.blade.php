<!DOCTYPE html>
@extends('pharmacylayout')
<html>
<head>
	<title>Pharmacy Home</title>
</head>
<body>
	@section('index')
	<form method="post">
		{{csrf_field()}}
		<div id="admininputdiv">
			<!--
			<table align="center">
				<tr>
					<td colspan="2"><font color="red">{{session('msg')}}</font></td>
				</tr>
				<input type="hidden" name="uploader" value="{{session()->get('lastname')}}">
				<tr>
					<td colspan="2" align="center"><font color="blue">Upload New Notice</font></td>
				</tr>
				<tr>
					<td>Subject</td>
					<td><input id="admininput" type="text" name="sub">
						<font color="red">
							@if ($errors->has('sub'))
								{{ $errors->first('sub') }}
							@endif
						</font>
					</td>
				</tr>
				<tr>
					<td>Notice</td>
					<td><textarea name="notice" rows="4" cols="50"></textarea>
						<font color="red">
							@if ($errors->has('notice'))
								{{ $errors->first('notice') }}
							@endif
						</font>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input id="notice" type="submit" name="submitnotice" value="Upload"></td>
				</tr>
			</table>
			-->
		</div>
	</form>
	@endsection	
</body>
</html>