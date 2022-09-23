    <div class="container-fluid">
        <div class="profile-sidebar">
            <div class="profile-box">
                <img style="width: 150px;" class="img-fluid" name="avatar" src="<?= base_url('/assets/img/avatars/avatar1.png') ?>"><br><br>
                <label for="avatar">Hello, <br> Vengeline B. Angot</label><br>
                <label for="avatar" class="role">ADMIN</label><br>
            </div>

            <footer class="sidebar-footer">
                Terms of Use | Privacy Policy
            </footer>
        </div> 
    
        <div class="main-wrapper">
            <main class="main-content">
                <div class="box-wrapper">
                    <div class="inner-content">
                        <i class="fas fa-notes-medical"></i>
                        <label for="" class="number-label">3,248</label>
                        <label for="" class="description-label">Total no. of Patient Records</label>
                    </div>    
                </div>

                <div class="box-wrapper">
                    <div class="inner-content">
                        <i class="fas fa-archive"></i>
                        <label for="" class="number-label">43</label>
                        <label for="" class="description-label">Total no. of Inventory Items</label>
                    </div>    
                </div>

                <div class="box-wrapper">
                    <div class="inner-content">
                        <i class="fas fa-user-alt"></i>
                        <label for="" class="number-label">97</label>
                        <label for="" class="description-label">Total no. of User Accounts</label>
                    </div>    
                </div>

                <div class="box-wrapper">
                    <div class="inner-content">
                        <i class="fas fa-address-book"></i>
                        <label for="" class="number-label">5</label>
                        <label for="" class="description-label">Total no. of New Patients today</label>
                    </div>    
                </div>
            
                <div class="box-wrapper">
                    
                    <label for="" style="margin-left: 20px;">Recent Activity</label>
                    <div class="inner-content">
                        <?php 
                            for ($x = 1; $x <= 10; $x++) {
                                echo "
                                <div class='tr-table' style='margin-bottom:10px;'>
                                    <table>
                                        <tr>
                                            <td style='width: auto'>
                                                <i class='fas fa-exclamation-circle'></i>
                                            </td>
                                            <td style='width: auto'>
                                                Has added a new patient record.
                                            </td>
                                            <td style='width: auto'>
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
</body>