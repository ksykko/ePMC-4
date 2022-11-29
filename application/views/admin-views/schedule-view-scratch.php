


<div class="container-fluid schedule">
    <h1 class="d-none d-sm-inline schedule-label">Schedule</h1>
    <?php if ($user_role == 'Admin') : ?>
        <button id="btn-add-product" style="float: right;" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#schedule-modal" type="button">
            <i class="icon ion-android-add-circle ms-xl-1"></i>
            <span class="d-none d-xl-inline-block">Add Schedule</span>
        </button>
    <?php endif; ?>  
            
    <div class="d-sm-flex d-md-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p">
      
        <!-- Popup Form - Add Sched -->
        <?= form_open_multipart('Admin_schedule_scratch/insert'); ?>
        <div id="schedule-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title ms-3 fw-bolder"> Add a Schedule</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body mx-5">
                        <h5 class="heading-modal fw-semibold">Schedule Details</h5>
                        <hr size="5" />
                        <!-- DOCTOR NAME -->
                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Doctor Name:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <!-- <input type="text" class="form-control" name="doctor_name" id="doctor_name" placeholder="Enter Doctor Name"> -->
                        
                                        <select class="form-control" name="doctor_name" id="doctor_name" >
                                            <option value="select" disabled selected>select..</option>
                                            <?php foreach ($doctorname as $doctor) : ?>
                                                <option value="<?= 'Dr. ' . $doctor->first_name . ' ' . $doctor->last_name . '|' . $doctor->user_id . '|' . $doctor->specialization ?>"><?= 'Dr. ' . $doctor->first_name . ' ' . $doctor->last_name ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- START TIME -->
                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">Start Date:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <!-- set time to 7:00 am -->
                                        <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="08:00">
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
                                        </script>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- END TIME -->
                        <div class="row mt-4 mb-2">
                            <div class="col"><label class="col-form-label">End Date:</label></div>
                            <div class="col">
                                <div class="input-error">
                                    <div class="input-group">
                                        <input type="datetime-local" class="form-control" name="end_date" id="end_date" >
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- THEME COLOR -->
                        <div class="col"><label class="col-form-label">Choose color:</label></div>
                        <div class="row mt-4 mb-2">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="color" id="color1" value="fbb4ae" autocomplete="off">
                                <label class="btn btn-outline color1" for="color1"> </label>

                                <input type="radio" class="btn-check" name="color" id="color2" value="b3cde3" autocomplete="off">
                                <label class="btn btn-outline color2" for="color2"> </label>

                                <input type="radio" class="btn-check" name="color" id="color3" value="ccebc5" autocomplete="off">
                                <label class="btn btn-outline color3" for="color3"> </label>

                                <input type="radio" class="btn-check" name="color" id="color4" value="decbe4" autocomplete="off">
                                <label class="btn btn-outline color4" for="color4"> </label>

                                <input type="radio" class="btn-check" name="color" id="color5" value="fed9a6" autocomplete="off">
                                <label class="btn btn-outline color5" for="color5"> </label>

                                <input type="radio" class="btn-check" name="color" id="color6" value="ffffcc" autocomplete="off">
                                <label class="btn btn-outline color6" for="color6"> </label>

                                <input type="radio" class="btn-check" name="color" id="color7" value="e5d8bd" autocomplete="off">
                                <label class="btn btn-outline color7" for="color7"> </label>
                            </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-sm btn-modal" type="submit" name="Save" style="background: #3269bf;">Save</button></div>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close(); ?>

        <?= form_open_multipart('Admin_schedule_scratch/update'); ?>
            <div id="schedule-edit-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3 fw-bolder"> Edit Schedule</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
    
                        <div class="modal-body mx-5">
                            <h5 class="heading-modal fw-semibold">Schedule Details</h5>
                            <hr size="5" />
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
                                <div class="col"><label class="col-form-label">Start Date:</label></div>
                                <div class="col">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- set time to 7:00 am -->
                                            <input type="datetime-local" class="form-control" name="start_date_edit" id="start_date_edit">
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                            <!-- END TIME -->
                            <div class="row mt-4 mb-2">
                                <div class="col"><label class="col-form-label">End Date:</label></div>
                                <div class="col">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <input type="datetime-local" class="form-control" name="end_date_edit" id="end_date_edit">
                                        </div>
    
                                    </div>
                                </div>
                            </div>
    
                            <!-- THEME COLOR -->
                            <div class="col"><label class="col-form-label">Choose color:</label></div>
                            <div class="row mt-4 mb-2">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="color2" id="color1_edit" value="fbb4ae" autocomplete="off">
                                    <label class="btn btn-outline color1" for="color1_edit"> </label>
    
                                    <input type="radio" class="btn-check" name="color2" id="color2_edit" value="b3cde3" autocomplete="off">
                                    <label class="btn btn-outline color2" for="color2_edit"> </label>
    
                                    <input type="radio" class="btn-check" name="color2" id="color3_edit" value="ccebc5" autocomplete="off">
                                    <label class="btn btn-outline color3" for="color3_edit"> </label>
    
                                    <input type="radio" class="btn-check" name="color2" id="color4_edit" value="decbe4" autocomplete="off">
                                    <label class="btn btn-outline color4" for="color4_edit"> </label>
    
                                    <input type="radio" class="btn-check" name="color2" id="color5_edit" value="fed9a6" autocomplete="off">
                                    <label class="btn btn-outline color5" for="color5_edit"> </label>
    
                                    <input type="radio" class="btn-check" name="color2" id="color6_edit" value="ffffcc" autocomplete="off">
                                    <label class="btn btn-outline color6" for="color6_edit"> </label>
    
                                    <input type="radio" class="btn-check" name="color2" id="color7_edit" value="e5d8bd" autocomplete="off">
                                    <label class="btn btn-outline color7" for="color7_edit"> </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary btn-sm " type="submit" id="deleteBtn" name="Delete" style="background: red;"> Delete Schedule</button>
                            <button class="btn btn-primary btn-sm btn-modal" type="submit" id="saveBtn" name="Save" style="background: #3269bf;">Save</button></div>
                        </div>
                    </div>
                </div>
            </div>
        <?= form_close(); ?>

        
    </div>

    <div class="container" id="calendar">

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
        initialDate: date,
        
        dayMaxEvents: true, // allow "more" link when too many events
        events: events,
        eventClick:function(event)
            {
                var id = event.event.id;

                var start_date = event.event.start;

                
                var end_date = event.event.end;

                var new_start = new Date(start_date);
                var new_end = new Date(end_date);
                
                var year_edit = new_start.getFullYear();
                var month_edit = new_start.getMonth() + 1;
                var date_edit = new_start.getDate();

                var year_edit2 = new_end.getFullYear();
                var month_edit2 = new_end.getMonth() + 1;
                var date_edit2 = new_end.getDate();

                
                
                var hour_edit = pad2(new_start.getHours());
                var minute_edit = pad2(new_start.getMinutes());
                var seconds_edit = pad2(new_start.getSeconds());

                var hour_edit2 = pad2(new_end.getHours());
                var minute_edit2 = pad2(new_end.getMinutes());
                var seconds_edit2 = pad2(new_end.getSeconds());

                var start_edit_date =(year_edit + "-" + month_edit + "-" + date_edit + " " + hour_edit + ":" + minute_edit + ":" + seconds_edit);
                var end_edit_date = (year_edit2+ "-" + month_edit2 + "-" + date_edit2 + " " + hour_edit2 + ":" + minute_edit2 + ":" + seconds_edit2);
                
                $('#schedule-edit-modal').modal('show');
                $('#schedule-edit-modal').find('.modal-title').text('Edit Schedule');
                $('#schedule-edit-modal').find('#doctor_name').val(event.event.title);
                $('#schedule-edit-modal').find('#start_date_edit').val(start_edit_date);
                $('#schedule-edit-modal').find('#end_date_edit').val(end_edit_date);
                
                

                $('#deleteBtn').on("click", function (){
                    $.ajax({
                        url:"<?= base_url('Admin_schedule_scratch/delete/');?>",
                        type:"POST",
                        data:{id: id},
                        success:function()
                        {
                            location.reload();
                            event.fullCalendar('refetchEvents');
                        }
                        
                    })        
                });

                $('#saveBtn').on("click", function (){
                    var formData = {
                        id: id,
                        start_date: $('#start_date_edit').val(),
                        end_date: $('#end_date_edit').val(),
                        color: $("input[type=radio][name=color2]:checked").val(),
                    };


                    $.ajax({
                        url:"<?= base_url('Admin_schedule_scratch/update/');?>",
                        type:"POST",
                        data:formData,
                        dataType: "json",
                        encode: true,
                    }).done(function (data) {
                        
                    });

                    event.preventDefault();       
                });
            }
        });
        
        

        calendar.render();
    });
    
</script>

