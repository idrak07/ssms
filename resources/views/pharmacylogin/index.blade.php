<!DOCTYPE html>
<html>
<head>
	<title>Pharmacy Login</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/pharmacystyle.css') }}" >
</head>
<body>
	<div id="navdiv">
		<table id="uptable" bgcolor="#3e8e41" height="35px">
			<td colspan="3" width = 1200>
				<nav>
					<h3>Do not Have an ID?Go To <a href="/adminregistration">Registration<h3></a>
				</nav>
			</td>
		</table>
	</div>
	<form method="post">
		{{csrf_field()}}
		<div id="admininputdiv">
			<table align="center">
				<tr>
					<th colspan="2" align="center"><h1>Login As Pharmacy</h1></th>
				</tr>
				<tr>
					<td colspan="2" align="center"><h3>Enter Your UserName</h3></td>
				</tr>
				<tr>
					<td>UserName</td>
					<td><input id="admininput" type="text" name="UserName">
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
				<tr>
					<td colspan="2"><font color="red">{{session('msg')}}</font></td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>