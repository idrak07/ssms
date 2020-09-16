<html>
    <head>
        <title>App</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/customstyle.css') }}" >
        <script src="js/jquery.js"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
    </head>
    <body>
        @yield('header')
        <div id="navdiv">
        <table id="uptable">
            <td width = 1200>
                <nav>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="/pharmacyhome"><font id="uplinkfont">Home</font></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="/orderforsupply"><font id="uplinkfont">Make Supply Request</font></a> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <div class="dropdown">
                      <button class="dropbtn"><font id="uplinkfont">☰{{session('pharmacyname')}}</font></button>
                      <div class="dropdown-content">
                        <a href="/pharmacyorderlist">Supply Request</a>  
                        <a href="/pharmacyinventory">Inventory</a>
                        <a href="/pharmacypurchaselist">Transactions</a> 
                        <a href="/pharmacytax">Tax Status</a>
                        <a href="/pharmacychangepassword">Change Password</a> 
                        <a href="/logout"><font id="uplinkfont">Logout</font></a>
                      </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="/logout"><font id="uplinkfont">Logout</font></a>
                </nav>
            </td>
        </table>
    </div>
    @yield('index')
    @yield('orderforsupply')
    @yield('placedorder')
    @yield('processorder')
    @yield('orderlist')
    @yield('orderdetails')
    @yield('purchaselist')
    @yield('purchasedetails')
    @yield('inventory')
    @yield('tax')
    @yield('changepassword')
    @yield('passwordchanged') 
    </body>
</html>