<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/customstyle.css') }}" >
</head>
<body style="background-color: #F0F0F0;">
	<form method="post" style="background: none">
		{{csrf_field()}}
		<div id="logindiv">
			<table align="center">
				<tr>
					<td colspan="2" align="right"><h3 style="text-shadow: 2px 2px 4px #000000;">Welcome To 
						                                                       <br>Secured Medicine Supply System</h3></td>
				</tr>
				<tr>
					<th colspan="2" align="center"><font style="font-size: 12px">Login With Your Contact No and Password</font></th>
				</tr>
				<tr>
					<td colspan="2" align="center"><font color="red">{{session('msg')}}</font></td>
				</tr>
				<tr>
					<td>Contact No</td>
					<td><input id="admininput" type="text" name="Contactno">
						<font color="red">
							@if ($errors->has('UserName'))
								{{ $errors->first('UserName') }}
							@endif
						</font>
					</td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input id="admininput" type="password" name="Password">
						<font color="red">
							@if ($errors->has('Password'))
								{{ $errors->first('Password') }}
							@endif
						</font>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input id="admininput" type="submit" name="adminLogin" value="Login"></td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>