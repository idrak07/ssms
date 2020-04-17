<html>
    <head>
        <title>App</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pharmacystyle.css') }}" >
    <script src="js/jquery.js"></script>
    </head>
    <body>
        @yield('header')
        <div id="navdiv">
        <table id="uptable">
            <td width = 1200>
                <nav>
                    <a href="/pharmacyhome">Home</a> |
                    <div class="dropdown">
                      <button class="dropbtn">☰GoTo</button>
                      <div class="dropdown-content">
                        <a href="/admin">Admin</a>
                        <a href="/manager">Manager</a>
                        <a href="/member">Member</a>
                        <a href="/mess">Mess</a>
                      </div>
                    </div> |
                    <a href="/orderforsupply">Order</a> |
                    <a href="/pharmacynotification">🔔Notification</a> |
                    <a href="/pharmacysetting">Setting</a> |
                    <a href="/pharmacychangepassword">Change Password</a> |
                    <a href="/pharmacylogout">Logout</a>
                </nav>
            </td>
        </table>
    </div>
    @yield('orderforsupply')
    @yield('index')
    @yield('changepassword')
    
    </body>
</html>