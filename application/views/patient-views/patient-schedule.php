<div class="container-fluid schedule">
    <div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
        <?php if ($this->session->flashdata('message') == 'success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You successfully booked an appointment.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'dlt_success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You successfully deleted an appointment.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'edit_prod_success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You successfully updated the product.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'add_failed') : ?>
            <div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-error">
                    <strong class="me-auto">Error!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You have failed in adding a new product.</span>
                    <?= form_error('patient_name'); ?>
                    <?= form_error('doctor_name'); ?>
                    <?= form_error('date'); ?>
                    <?= form_error('status'); ?>
                    <?= form_error('color'); ?>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('edit_failed')) : ?>
            <div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-error">
                    <strong class="me-auto">Error!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You have failed in editing the product.</span>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-lg-inline-block patientrec-label">Schedule</h1>
        </div>
        <div class="d-sm-flex ms-auto d-md-flex d-lg-flex d-xxl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center align-items-lg-center justify-content-xxl-center align-items-xxl-center me-4">
            <button id="btn-add-appointment" class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#schedule-modal">
                <i class="icon ion-android-add-circle ms-xl-1"></i>
                <span class="d-none d-xl-inline-block">Add Appointment</span>
            </button>
        </div>

    </div>




<!-- 
    <h1 class="d-none d-sm-inline schedule-label">Schedule</h1>
    <button id="btn-add-appointment" style="float: right;" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#schedule-modal" type="button">
        <i class="icon ion-android-add-circle ms-xl-1"></i>
        <span class="d-none d-xl-inline-block">Add Appointment</span>
    </button> -->

    <div class="d-sm-flex d-md-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p">

        <!-- Popup Form - Add Sched -->
        <?= form_open_multipart('Patient_schedule/insert'); ?>
        <div id="schedule-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title ms-3 fw-bolder"> Add an Appointment</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body mx-5">
                        <h5 class="heading-modal fw-semibold">Schedule Details</h5>
                        <hr size="5" />

                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Patient ID:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="un_patient_id" id="un_patient_id" value="<?= $patient->un_patient_id; ?>" disabled>



                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- PATIENT NAME -->
                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Patient Name:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="patient_name" id="patient_name" value="<?= $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name; ?>" disabled>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Physician:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <select class="form-control" name="doctor_name" id="doctor_name" onchange="getvalue(this)">
                                            <option value="select" disabled selected>select..</option>
                                            <option value="Luis Pagtakhan">Dr. Luis Pagtakhan</option>
                                            <option value="Jaymie Pagtakhan">Dr. Jaymie Pagtakhan</option>
                                            <option value="Jass Hussein">Dr. Jass Hussein</option>
                                            <option value="Miguel Pagtakhan">Dr. Miguel Pagtakhan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- START TIME -->
                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Date and Time:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">

                                        <input type="text" class="form-control" id="luisp" name="luisp" style="display:none; border-radius: 1rem;" readonly>
                                        <input type="text" class="form-control" id="jaymiep" name="jaymiep" style="display:none; border-radius: 1rem;">
                                        <input type="text" class="form-control" id="miguelp" name="miguelp" style="display:none; border-radius: 1rem;">
                                        <input type="text" class="form-control" id="jassh" name="jassh" style="display:none; border-radius: 1rem;">
                                        <input type="text" class="form-control" id="defaultdtp" name="defaultdtp" style="border-radius: 1rem;">

                                        <script>
                                            function getvalue(selectVal) {
                                                var selectVal = $('#doctor_name').find(":selected").val();

                                                // alert(selectVal);
                                                if (selectVal == "Luis Pagtakhan") {

                                                    $('#luisp').css({
                                                        display: "block"
                                                    });
                                                    $('#jaymiep').css({
                                                        display: "none"
                                                    });
                                                    $('#miguelp').css({
                                                        display: "none"
                                                    });
                                                    $('#jassh').css({
                                                        display: "none"
                                                    });
                                                    $('#defaultdtp').css({
                                                        display: "none"
                                                    });
                                                } else if (selectVal == "Jaymie Pagtakhan") {
                                                    $('#luisp').css({
                                                        display: "none"
                                                    });
                                                    $('#jaymiep').css({
                                                        display: "block"
                                                    });
                                                    $('#miguelp').css({
                                                        display: "none"
                                                    });
                                                    $('#jassh').css({
                                                        display: "none"
                                                    });
                                                    $('#defaultdtp').css({
                                                        display: "none"
                                                    });
                                                } else if (selectVal == "Jass Hussein") {
                                                    $('#jassh').css({
                                                        display: "block"
                                                    });
                                                    $('#luisp').css({
                                                        display: "none"
                                                    });
                                                    $('#jaymiep').css({
                                                        display: "none"
                                                    });
                                                    $('#miguelp').css({
                                                        display: "none"
                                                    });
                                                    $('#defaultdtp').css({
                                                        display: "none"
                                                    });
                                                } else if (selectVal == "Miguel Pagtakhan") {
                                                    $('#jassh').css({
                                                        display: "none"
                                                    });
                                                    $('#luisp').css({
                                                        display: "none"
                                                    });
                                                    $('#jaymiep').css({
                                                        display: "none"
                                                    });
                                                    $('#miguelp').css({
                                                        display: "block"
                                                    });
                                                    $('#defaultdtp').css({
                                                        display: "none"
                                                    });
                                                }
                                            }

                                            $('#luisp').datetimepicker({
                                                minDate: new Date(),
                                                allowTimes: ['14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00'],
                                                step: 30,
                                                beforeShowDay: function(date) {
                                                    return [date.getDay() == 0 ? false : true];
                                                }
                                            });

                                            $('#jassh').datetimepicker({
                                                minDate: new Date(),
                                                allowTimes: ['14:00', '14:30', '15:00', '15:30', '16:00', '16:30'],
                                                step: 30,
                                                beforeShowDay: function(date) {
                                                    return [date.getDay() != 2 ? false : true];
                                                }
                                            });

                                            $('#miguelp').datetimepicker({
                                                minDate: new Date(),
                                                minTime: '07:30',
                                                maxTime: '12:30',
                                                step: 30,
                                                beforeShowDay: function(date) {
                                                    return [date.getDay() == 0 ? false : true];
                                                },
                                                // onGenerate: function(ct, $i){
                                                //     var date=moment(ct).format('Y-MM-D');
                                                //     var datesArray=<? echo $dates; ?>;

                                                //     $.each(datesArray, function(i, dates){
                                                //         if(date in dates){
                                                //             var times=dates[date];
                                                //             $.each(times, function(index, time){
                                                //                 var hour=times['hour'];
                                                //                 var minute=times['minute'];
                                                //                 var $object=$('[data-hour="' + hour + '"][data-minute="' + minute + '"]');
                                                //                 $object.addClass('xdsoft_disabled');
                                                //             });
                                                //         }
                                                //     });
                                                // }

                                            });

                                            // <?php
                                                //     foreach ($p_scheds as $p_sched) {
                                                //         if ($p_sched->un_patient_id == $patient->un_patient_id) {
                                                //             $datetime = explode(" ", $p_sched->date);
                                                //             $sched_date = $datetime[0];
                                                //             $sched_time = $datetime[1];
                                                //         }
                                                //     }
                                                // 
                                                ?>

                                            $('#jaymiep').datetimepicker({
                                                minDate: new Date(),
                                                allowTimes: ['11:00', '11:30', '12:00', '12:30'],
                                                step: 30,
                                                beforeShowDay: function(date) {
                                                    return [date.getDay() != 6 ? false : true];
                                                }
                                            });

                                            $('#defaultdtp').datetimepicker({
                                                minDate: new Date(),
                                                minTime: '7:30',
                                                maxTime: '17:00',
                                                step: 30,
                                                beforeShowDay: function(date) {
                                                    return [date.getDay() == 0 ? false : true];
                                                }
                                            });
                                        </script>

                                        <!-- set time to 7:00 am -->
                                        <!-- <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="08:00"/>
                                        <script>
                                            var currentdate = new Date();  
                                            var today = currentdate.toISOString().slice(0, 16);

                                            document.getElementsByName("start_date")[0].min = today;
                                            

                                            $("#start_date").on("change", function(){
                                                $("#end_date").attr("min", $(this).val());
                                            });


                                            function pad2(number) {
                                                return (number < 10 ? '0' : '') + number
                                            }
                                        </script> -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-sm btn-modal" type="submit" name="Save" style="background: #3269bf;">Save</button></div>
                </div>
            </div>
        </div>
        <?= form_close(); ?>


        <div id="patient-schedule-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title ms-3 fw-bolder">Schedule</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body mx-5">
                        <h5 class="heading-modal fw-semibold">Schedule Details</h5>
                        <hr size="5" />
                        <!-- DOCTOR NAME -->
                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Patient ID:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="un_patient_id" id="un_patient_id" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Patient Name:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="patient_name" id="patient_name" disabled>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Doctor Name:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="doctor_name" id="doctor_name" disabled>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- START TIME -->
                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Date and Time:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <!-- set time to 7:00 am -->
                                        <input type="text" class="form-control" name="start_date_edit" id="start_date_edit" disabled>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END TIME -->
                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label" style="padding: 0 !important;">Schedule Status:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <h5 id="status" style="font-weight: 600;"></h5>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="delete-dialog" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title modal-title ms-3 fw-bolder">Delete an Appointment</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this appointment?</p>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" id="confirmDelete" type="button">Confirm</a></div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm" type="submit" id="deleteBtn" name="Delete" style="width:200px; outline:none; box-shadow: none; border:0; float:right;"> Delete Schedule</button>
                    </div>
                </div>

            </div>

        </div>



    </div>


    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4 p-5 pt-4 pb-5">
                <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                        <h6 style="color:red;"><i class="fas fa-circle" style="color: red;"></i> Cancelled</h6>
                    </div>
                    <div class="p-2">
                        <h6 style="color:#b8a70f;"><i class="fas fa-circle" style="color: #b8a70f;"></i> Pending</h6>
                    </div>
                    <div class="p-2">
                        <h6 style="color:green;"><i class="fas fa-circle" style="color: Green;"></i> Confirmed</h6>
                    </div>
                </div>
                    <div class="container-fluid" id="calendar">

                    </div>   
            </div>
        </div>
    </div>

    <script>
        var events = <?php echo json_encode($data) ?>;

        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');



            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,timeGridDay'
                },
                initialView: 'dayGridWeek',
                initialDate: date,
                dayMaxEvents: true, // allow "more" link when too many events
                events: events,
                eventClick: function(event) {

                    var doctor_name = event.event._def.extendedProps.doctor_name;
                    var patient_name = event.event._def.extendedProps.patient_name;
                    var status = event.event._def.extendedProps.status;
                    var un_id = event.event._def.extendedProps.un_id;

                    var id = event.event.id;
                    var start_date = event.event.start;


                    var new_start = new Date(start_date);
                    // var new_end = new Date(end_date);

                    var year_edit = new_start.getFullYear();
                    var month_edit = new_start.getMonth() + 1;
                    var date_edit = new_start.getDate();

                    // var year_edit2 = new_end.getFullYear();
                    // var month_edit2 = new_end.getMonth() + 1;
                    // var date_edit2 = new_end.getDate();
                    function pad2(number) {
                        return (number < 10 ? '0' : '') + number
                    }


                    var hour_edit = pad2(new_start.getHours());
                    var minute_edit = pad2(new_start.getMinutes());
                    var seconds_edit = pad2(new_start.getSeconds());

                    // var hour_edit2 = pad2(new_end.getHours());
                    // var minute_edit2 = pad2(new_end.getMinutes());
                    // var seconds_edit2 = pad2(new_end.getSeconds());

                    var start_edit_date = (year_edit + "-" + month_edit + "-" + date_edit + " " + hour_edit + ":" + minute_edit + ":" + seconds_edit);
                    // var end_edit_date = (year_edit2+ "-" + month_edit2 + "-" + date_edit2 + " " + hour_edit2 + ":" + minute_edit2 + ":" + seconds_edit2);


                    $('#patient-schedule-modal').modal('show');
                    $('#patient-schedule-modal').find('.modal-title').text('Schedule');
                    $('#patient-schedule-modal').find('#un_patient_id').val(un_id);
                    $('#patient-schedule-modal').find('#start_date_edit').val(start_edit_date);
                    $('#patient-schedule-modal').find('#doctor_name').val(doctor_name);
                    $('#patient-schedule-modal').find('#patient_name').val(patient_name);
                    

                    $('#patient-schedule-modal').find('#status').text(status);


                    if (status == 'Cancelled') {
                        $('#patient-schedule-modal').find('#status').css('color', 'red');
                        $('#patient-schedule-modal').find('#deleteBtn').show();
                    } else if (status == 'Confirmed') {
                        $('#patient-schedule-modal').find('#status').css('color', 'green');
                        $('#patient-schedule-modal').find('#deleteBtn').hide();
                    } else {
                        $('#patient-schedule-modal').find('#status').css('color', '#b8a70f');
                        $('#patient-schedule-modal').find('#deleteBtn').show();
                    } 


                    $('#deleteBtn').on("click", function() {
                        // $('#patient-schedule-modal').modal('hide');
                        $('#delete-dialog').modal('show');
                    });

                    $('#confirmDelete').on("click", function() {
                        $.ajax({
                            url: "<?= base_url('Patient_schedule/delete/'); ?>",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function() {
                                location.reload();
                                event.fullCalendar('refetchEvents');
                            }

                        })    
                    });
                }
            });



            calendar.render();
        });
    </script>