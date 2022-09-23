<body>
    <header>
        <div id="navbar-animmenu">
            <ul class="show-dropdown main-navbar">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li>
                    <a href="javascript:void(0);"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="javascript:void(0);"><i class="fas fa-users"></i>User Accounts</a>
                </li>
                <li>
                    <a href="javascript:void(0);"><i class="fas fa-id-badge"></i>Patient Records</a>
                </li>
                <li>
                    <a href="javascript:void(0);"><i class="far fa-calendar-alt"></i>Schedule</a>
                </li>
                <li class="active">
                    <a href="javascript:void(0);"><i class="fas fa-archive"></i>Inventory</a>
                </li>
                <li>
                    <a href="javascript:void(0);"><i class="far fa-chart-bar"></i>Reports</a>
                </li>
                <li>
                    <a href="javascript:void(0);"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
            </ul>
        </div>
    </header>

   <div class="main-wrapper2">
        <div class="input-group">
            <div class="form-outline">
                <input type="search" id="form1" class="form-control" placeholder="Search" />
            </div>

            <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <table border="1" class="inventory-table">
            <tr>
                <td>#Id</td>
                <td>Product Name</td>
                <td>Description</td>
                <td>Stock In</td>
                <td>Stock Out</td>
                <td>Action</td>
            </tr>
        </table>
   </div>
    

</body>