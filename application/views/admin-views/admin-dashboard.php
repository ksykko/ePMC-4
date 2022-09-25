    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
            height: 100vh;
            display: flex;
            background-color: #f0f0f0 !important;
            flex-direction: column;
        }

        * {
            margin: 0;
            padding: 0;
        }

        i {
            margin-right: 10px;
        }
    </style>

    <div class="container-fluid dashboard-container">
        <div class="profile-sidebar">
            <div class="profile-box">
                <img style="width: 200px;" class="img-fluid" name="avatar" src="<?= base_url('/assets/img/avatars/avatar1.png') ?>"><br><br>
                <label for="avatar">Hello, <br> Vengeline B. Angot</label><br>
                <label for="avatar" class="role">ADMIN</label><br>
            </div>

            <footer class="sidebar-footer">
                Terms of Use | Privacy Policy
            </footer>
        </div> 
    
        <div class="main-wrapper dashboard-main-wrapper">
            <main class="main-content dash-main-content">
                <div class="box-wrapper bw-dashboard">
                    <div class="dash-inner-content">
                        <i class="fas fa-notes-medical"></i>
                        <label for="" class="number-label">3,248</label>
                        <label for="" class="description-label">Total no. of Patient Records</label>
                    </div>    
                </div>

                <div class="box-wrapper bw-dashboard">
                    <div class="dash-inner-content">
                        <i class="fas fa-archive"></i>
                        <label for="" class="number-label">43</label>
                        <label for="" class="description-label">Total no. of Inventory Items</label>
                    </div>    
                </div>

                <div class="box-wrapper bw-dashboard">
                    <div class="dash-inner-content">
                        <i class="fas fa-user-alt"></i>
                        <label for="" class="number-label">97</label>
                        <label for="" class="description-label">Total no. of User Accounts</label>
                    </div>    
                </div>

                <div class="box-wrapper bw-dashboard">
                    <div class="dash-inner-content">
                        <i class="fas fa-address-book"></i>
                        <label for="" class="number-label">5</label>
                        <label for="" class="description-label">Total no. of New Patients today</label>
                    </div>    
                </div>
            
                <div class="box-wrapper bw-dashboard">
                    
                    <label class="recent-act-label" for="" style="margin-left: 20px;"><br>Recent Activity<br></label>
                    <div class="dash-inner-content">
                        <?php 
                            for ($x = 1; $x <= 10; $x++) {
                                echo "
                                <div class='tr-table' style='margin-bottom:10px;'>
                                    <table>
                                        <tr>
                                            <td>
                                                <i class='fas fa-exclamation-circle'></i>
                                            </td>
                                            <td>
                                                Has added a new patient record.
                                            </td>
                                            <td>
                                                02/09/2021  09:00 AM
                                            </td>    
                                        </tr>  
                                    </table>
                                </div>";
                            }
                        ?>
                    </div>    
                </div>
            </main>
        </div>
    </div>
</body">