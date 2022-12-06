


<div class="container-fluid schedule">
    <h1 class="d-none d-sm-inline schedule-label">Schedule</h1>
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
    
    <div style="float: right;">
            <a id="btn-view-schedule" href="<?= base_url('Admin_appointment_reqs/index') ?>" class="btn btn-sm btn-dark" type="button"><i class="fas fa-file-archive"></i><span class="d-none d-lg-inline-block ms-1">Appointments</span></a>
    </div>

    <?php if ($user_role == 'Admin') : ?>
       
        <button id="btn-add-product" style="float: right; margin-right:10px;" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#schedule-modal" type="button">
            <i class="icon ion-android-add-circle ms-xl-1"></i>
            <span class="d-none d-xl-inline-block">Add Schedule</span>
        </button>
        <!-- <button id="btn-approve-product" style="float: right;" class="btn btn-info btn-sm" type="submit" >
            <i class="fas fa-table"></i>
            <span class="d-none d-xl-inline-block"> Appointments</span> 
        </button> -->

        
    <?php endif; ?>  
    
    <div class="d-sm-flex d-md-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p">
      
        <!-- Popup Form - Add Sched -->
        <?= form_open_multipart('Admin_schedule/insert'); ?>
        <div id="schedule-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title ms-3 fw-bolder"> Add an Appointment</h4>
                    </div>

                    <div class="modal-body mx-5">
                        <h5 class="heading-modal fw-semibold">Appointment Details</h5>
                        <hr size="5" />
                        <!-- DOCTOR NAME -->
                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Patient Name:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <!-- <input type="text" class="form-control" name="doctor_name" id="doctor_name" placeholder="Enter Doctor Name"> -->
                        
                                        <select class="form-control" name="patient_name" id="patient_name" >
                                            <option value="select" disabled selected>select..</option>
                                            <?php foreach ($patientname as $patient) : ?>
                                                <option value="<?= $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name . '|' . $patient->un_patient_id ?>"><?= $patient->first_name . ' ' . $patient->last_name ?></option>
                                            <?php endforeach; ?>

                                        </select>

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
                            <div class="col"><label class="col-form-label">Date:</label></div>
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

                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-sm btn-modal" type="submit" name="Save" style="background: #3269bf;">Save</button></div>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close(); ?>

       
            <div id="schedule-edit-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3 fw-bolder">Schedule</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
    
                        <div class="modal-body mx-5">
                            <h5 class="heading-modal fw-semibold">Schedule</h5>
                            <hr size="5" />

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

                            <!-- DOCTOR NAME -->
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
                                <div class="col"><label class="col-form-label">Date:</label></div>
                                <div class="col">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- set time to 7:00 am -->
                                                <input type="text" class="form-control" name="date" id="date" disabled>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                            <!-- END TIME -->
                            <div class="row mt-4 mb-2">
                                <div class="col"><label class="col-form-label">Status:</label></div>
                                <div class="col">
                                    <div class="input-error">
                                        
                                        <h5 id="status" style="font-weight: 600;"></h5>
                                    </div>
                                </div>
                            </div>
    
                            <!-- THEME COLOR -->

                            
                            
                            <div class="modal-footer">
                            
                            
                           
                        </div>
                    </div>
                </div>
            </div>

        
    </div>
    <div class="w-100 card shadow mt-4 mb-4 p-5 pt-4 pb-5">
        <div class="container-fluid" id="calendar">

        </div>    
    </div>
    

</div>

<script>
    var events = <?php echo json_encode($data) ?>;
    
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    

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
        eventClick:function(event)
            {
                
                var patient_name = event.event._def.extendedProps.patient_name;
                var un_patient_id = event.event._def.extendedProps.un_patient_id;
                var status = event.event._def.extendedProps.status;

                var id = event.event.id;

                var start_date = event.event.start;

                var new_start = new Date(start_date);
                
                var year_edit = new_start.getFullYear();
                var month_edit = new_start.getMonth() + 1;
                var date_edit = new_start.getDate();

                function pad2(number) {
                    return (number < 10 ? '0' : '') + number
                }

                var hour_edit = pad2(new_start.getHours());
                var minute_edit = pad2(new_start.getMinutes());
                var seconds_edit = pad2(new_start.getSeconds());


                var start_edit_date =(year_edit + "-" + month_edit + "-" + date_edit + " " + hour_edit + ":" + minute_edit + ":" + seconds_edit);
                
                $('#schedule-edit-modal').modal('show');
                $('#schedule-edit-modal').find('.modal-title').text('Appointment Details');
                $('#schedule-edit-modal').find('#doctor_name').val(event.event.title);
                $('#schedule-edit-modal').find('#date').val(start_edit_date);
                $('#schedule-edit-modal').find('#un_patient_id').val(un_patient_id);
                $('#schedule-edit-modal').find('#patient_name').val(patient_name);
                $('#schedule-edit-modal').find('#status').text(status);


                if (status == 'Cancelled') {
                    $('#schedule-edit-modal').find('#status').css('color', 'red');
                } else if (status == 'Confirmed') {
                    $('#schedule-edit-modal').find('#status').css('color', 'green');
                } else {
                    $('#schedule-edit-modal').find('#status').css('color', '#b8a70f');
                } 
                
                $('#deleteBtn').on("click", function (){
                    $.ajax({
                        url:"<?= base_url('Admin_schedule/delete/');?>",
                        type:"POST",
                        data:{id: id},
                        success:function()
                        {
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

