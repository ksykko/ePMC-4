<style>
	body {
        overflow-y: scroll;
    }

	body::-webkit-scrollbar {
    	display: none;
	}
</style>

<div class="container-fluid schedule">
	<div class="d-flex mb-3">
		<!-- Schedule Header -->
		<div>
			<h1 class="d-none d-sm-inline schedule-label">Schedule</h1>
		</div>
		<div class="d-sm-flex d-md-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p">
			<button id="btn-add-product" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#schedule-modal" type="button">
                <i class="icon ion-android-add-circle ms-1"></i>
                <span class="d-none d-xl-inline-block">Add Schedule</span>
            </button>

			<!-- Popup Form - Add Sched -->
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
											<!-- <input type="text" class="form-control" name="doctor_name" id="doctor_name" placeholder="Enter Doctor Name"> -->
											<select class="form-control" name="doctor_name" id="doctor_name" value=<?= set_value('doctor_name'); ?>>
												<option value="select" disabled selected>select..</option>
												<?php foreach ($doctorname as $doctor) : ?>
													<option value="<?= 'Dr. ' . $doctor->first_name . ' ' . $doctor->last_name ?>"><?= $doctor->first_name . ' ' . $doctor->last_name ?></option>
												<?php endforeach; ?>
											</select>
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
							<!-- AVAILABILITY - DAYS OF THE WEEK -->
							<div class="row mt-4 mb-2">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-secondary btn-days radius-left">
										<input type="checkbox" class="hidden" name=" day1" id="day1" value="Sun"> Sun
									</label>
									<label class="btn btn-secondary btn-days">
										<input type="checkbox" class="hidden" name="day2" value="Mon"> Mon
									</label>
									<label class="btn btn-secondary btn-days">
										<input type="checkbox" class="hidden" name="day3" value="Tue"> Tue
									</label>
									<label class="btn btn-secondary btn-days">
										<input type="checkbox" class="hidden" name="day4" value="Wed"> Wed
									</label>
									<label class="btn btn-secondary btn-days">
										<input type="checkbox" class="hidden" name="day5" value="Thurs"> Thurs
									</label>
									<label class="btn btn-secondary btn-days">
										<input type="checkbox" class="hidden" name="day6" value="Fri"> Fri
									</label>
									<label class="btn btn-secondary btn-days radius-right">
										<input type="checkbox" class="hidden" name="day7" value="Sat"> Sat
									</label>
									
								</div>
								<small class="text-danger"><?= form_error('days[]') ?></small>
							</div>
							<!-- THEME COLOR -->
							<div class="row mt-4 mb-2">
								<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
									<input type="radio" class="btn-check" name="color" id="color1" value="color1" autocomplete="off">
									<label class="btn btn-outline color1" for="color1"> </label>

									<input type="radio" class="btn-check" name="color" id="color2" value="color2" autocomplete="off">
									<label class="btn btn-outline color2" for="color2"> </label>

									<input type="radio" class="btn-check" name="color" id="color3" value="color3" autocomplete="off">
									<label class="btn btn-outline color3" for="color3"> </label>

									<input type="radio" class="btn-check" name="color" id="color4" value="color4" autocomplete="off">
									<label class="btn btn-outline color4" for="color4"> </label>

									<input type="radio" class="btn-check" name="color" id="color5" value="color5" autocomplete="off">
									<label class="btn btn-outline color5" for="color5"> </label>

									<input type="radio" class="btn-check" name="color" id="color6" value="color6" autocomplete="off">
									<label class="btn btn-outline color6" for="color6"> </label>

									<input type="radio" class="btn-check" name="color" id="color7" value="color7" autocomplete="off">
									<label class="btn btn-outline color7" for="color7"> </label>
								</div>
								<!-- <div class="btn-group" data-toggle="buttons">
									<label class="btn btn-secondary btn-color color1 radius-left ">
										<input type="radio" class="hidden bg-click" name="color1" value="Color1">
									</label>
									<label class="btn btn-secondary btn-color color2">
										<input type="radio" class="hidden" name="color2" value="Color2"> a
									</label>
									<label class="btn btn-secondary btn-color color3">
										<input type="radio" class="hidden" name="color3" value="Color3"> 
									</label>
									<label class="btn btn-secondary btn-color color4">
										<input type="radio" class="hidden" name="color4" value="Color4"> 
									</label> 
									<label class="btn btn-secondary btn-color color5">
										<input type="radio" class="hidden" name="color5" value="Color5">
									</label>
									<label class="btn btn-secondary btn-color color6">
										<input type="radio" class="hidden" name="color6" value="Color6"> 
									</label>
									<label class="btn btn-secondary btn-color color7 radius-right">
										<input type="radio" class="hidden" name="color7" value="Color7">
									</label>
									
								</div> -->
								<small class="text-danger"><?= form_error('days[]') ?></small>
							</div>
							<div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" type="submit" name="Save" style="background: #3269bf;">Save</button></div>
						</div>
					</div>
				</div>
			</div>
			<?= form_close(); ?>
		</div>
	</div>

	<!-- Schedule Body -->
	<div class="row">
		<div class="col-lg-12 col-xxl-12 mb-4">
			<div class="card shadow mb-4 p-5 pt-4 pb-5">
				<div class="table-responsive content-sched">
					<div class="label-doctors"><h3>Doctors</h3></div>
					<nav class="nav left">
						<div class=" list-doctors">
							<?php
								foreach($doctors as $doctor) {
									echo "<h6>".$doctor->doctor_name."</h6>";
								}
							?>
							
						</div>
					</nav>
					<nav class="nav right">
						<table class="table table-bordered text-center week-table">
							<thead>
								<tr>
									<th>Sunday</th>
									<th>Monday</th>
									<th>Tuesday</th>
									<th>Wednesday</th>
									<th>Thursday</th>
									<th>Friday</th>
									<th>Saturday</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<!-- Sunday -->
									<td>
										<?php
											foreach($sunday as $sun) {
												echo '<div class="sched-card">
													<h6>'.$sun->doctor_name.'</h6>
													<p>'.$sun->specialization.'</p><br>
													<p>'. date("h:i A",strtotime($sun->start_time)) .' - '. date("h:i A",strtotime($sun->end_time)).'</p>
												</div>';
											}
										?>
									</td>
									<!-- Monday -->
									<td>
										<?php
											foreach($monday as $mon) {
												echo '<div class="sched-card">
													<h6>Dr. '.$mon->doctor_name.'</h6>
													<p>'.$mon->specialization.'</p><br>
													<p>'. date("h:i A",strtotime($mon->start_time)) .' - '. date("h:i A",strtotime($mon->end_time)) .'</p>
												</div>';
											}
										?>
									</td>
									<!-- Tuesday -->
									<td>
										<?php
											foreach($tuesday as $tue) {
												echo '<div class="sched-card">
													<h6>Dr. '.$tue->doctor_name.'</h6>
													<p>'.$tue->specialization.'</p><br>
													<p>'. date("h:i A",strtotime($tue->start_time)) .' - '. date("h:i A",strtotime($tue->end_time)) .'</p>
												</div>';
											}
										?>
									</td>
									<!-- Wednesday -->
									<td>
										<?php
											foreach($wednesday as $wed) {
												echo '<div class="sched-card">
													<h6>Dr. '.$wed->doctor_name.'</h6>
													<p>'.$wed->specialization.'</p><br>
													<p>'. date("h:i A",strtotime($wed->start_time)) .' - '. date("h:i A",strtotime($wed->end_time)) .'</p>
												</div>';
											}
										?>
									</td>
									<!-- Thursday -->
									<td>
										<?php
											foreach($thursday as $thurs) {
												echo '<div class="sched-card">
													<h6>Dr. '.$thurs->doctor_name.'</h6>
													<p>'.$thurs->specialization.'</p><br>
													<p>'. date("h:i A",strtotime($thurs->start_time)) .' - '. date("h:i A",strtotime($thurs->end_time)) .'</p>
												</div>';
											}
										?>
									</td>
									<!-- Friday -->
									<td>
										<?php
											foreach($friday as $fri) {
												echo '<div class="sched-card">
													<h6>Dr. '.$fri->doctor_name.'</h6>
													<p>'.$fri->specialization.'</p><br>
													<p>'. date("h:i A",strtotime($fri->start_time)) .' - '. date("h:i A",strtotime($fri->end_time)) .'</p>
												</div>';
											}
										?>
									</td>
									<!-- Saturday -->
									<td>
										<?php
											foreach($saturday as $sat) {
												echo '<div class="sched-card">
													<h6>Dr. '.$sat->doctor_name.'</h6>
													<p>'.$sat->specialization.'</p><br>
													<p>'. date("h:i A",strtotime($sat->start_time)) .' - '. date("h:i A",strtotime($sat->end_time)) .'</p>
												</div>';
											}
										?>
									</td>
								</tr>
							</tbody>
						</table>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>