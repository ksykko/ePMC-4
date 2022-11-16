<style>
    body {
        overflow-y: scroll;
    }
</style>

<div class="container-fluid patient-dashboard">
    <div class="patient-container shadow">
        <div class="avatar-box">
            <img class="img-fluid avatar" src="<?php echo base_url('/assets/img/profile-avatars/' . $patient->avatar); ?>" alt="avatar">
        </div>
        <div class="personal-info">
            <div class="vline1"><?= $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name ?><br><hr></div>
            <div class="left-info">
                <strong>Age: </strong> <?= ($user_age) ? $user_age . ' years old' : 'N/A' ?><br>
                <strong>Birthday: </strong> <?= ($user_birthday == '0000-00-00') ? 'N/A' : $user_birthday ?><br>
                <strong>Sex: </strong><?= ($user_sex) ? $user_sex : 'N/A' ?>
            </div>
            <div class="right-info">
                <strong>Occupation: </strong><?= ($user_occupation) ? $user_occupation : 'N/A' ?><br>
                <strong>Address: </strong><?= ($user_address) ? $user_address : 'N/A' ?><br>
                <strong>Contact No: </strong><?= ($user_contact_no) ? $user_contact_no : 'N/A' ?>
            </div>
        </div>
    </div>

    <div class="next-consultation shadow">
        <strong>Next Consultation</strong><hr>
        <i class="fas fa-calendar-plus"></i>
        <?php 
            $date = strtotime($patient_details->consul_next);
            $consul_next = date("l, M d Y", $date);
            $consul_time = date("g:i A", $date);
        ?>
        <label for="" class="Date-label"><?= $consul_next?> <br> <?= $consul_time?></label>
    </div>

    <label class="recent-act-patient-label" for="" style="margin-left: 20px;"><br>Consultation History<br></label>
    <div class="recent-consultations shadow">
        <div class="dash-inner-content">
                <table id="patient-diagnosis-table" class="table table-hover ">
                    <thead>
                        <tr>
                            <th class="inv-td">Consultation Date</th>
                            <th class="inv-td">Doctor</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            
        </div>    
    </div>
</div>