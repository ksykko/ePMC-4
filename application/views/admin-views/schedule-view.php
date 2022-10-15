<body>
	
	<div class="schedule">
		<? foreach($get_year_db as $y) { echo $yeardb;} ?>
		<div class="row sched-header">
			<div class="col">
				<h1>Schedule Overview</h1>
			</div>
			<div class="col addSched">
				<button id="btn-addSched" data-bs-toggle="modal" data-bs-target="#schedule-modal">Add New Schedule</button>
			</div>
			
		</div>

		<!-- POPUP FORM -->
		<?= form_open('Admin_schedule/addSchedule'); ?>
		<div id="schedule-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title ms-3 fw-bolder"> Add a Schedule</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
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
										<input type="text" class="form-control" name="doctor_name" id="doctor_name" placeholder="Enter Doctor Name">
									</div>
									<small class="text-danger"><?= form_error('doctor_name') ?></small>
								</div>
							</div>
						</div>
						<!-- SPECIALIZATION -->
						<div class="row mt-4 mb-2">
							<div class="col"><label class="col-form-label">Specialization:</label></div>
							<div class="col">
								<div class="input-error">
									<div class="input-group">
										<input type="text" class="form-control" name="specialization" id="specialization" placeholder="Enter Specialization">
									</div>
									<small class="text-danger"><?= form_error('specialization') ?></small>
								</div>
							</div>
						</div>
						<!-- DATE -->
						<div class="row mt-4 mb-2">
							<div class="col"><label class="col-form-label">Date:</label></div>
							<div class="col">
								<div class="input-error">
									<div class="input-group">
										<input type="date" class="form-control" name="date" id="date">
									</div>
									<small class="text-danger"><?= form_error('date') ?></small>
								</div>
							</div>
						</div>
						<!-- START TIME -->
						<div class="row mt-4 mb-2">
							<div class="col"><label class="col-form-label">Start Time:</label></div>
							<div class="col">
								<div class="input-error">
									<div class="input-group">
										<input type="time" class="form-control" name="start_time" id="start_time">
									</div>
									<small class="text-danger"><?= form_error('start_time') ?></small>
								</div>
							</div>
						</div>
						<!-- END TIME -->
						<div class="row mt-4 mb-2">
							<div class="col"><label class="col-form-label">End Time:</label></div>
							<div class="col">
								<div class="input-error">
									<div class="input-group">
										<input type="time" class="form-control" name="end_time" id="end_time">
									</div>
									<small class="text-danger"><?= form_error('end_time') ?></small>
								</div>
							</div>
						</div>
						<div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" type="submit" name="Save" style="background: #3269bf;">Save</button></div>
					</div>
				</div>
			</div>
		</div>
		<?= form_close(); ?>
	
		<div class="container-fluid card shadow mb-4 sched-body">
			<div class="row">
				<div class="label-doctors"><h3>Doctors</h3></div>
				<div class="col-lg-3 list-doctors">
					<!-- <h6>Dr. Luis Miguel Pagtakhan</h6> -->
					<?php
						foreach($doctors as $doctor) {
							echo "<h6>".$doctor->doctor_name."</h6>";
						}
						
					?>
				</div>
				<div class="col-lg-9 calendar">
					<!-- <div id="calendar"></div> -->
					<?= $calendar; ?>
				</div>
			</div>
		</div>
	</div>
	

	