


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
        <?= form_open_multipart('Admin_schedule_scratch/addSchedule'); ?>
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

                                        <select class="form-control" name="doctor_name" id="doctor_name" value=<?= set_value('doctor_name'); ?>>
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
                                        <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="18:00">
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


        
    </div>

    <div id="calendar">

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
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialDate: date,
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function(arg) {
            var title = prompt('Event Title:');
            if (title) {
            calendar.addEvent({
                title: title,
                start: arg.start,
                end: arg.end,
                allDay: arg.allDay
            })
            }
            calendar.unselect()
        },
        eventClick: function(arg) {
            
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: events
        });

        calendar.render();
    });
    
</script>