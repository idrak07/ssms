<!DOCTYPE html>
@extends('pharmacylayout')
<html>
<head>
	<title>Pharmacy Change Password</title>
</head>
<body>
	@section('changepassword')
	<form method="post">
		{{csrf_field()}}
		<div id="admininputdiv">
			<table align="center">
				<input type="hidden" name="pharmacyid" value="{{$pharmacy->Id}}">
				<tr>
					<td colspan="2" align="center"><font color="blue">Change Your Password</font></td>
				</tr>
				<tr>
					<td>Current Password</td>
					<td><input id="admininput" type="password" name="pharmacyOldPassword">
						<font color="red">
						@if ($errors->has('pharmacyOldPassword'))
							{{ $errors->first('pharmacyOldPassword') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input id="admininput" type="password" name="pharmacyNewPassword">
						<font color="red">
						@if ($errors->has('pharmacyNewPassword'))
							{{ $errors->first('pharmacyNewPassword') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input id="admininput" type="password" name="pharmacyConPassword">
						<font color="red">
						@if ($errors->has('pharmacyConPassword'))
							{{ $errors->first('pharmacyConPassword') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input id="admininput" type="submit" name="changepassword" value="Save"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><font color="red">{{session('msg')}}</font></td>
				</tr>
			</table>
		</div>
	</form>
	@endsection
</body>
</html>