<style>
    body {
        overflow-y: scroll;
    }
</style>

<div class="container-fluid patient-dashboard">
    <div class="patient-container shadow">
        <div class="avatar-box">
            <img src="<?php echo base_url('/assets/img/profile-avatars/' . $this->session->userdata('avatar')); ?>" alt="avatar" class="avatar">
            <!-- <img src="<?php echo base_url('/assets/img/profile-avatars/avatar1.png'); ?>" alt="avatar" class="avatar"> -->
        </div>
        <div class="personal-info">
            <div class="vline1"><?= $user_name ?><br><hr></div>
            <div class="left-info">
                <strong>Age: </strong> <?= $user_age ?> years old<br>
                <strong>Birthday: </strong> <?= $user_birthday ?><br>
                <strong>Sex: </strong><?= $user_sex ?>
            </div>
            <div class="right-info">
                <strong>Occupation: </strong><?= $user_occupation ?><br>
                <strong>Address: </strong><?= $user_address ?><br>
                <strong>Contact No: </strong><?= $user_contact_no ?>
            </div>
        </div>
    </div>

    <div class="next-consultation shadow">
        <strong>Next Consultation</strong><hr>
        <i class="fas fa-calendar-plus"></i>
        <label for="" class="date-label">Tuesday, September 12, 2022</label>
    </div>
    <label class="recent-act-patient-label" for="" style="margin-left: 20px;"><br>Recent Activity<br></label>
    <div class="recent-consultations shadow">
        <div class="dash-inner-content">
                <table id="patient-diagnosis-table" class="table table-hover ">
                    <thead>
                        <tr>
                            <th class="inv-td">Diagnosis Date</th>
                            <th class="inv-td">Diagnosis</th>
                            <th class="inv-td">Doctor</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            
        </div>    
    </div>
</div>