<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);

    body {
        overflow-y: scroll;
    }

    .radio-emoji,
    .radio-star {
        position: absolute;
        left: -9999px;
    }

    .radio-emoji+label {
        font-size: 40px;
        border-radius: 4px;
        opacity: 0.25;
    }

    .radio-emoji+label:hover {
        cursor: pointer;
        /* background-color: #e0e0e0; */
    }

    .radio-emoji:checked+label {
        opacity: 1;
    }

    /* .label-emoji.inactive {
    opacity: 0.25;
    } */

    .container-satisfaction {
        padding: 40px;
    }

    .col-label {
        color: black;
        font-size: 10px;
    }

    .column {
        margin: 0;
        padding: 0;
    }

    .feedback-label {
        font-size: 15px;
    }

    .feedback {
        border-radius: 5px;
    }

    .feed-modal {
        border: 0px !important;
        box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em !important;
        border-radius: 1px;
    }

    .feed-footer {
        background-color: #dbdbdb !important;
        border-radius: 1px;
    }

    .cont {
        width: 100%;
        text-align: center;
        color: #EEE;
        overflow: hidden;
    }

    hr {
        margin: 20px;
        border: none;
        border-bottom: thin solid rgba(255, 255, 255, .1);
    }

    div.title {
        font-size: 2em;
    }

    h1 span {
        font-weight: 300;
        color: #Fd4;
    }

    div.stars {
        width: 270px;
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 10px;
        font-size: 36px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }


    input.star-5:checked~label.star:before {
        color: #FD4;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }

    .rev-box {
        overflow: hidden;
        height: 0;
        width: 100%;
        transition: all .25s;
    }

    textarea.review {
        background: #222;
        border: none;
        width: 100%;
        max-width: 100%;
        height: 100px;
        padding: 10px;
        box-sizing: border-box;
        color: #EEE;
    }

    label.review {
        display: block;
        transition: opacity .25s;
    }

    input.star:checked~.rev-box {
        height: 125px;
        overflow: visible;
    }
</style>

<div class="container-fluid patient-dashboard">
    <div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
        <?php if ($this->session->flashdata('message') == 'success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You have successfully sent your feedback.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'success_update') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You have successfully updated your feedback.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'failed') : ?>
            <div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-error">
                    <strong class="me-auto">Error!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You have failed in sending your feedback.<br>
                        <small class="text-danger"><?= form_error('patient_id') ?></small>
                        <small class="text-danger"><?= form_error('rating') ?></small>
                        <small class="text-danger"><?= form_error('rating_description') ?></small>
                    </span>

                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="patient-container shadow">
        <div class="avatar-box">
            <img class="img-fluid avatar" src="<?php echo base_url('/assets/img/profile-avatars/' . $patient->avatar); ?>" alt="avatar">
        </div>
        <div class="personal-info">
            <div class="vline1"><?= $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name ?><br>
                <hr>
            </div>
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
        <strong>Next Consultation</strong>
        <hr>
        <i class="fas fa-calendar-plus"></i>
        <?php
        $date = strtotime($patient_details->consul_next);
        $consul_next = date("l, M d Y", $date);
        $consul_time = date("g:i A", $date);
        ?>
        <label for="" class="Date-label"><?= $consul_next ?> <br> <?= $consul_time ?></label>
    </div>

    <label class="recent-act-patient-label" for="" style="margin-left: 20px;"><br>Consultation History<br></label>
    <div class="recent-consultations shadow">
        <div class="dash-inner-content">
            <table id="patient-diagnosis-table" class="table table-hover" style="width:100%">
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




<div class="d-flex justify-content-end fixed-bottom mb-3" style="transform: translate(40px) translateY(-100px);"><button class="btn btn-sm btn-dark" type="button" style="transform: rotate(-90deg);" data-bs-target="#feedback-modal" data-bs-toggle="modal">Feedback</button></div>
<div id="feedback-modal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">


        <div class="modal-content feed-modal">
            <div class="modal-header">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Clinic Survey</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Doctor's Survey</button>
                    </li>
                </ul>
            </div>
            <div class="modal-body p-0">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <?= form_open('Patient/add_feedback_validation'); ?>
                        <div class="feedback-rating-scale container-satisfaction">
                            <div class="row" style="text-align: center;">
                                <h4><strong>How's our Service?</strong></h4>
                            </div>
                            <div class="row">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <div class="column">
                                        <input type="radio" class="radio-emoji btn-check" name="rating" id="emoji-1" value="Very Dissatisfied">
                                        <label class=" label-emoji" for="emoji-1" title="Very Dissatisfied">😡</label>
                                        <div class="column col-label"><label>Very Dissatisfied</label></div>
                                    </div>

                                    <div class="column">
                                        <input type="radio" class="radio-emoji btn-check" name="rating" id="emoji-2" value="Dissatisfied">
                                        <label class=" label-emoji" for="emoji-2" title="Dissatisfied">🙁</label>
                                        <div class="column col-label"><label>Dissatisfied</label></div>
                                    </div>

                                    <div class="column">
                                        <input type="radio" class="radio-emoji btn-check" name="rating" id="emoji-3" value="Neutral">
                                        <label class=" label-emoji" for="emoji-3" title="Neutral">😐</label>
                                        <div class="column col-label"><label>Neutral</label></div>
                                    </div>

                                    <div class="column">
                                        <input type="radio" class="radio-emoji btn-check" name="rating" id="emoji-4" value="Satisfied">
                                        <label class=" label-emoji" for="emoji-4" title="Satisfied">🙂</label>
                                        <div class="column col-label"><label>Satisfied</label></div>
                                    </div>

                                    <div class="column">
                                        <input type="radio" class="radio-emoji btn-check" name="rating" id="emoji-5" value="Very Satisfied" checked>
                                        <label class=" label-emoji" for="emoji-5" title="Very Satisfied">😍</label>
                                        <div class="column col-label"><label>Very Satisfied</label></div>
                                    </div>
                                </div>
                            </div><br>

                            <input type="text" name="patient_id" id="patient_id" value="<?= $patient->patient_id ?> " hidden />

                            <div class="row">
                                <?php
                                if (empty($feedback->patient_id)) {
                                    $rating_desc = set_value('rating_description');
                                } else {
                                    $rating_desc = $feedback->rating_description;
                                }

                                ?>
                                <textarea class="form-control feedback" type="text" id="rating_description" rows="2" name="rating_description" value="<?= $rating_desc ?>" placeholder="Tell us more about yourself"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer feed-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-sm btn-primary btn-modal" type="submit" id="addFeedback" name="addFeedback" style="background: #3269bf;">Save</button></div>
                        <?= form_close(); ?>
                    </div>


                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <?= form_open('Patient/add_doc_feedback_validation'); ?>
                        <div class="feedback-rating-scale container-satisfaction">
                            <div class="row" style="text-align: center;">
                                <h4 class="m-0"><strong>Rate our Doctors!</strong></h4><br>
                                <div style="font-size: 100px;">🧑🏽‍⚕️</div>
                            </div>

                            <div class="row">
                                <div class="cont">
                                    <div class="btn-group stars" role="group" aria-label="Basic radio toggle button group">
                                        <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                                        <label class="star star-5" for="star-5"></label>

                                        <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                                        <label class="star star-4" for="star-4"></label>

                                        <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                                        <label class="star star-3" for="star-3"></label>

                                        <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                                        <label class="star star-2" for="star-2"></label>

                                        <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                                        <label class="star star-1" for="star-1"></label>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <h6 style="text-align: center;"><strong>Select Doctor</strong></h6>
                                <select class="form-control" name="doctor_name" id="doctor_name" value=<?= set_value('doctor_name'); ?>>
                                    <option value="select" disabled selected>select..</option>
                                    <?php foreach ($doctorname as $doctor) : ?>
                                        <option value="<?= 'Dr. ' . $doctor->first_name . ' ' . $doctor->last_name . '|' . $doctor->user_id ?>"><?= 'Dr. ' . $doctor->first_name . ' ' . $doctor->last_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><br>

                            <input type="text" name="patient_id" id="patient_id" value="<?= $patient->patient_id ?> " hidden />

                            <div class="row">
                                <?php
                                if (empty($feedback->patient_id)) {
                                    $rating_desc = set_value('rating_description');
                                } else {
                                    $rating_desc = $feedback->rating_description;
                                }

                                ?>
                                <textarea class="form-control feedback" type="text" id="rating_description" rows="2" name="rating_description" value="<?= $rating_desc ?>" placeholder="Tell us more about your experience"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer feed-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-sm btn-primary btn-modal" type="submit" id="addDoctorFeedback" name="addDoctorFeedback" style="background: #3269bf;">Save</button></div>
                        <?= form_close(); ?>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>