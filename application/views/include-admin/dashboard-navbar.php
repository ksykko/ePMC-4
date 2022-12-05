<body id="page-top">

    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo ms-2" href="#"><img class="img-fluid" width="75" height="50" src="<?= base_url('/assets/img/logo/ePMC2.png') ?>" alt=""></a>
        <button class="navbar-toggler navbar-icon" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
                <!-- add patient dashboard if else -->
                <?php if ($user_role == 'Patient' || $user_role == 'patient') { ?>
                    <li <?php if ($this->uri->segment(1) == "Patient") {
                            echo 'class="active"';
                        } ?> class="nav-item">
                        <a class="nav-link" href="<?= site_url('Patient/index') ?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                <?php } elseif ($specialization == 'Pharmacy Assistant' || $specialization == 'pharmacy assistant') { ?>
                    <li <?php if ($this->uri->segment(1) == "Patient") {
                            echo 'class="active"';
                        } ?> class="nav-item">
                        <a class="nav-link" href="<?= site_url('PharmacyAssistant') ?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                <?php } else { ?>
                    <li <?php if ($this->uri->segment(1) == "Admin") {
                            echo 'class="active"';
                        } ?> class="nav-item">
                        <a class="nav-link" href="<?php echo ($user_role == 'Doctor') ? site_url('Doctors/index') : site_url('Admin/index'); ?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                <?php } ?>
                <?php if ($user_role == 'Admin' || $user_role == 'admin') { ?>
                    <?php if ($specialization == 'Pharmacy Assistant' || $specialization == 'pharmacy assistant') : ?>
                        <li <?php if ($this->uri->segment(1) == "Admin_inventory") {
                                echo 'class="active"';
                            } ?> class="nav-item">
                            <a class="nav-link" href="<?= site_url('Admin_inventory/index') ?>"><i class="far fa-chart-bar"></i>Inventory</a>
                        </li>
                    <?php else : ?>
                        <!-- add only viewing for patient records general information -->
                        <li <?php if ($this->uri->segment(1) == "Admin_useracc") {
                                echo 'class="active"';
                            } ?> class="nav-item">
                            <a class="nav-link" href="<?= site_url('Admin_useracc/index') ?>"><i class="far fa-address-book"></i>User Accounts</a>
                        </li>
                        <li <?php if ($this->uri->segment(1) == "Admin_patientrec") {
                                echo 'class="active"';
                            } ?> class="nav-item">
                            <a class="nav-link" href="<?= site_url('Admin_patientrec/index') ?>"><i class="far fa-clone"></i>Patient Records</a>
                        </li>
                        <li <?php if ($this->uri->segment(1) == "Admin_schedule") {
                                echo 'class="active"';
                            } ?> class="nav-item">
                            <a class="nav-link" href="<?= site_url('Admin_schedule/index') ?>"><i class="far fa-calendar-alt"></i>Schedule</a>
                        </li>
                        <li <?php if ($this->uri->segment(1) == "Admin_inventory") {
                                echo 'class="active"';
                            } ?> class="nav-item">
                            <a class="nav-link" href="<?= site_url('Admin_inventory/index') ?>"><i class="far fa-chart-bar"></i>Inventory</a>
                        </li>
                        <li <?php if ($this->uri->segment(1) == "Admin_reports") {
                                echo 'class="active"';
                            } ?> class="nav-item">
                            <a class="nav-link" href="<?= site_url('Admin_reports/index') ?>"><i class="far fa-copy"></i>Reports</a>
                        </li>
                    <?php endif; ?>




                <?php } elseif ($user_role == 'Doctor' || $user_role == 'doctor') { ?>
                    <li <?php if ($this->uri->segment(1) == "Admin_patientrec") {
                            echo 'class="active"';
                        } ?> class="nav-item">
                        <a class="nav-link" href="<?= site_url('Doctor_patientrec/index') ?>"><i class="far fa-clone"></i>Patient Records</a>
                    </li>
                    <li <?php if ($this->uri->segment(1) == "Admin_schedule") {
                            echo 'class="active"';
                        } ?> class="nav-item">
                        <a class="nav-link" href="<?= site_url('Admin_schedule/index') ?>"><i class="far fa-calendar-alt"></i>Schedule</a>
                    </li>
                    <li <?php if ($this->uri->segment(1) == "Admin_reports") {
                            echo 'class="active"';
                        } ?> class="nav-item">
                        <a class="nav-link" href="<?= site_url('Doctor_reports/index') ?>"><i class="far fa-copy"></i>Reports</a>
                    </li>

                <?php } elseif ($user_role == 'Patient' || $user_role == 'patient') { ?>
                    <!-- patient record viewing only -->
                    <li <?php if ($this->uri->segment(1) == "Patient_patientrec") {
                            echo 'class="active"';
                        } ?> class="nav-item">
                        <a class="nav-link" href="<?= site_url('Patient_patientrec/index') ?>"><i class="far fa-clone"></i>Patient Record</a>
                    </li>
                    <!-- change to viewing of schedules -->
                    <li <?php if($this->uri->segment(1) == "Admin_schedule"){echo 'class="active"';}?> class="nav-item">
                        <a class="nav-link" href="<?= site_url('Patient_schedule/index') ?>"><i class="far fa-calendar-alt"></i>Schedule</a>
                    </li>  
                <?php }?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Login/logout') ?>"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>