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
                    <a href="/companyhome"><font id="uplinkfont">Home</font></a> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="/companyhome"><font id="uplinkfont">Pending Supply Request</font></a> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="dropdown">
                      <button class="dropbtn"><font id="uplinkfont">☰{{session('companyname')}}</font></button>
                      <div class="dropdown-content">
                        <a href="/companyproduct">Products</a>
                        <a href="/companyproductrelease">Product Release</a>
                        <a href="/companydeliveredorder">Delivered Order</a>
                        <a href="/companyinventory">Inventory</a>
                        <a href="/companyupdateinventory">Add New Batch</a>
                        <a href="/companytax">Tax Status</a>
                        <a href="/companychangepassword">Change Password</a>
                        <a href="/logout"><font id="uplinkfont">Logout</a>
                      </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="/logout"><font id="uplinkfont">Logout</font></a>
                </nav>
            </td>
        </table>
    </div>
    @yield('index')
    @yield('pendingorderdetails')
    @yield('deliveredorderlist')
    @yield('deliveredorderdetails')
    @yield('inventory')
    @yield('inventoryupdate')
    @yield('productrelease')
    @yield('requestsubmitted')
    @yield('productlist')
    @yield('productdetails')
    @yield('tax')
    @yield('changepassword')
    @yield('passwordchanged')
    </body>
</html>