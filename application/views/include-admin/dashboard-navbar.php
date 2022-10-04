<body id="page-top">
    
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo" href="#">ePMC</a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li <?php if($this->uri->segment(1) == "Admin"){echo 'class="active"';}?> class="nav-item">
                    <a class="nav-link" href="<?= site_url('Admin/index') ?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li <?php if($this->uri->segment(1) == "Admin_useracc"){echo 'class="active"';}?>  class="nav-item">
                    <a class="nav-link" href="<?= site_url('Admin_useracc/index') ?>"><i class="far fa-address-book"></i>User Accounts</a>
                </li>
                <li <?php if($this->uri->segment(1) == "Admin_patientrec"){echo 'class="active"';}?> class="nav-item">
                    <a class="nav-link" href="<?= site_url('Admin_patientrec/index') ?>"><i class="far fa-clone"></i>Patient Records</a>
                </li>
                <li <?php if($this->uri->segment(1) == "Admin_schedule"){echo 'class="active"';}?> class="nav-item">
                    <a class="nav-link" href="<?= site_url('Admin_schedule/index') ?>"><i class="far fa-calendar-alt"></i>Schedule</a>
                </li>
                <li <?php if($this->uri->segment(1) == "Admin_inventory"){echo 'class="active"';}?> class="nav-item">
                    <a class="nav-link" href="<?= site_url('Admin_inventory/index') ?>"><i class="far fa-chart-bar"></i>Inventory</a>
                </li>
                <li <?php if($this->uri->segment(1) == "Admin_reports"){echo 'class="active"';}?> class="nav-item">
                    <a class="nav-link" href="<?= site_url('Admin_reports/index') ?>"><i class="far fa-copy"></i>Reports</a>
                </li>
            </ul>
        </div>
    </nav>