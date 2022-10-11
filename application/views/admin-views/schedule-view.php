<body>
	<div class="schedule">
		<div class="row sched-header">
			<div class="col">
				<h1>Schedule Overview</h1>
			</div>
			<div class="col addSched">
				<button id="btn-addSched">Add New Schedule</button>
			</div>
		</div>

		<!-- POPUP FORM -->
		<div class="popup">
			<div class="close-btn">&times;</div>
			<?= validation_errors(); ?>
			<?= form_open('Admin_schedule/addSchedule'); ?>
				<div class="form">
					<h2>Add Schedule</h2>
					<div class="form-element">
						<label for="doctor">Doctor</label><br>
						<input type="text" name="doctor_name" id="doctor_name" placeholder="Enter Doctor Name">
						<small class="text-danger"><?= form_error('doctor_name') ?></small>
					</div>
					<div class="form-element">
						<label for="specialization">Specialization</label>
						<input type="text" name="specialization" id="specialization" placeholder="Enter Specialization">
						<small class="text-danger"><?= form_error('specialization') ?></small>
					</div>
					<div class="form-element">
						<label for="date">Set Date</label>
						<input type="date" name="date" id="date" placeholder="Choose a Date">
						<small class="text-danger"><?= form_error('date') ?></small>
					</div>
					<div class="form-element">
						<label for="start-time">Start Time</label>
						<label for="end-time" class="end-time">End Time</label><br>
						<input type="time" name="start_time" id="start_time" placeholder="Start Time">
						<input type="time" name="end_time" id="end_time" placeholder="End Time">
						<small class="text-danger"><?= form_error('start_time') ?></small>
					</div>
					<!-- <div class="form-element">
							<input type="button" value="Sun">
							<input type="button" value="Mon">
							<input type="button" value="Tue">
							<input type="button" value="Wed">
							<input type="button" value="Thurs">
							<input type="button" value="Fri">
							<input type="button" value="Sat">
					</div> -->
					<div class="form-element">
						<button type="submit" name="save">Save</button>
					</div>
					<div class="form-element cancel">
						<a href="#">Cancel</a>
					</div>
				</div>
			<?= form_close(); ?>
			
		</div>
	
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
	

	