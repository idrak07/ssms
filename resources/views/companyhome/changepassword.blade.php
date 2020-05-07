<!DOCTYPE html>
@extends('companylayout')
<html>
<head>
	<title>Company Change Password</title>
</head>
<body>
	@section('changepassword')
	<form method="post" style="background: none">
		{{csrf_field()}}
		<div id="admininputdiv" style="margin: 0px 80px">
			<table align="center">
				<input type="hidden" name="companyid" value="{{$company->id}}">
				<tr>
					<td colspan="2" align="center"><font color="blue">Change Your Password</font></td>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><font color="red">{{session('msgcompass')}}</font></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><font color="red">
						@if ($errors->has('companyOldPassword'))
							{{ $errors->first('companyOldPassword') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>Current Password</td>
					<td><input id="admininput" type="password" name="companyOldPassword" maxlength="20"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><font color="red">
						@if ($errors->has('companyNewPassword'))
							{{ $errors->first('companyNewPassword') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input id="admininput" type="password" name="companyNewPassword" minlength="6" maxlength="20"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><font color="red">
						@if ($errors->has('companyConPassword'))
							{{ $errors->first('companyConPassword') }}
						@endif
						<font>
					</td>
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input id="admininput" type="password" name="companyConPassword" maxlength="20"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input id="admininput" type="submit" name="changepassword" value="Save"></td>
				</tr>
			</table>
		</div>
	</form>
	@endsection
</body>
</html>