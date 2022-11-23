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
			<?php if ($user_role == 'Admin') : ?>
				<button id="btn-add-product" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#schedule-modal" type="button">
					<i class="icon ion-android-add-circle ms-xl-1"></i>
					<span class="d-none d-xl-inline-block">Add Schedule</span>
				</button>
			<?php endif; ?>

			<!-- Popup Form - Add Sched -->
			<?= form_open_multipart('Admin_schedule/addSchedule'); ?>
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
							<!-- SPECIALIZATION -->
							<!-- <div class="row mt-4 mb-2">
								<div class="col"><label class="col-form-label">Specialization:</label></div>
								<div class="col">
									<div class="input-error">
										<div class="input-group">
											<input type="text" class="form-control" name="specialization" id="specialization" placeholder="Enter Specialization">
										</div>

									</div>
								</div>
							</div> -->
							<!-- START TIME -->
							<div class="row mt-4 mb-2">
								<div class="col"><label class="col-form-label">Start Time:</label></div>
								<div class="col">
									<div class="input-error">
										<div class="input-group">
											<!-- set time to 7:00 am -->
											<input type="time" class="form-control" name="start_time" id="start_time" value="08:00">
										</div>

									</div>
								</div>
							</div>
							<!-- END TIME -->
							<div class="row mt-4 mb-2">
								<div class="col"><label class="col-form-label">End Time:</label></div>
								<div class="col">
									<div class="input-error">
										<div class="input-group">
											<input type="time" class="form-control" name="end_time" id="end_time" value="18:00">
										</div>

									</div>
								</div>
							</div>
							<!-- AVAILABILITY - DAYS OF THE WEEK -->
							<div class="row mt-4 mb-2">
								<div class="col"><label class="col-form-label">Select days:</label></div>
								<div class="btn-group" data-toggle="buttons">
									<!-- <label class="btn btn-secondary btn-days radius-left">
										<input type="checkbox" class="hidden" name=" day1" id="day1" value="Sun" disabled> Sun
									</label> -->
									<label class="btn btn-secondary btn-days radius-left">
										<input type="checkbox" class="hidden" name="day[]" value="Mon"> Mon
									</label>
									<label class="btn btn-secondary btn-days">
										<input type="checkbox" class="hidden" name="day[]" value="Tue"> Tue
									</label>
									<label class="btn btn-secondary btn-days">
										<input type="checkbox" class="hidden" name="day[]" value="Wed"> Wed
									</label>
									<label class="btn btn-secondary btn-days">
										<input type="checkbox" class="hidden" name="day[]" value="Thurs"> Thurs
									</label>
									<label class="btn btn-secondary btn-days">
										<input type="checkbox" class="hidden" name="day[]" value="Fri"> Fri
									</label>
									<label class="btn btn-secondary btn-days radius-right">
										<input type="checkbox" class="hidden" name="day[]" value="Sat"> Sat
									</label>

								</div>
							</div>
							<!-- THEME COLOR -->
							<div class="col"><label class="col-form-label">Choose color:</label></div>
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
							</div>
							<div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-sm btn-modal" type="submit" name="Save" style="background: #3269bf;">Save</button></div>
						</div>
					</div>
				</div>
			</div>
			<?= form_close(); ?>

			<!-- Popup Form - Update Sched -->
			<?php foreach ($schedules as $schedule) : ?>
				<?php $updateScheduleInfoPath = 'Admin_schedule/update_schedule/' . $schedule->schedule_id; ?>
				<?= form_open_multipart($updateScheduleInfoPath, array('id' => 'updateSchedule')); ?>
				<div id="schedule-edit-modal-<?= $schedule->schedule_id ?>" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
					<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title ms-3 fw-bolder"> Update a Schedule</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
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
												<select class="form-control" name="doctor_name" id="doctor_name" value="<?= set_value('doctor_name'); ?>">
													<option value="<?= $schedule->doctor_name . '|' . $schedule->user_id . '|' . $schedule->specialization ?>" selected><?= $schedule->doctor_name; ?></option>

													<?php foreach ($doctorname as $doctor) : ?>
														<?php if ($doctor->user_id != $schedule->user_id) : ?>
															<option value="<?= 'Dr. ' . $doctor->first_name . ' ' . $doctor->last_name . '|' . $doctor->user_id . '|' . $doctor->specialization ?>"><?= 'Dr. ' . $doctor->first_name . ' ' . $doctor->last_name ?></option>
														<?php endif; ?>

													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<!-- SPECIALIZATION -->
								<!-- START TIME -->
								<div class="row mt-4 mb-2">
									<div class="col"><label class="col-form-label">Start Time:</label></div>
									<div class="col">
										<div class="input-error">
											<div class="input-group">
												<!-- set time to 7:00 am -->
												<input type="time" class="form-control" name="start_time" id="start_time" value="<?= $schedule->start_time; ?>">
											</div>

										</div>
									</div>
								</div>
								<!-- END TIME -->
								<div class="row mt-4 mb-2">
									<div class="col"><label class="col-form-label">End Time:</label></div>
									<div class="col">
										<div class="input-error">
											<div class="input-group">
												<input type="time" class="form-control" name="end_time" id="end_time" value="<?= $schedule->end_time; ?>">
											</div>

										</div>
									</div>
								</div>

								<input type="type" class="form-control" name="day" id="day" value="<?= $schedule->day; ?>" hidden>

								<!-- THEME COLOR -->
								<div class="col"><label class="col-form-label">Choose color:</label></div>
								<div class="row mt-4 mb-2">
									<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
										<input type="radio" class="btn-check" name="color_edit_<?= $schedule->schedule_id; ?>" id="color1_edit_<?= $schedule->schedule_id; ?>" value="color1" <?php if ($schedule->theme == 'color1') {
																																																	echo ' checked';
																																																} ?> autocomplete="off">
										<label class="btn btn-outline color1" for="color1_edit_<?= $schedule->schedule_id; ?>"> </label>

										<input type="radio" class="btn-check" name="color_edit_<?= $schedule->schedule_id; ?>" id="color2_edit_<?= $schedule->schedule_id; ?>" value="color2" <?php if ($schedule->theme == 'color2') {
																																																	echo ' checked';
																																																} ?> autocomplete="off">
										<label class="btn btn-outline color2" for="color2_edit_<?= $schedule->schedule_id; ?>"> </label>

										<input type="radio" class="btn-check" name="color_edit_<?= $schedule->schedule_id; ?>" id="color3_edit_<?= $schedule->schedule_id; ?>" value="color3" <?php if ($schedule->theme == 'color3') {
																																																	echo ' checked';
																																																} ?> autocomplete="off">
										<label class="btn btn-outline color3" for="color3_edit_<?= $schedule->schedule_id; ?>"> </label>

										<input type="radio" class="btn-check" name="color_edit_<?= $schedule->schedule_id; ?>" id="color4_edit_<?= $schedule->schedule_id; ?>" value="color4" <?php if ($schedule->theme == 'color4') {
																																																	echo ' checked';
																																																} ?> autocomplete="off">
										<label class="btn btn-outline color4" for="color4_edit_<?= $schedule->schedule_id; ?>"> </label>

										<input type="radio" class="btn-check" name="color_edit_<?= $schedule->schedule_id; ?>" id="color5_edit_<?= $schedule->schedule_id; ?>" value="color5" <?php if ($schedule->theme == 'color5') {
																																																	echo ' checked';
																																																} ?> autocomplete="off">
										<label class="btn btn-outline color5" for="color5_edit_<?= $schedule->schedule_id; ?>"> </label>

										<input type="radio" class="btn-check" name="color_edit_<?= $schedule->schedule_id; ?>" id="color6_edit_<?= $schedule->schedule_id; ?>" value="color6" <?php if ($schedule->theme == 'color6') {
																																																	echo ' checked';
																																																} ?> autocomplete="off">
										<label class="btn btn-outline color6" for="color6_edit_<?= $schedule->schedule_id; ?>"> </label>

										<input type="radio" class="btn-check" name="color_edit_<?= $schedule->schedule_id; ?>" id="color7_edit_<?= $schedule->schedule_id; ?>" value="color7" <?php if ($schedule->theme == 'color7') {
																																																	echo ' checked';
																																																} ?> autocomplete="off">
										<label class="btn btn-outline color7" for="color7_edit_<?= $schedule->schedule_id; ?>"> </label>
									</div>
								</div>
								<div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-sm btn-primary btn-modal" id="updateSchedule" name="updateSchedule" type="submit" style="background: #3269bf;">Save</button></div>
							</div>
						</div>
					</div>
				</div>
				<?= form_close(); ?>
			<?php endforeach; ?>


			<!-- update schedule -->

		</div>
	</div>

	<!-- Schedule Body -->
	<div class="row">
		<div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
			<?php if ($this->session->flashdata('message') == 'success') : ?>
				<div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header toast-success">
						<strong class="me-auto">Success!</strong>
						<button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body bg-opacity-50">
						<span>You have successfully added a new schedule.</span>
					</div>
				</div>
			<?php elseif ($this->session->flashdata('message') == 'update_success') : ?>
				<div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header toast-success">
						<strong class="me-auto">Success!</strong>
						<button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body bg-opacity-50">
						<span>You have successfully updated a schedule.</span>
					</div>
				</div>
			<?php elseif ($this->session->flashdata('message') == 'dlt_success') : ?>
				<div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header toast-success">
						<strong class="me-auto">Success!</strong>
						<button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body bg-opacity-50">
						<span>You successfully deleted a schedule.</span>
					</div>
				</div>
			<?php elseif ($this->session->flashdata('message') == 'add_failed') : ?>
				<div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header toast-error">
						<strong class="me-auto">Error!</strong>
						<button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body bg-opacity-50">
						<span>You have failed in adding a new schedule.</span>
					</div>
				</div>
			<?php elseif ($this->session->flashdata('message') == 'update_failed') : ?>
				<div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header toast-error">
						<strong class="me-auto">Error!</strong>
						<button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body bg-opacity-50">
						<span>You have failed in updating a schedule.</span>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<div class="col-lg-12 col-xxl-12 mb-4">
			<div class="card shadow mb-4 p-4 pt-4 pb-5">
				<div class="row header-dates">
					<div class="column"></div>
					<div class="column date-banner"> <?= date("l") . ", " . date("F j, Y"); ?> </div>
					<div class="column"></div>
				</div>
				<!-- <div class="date-banner">
					
				</div><br> -->
				<div class="table-responsive">
					<div class="card">
						<div class="card-body" style="overflow-x:auto;">
							<table class="table sched-tbl">
								<thead>
									<tr>
										<th class="align-middle border-end border-top border-2 doctor-rounded-corners rounded">
											<h2>Doctors</h2>
										</th>
										<th class="align-middle border-end border-1 text-center">
											<h5>Sunday</h5>
										</th>
										<th class="align-middle border-end border-1 text-center">
											<h5>Monday</h5>
										</th>
										<th class="align-middle border-end border-1 text-center">
											<h5>Tueday</h5>
										</th>
										<th class="align-middle border-end border-1 text-center">
											<h5>Wednesday</h5>
										</th>
										<th class="align-middle border-end border-1 text-center">
											<h5>Thursday</h5>
										</th>
										<th class="align-middle border-end border-1 text-center">
											<h5>Friday</h5>
										</th>
										<th class="align-middle text-center">
											<h5>Saturday</h5>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class=" border-end border-2">
											<?php
											foreach ($doctors as $doctor) {
												echo "<h6>" . $doctor->doctor_name . "</h6>";
											}
											?>
										</td>

										<td class=" border-end border-1">
											<div class="sched-card closed">
												<h6>No Clinic Hours</h6>
												<p>All Day</p>
											</div>
										</td>

										<td class=" border-end border-1">
											<?php foreach ($schedules as $schedule) : ?>
												<div id="delete-dialog-<?= $schedule->schedule_id ?>" class="modal fade" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title modal-title ms-3 fw-bolder">Delete Schedule</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this schedule?</p>
															</div>
															<div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_schedule/delete_schedule/') . $schedule->schedule_id ?>" type="button">Confirm</a></div>
														</div>
													</div>
												</div>
												<?php if ($schedule->day == 'Mon') : ?>
													<div class="sched-card <?= $schedule->theme ?>">
														<div style="text-align: right;">
															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#schedule-edit-modal-' . $schedule->schedule_id ?>">
																<i class="fas fa-pen fa-lg" style="color:#457b9d;"></i>
															</a>

															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#delete-dialog-' . $schedule->schedule_id ?>">
																<i class="fas fa-times fa-lg" style="color:#bc4749;"></i>
															</a>
														</div>

														<?php $schedule->theme ?>
														<h6><?= $schedule->doctor_name ?></h6>
														<p><?= $schedule->specialization ?></p><br>

														<p><?= date("h:i A", strtotime($schedule->start_time)) . ' to ' . date("h:i A", strtotime($schedule->end_time)) ?></p>
													</div>
												<?php endif; ?>
											<?php endforeach; ?>
										</td>

										<td class=" border-end border-1">
											<?php foreach ($schedules as $schedule) : ?>
												<div id="delete-dialog-<?= $schedule->schedule_id ?>" class="modal fade" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title modal-title ms-3 fw-bolder">Delete a Product</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this schedule?</p>
															</div>
															<div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_schedule/delete_schedule/') . $schedule->schedule_id ?>" type="button">Confirm</a></div>
														</div>
													</div>
												</div>
												<?php if ($schedule->day == 'Tue') : ?>

													<div class="sched-card <?= $schedule->theme ?>">
														<div style="text-align: right;">
															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#schedule-edit-modal-' . $schedule->schedule_id ?>">
																<i class="fas fa-pen fa-lg" style="color:#457b9d;"></i>
															</a>

															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#delete-dialog-' . $schedule->schedule_id ?>">
																<i class="fas fa-times fa-lg" style="color:#bc4749;"></i>
															</a>
														</div>

														<?php $schedule->theme ?>
														<h6><?= $schedule->doctor_name ?></h6>
														<p><?= $schedule->specialization ?></p><br>

														<p><?= date("h:i A", strtotime($schedule->start_time)) . ' to ' . date("h:i A", strtotime($schedule->end_time)) ?></p>

													</div>
												<?php endif; ?>
											<?php endforeach; ?>
										</td>

										<td class=" border-end border-1">
											<?php foreach ($schedules as $schedule) : ?>
												<div id="delete-dialog-<?= $schedule->schedule_id ?>" class="modal fade" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title modal-title ms-3 fw-bolder">Delete a Product</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this schedule?</p>
															</div>
															<div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_schedule/delete_schedule/') . $schedule->schedule_id ?>" type="button">Confirm</a></div>
														</div>
													</div>
												</div>
												<?php if ($schedule->day == 'Wed') : ?>
													<div class="sched-card <?= $schedule->theme ?>">
														<div style="text-align: right;">
															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#schedule-edit-modal-' . $schedule->schedule_id ?>">
																<i class="fas fa-pen fa-lg" style="color:#457b9d;"></i>
															</a>

															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#delete-dialog-' . $schedule->schedule_id ?>">
																<i class="fas fa-times fa-lg" style="color:#bc4749;"></i>
															</a>
														</div>

														<?php $schedule->theme ?>
														<h6><?= $schedule->doctor_name ?></h6>
														<p><?= $schedule->specialization ?></p><br>

														<p><?= date("h:i A", strtotime($schedule->start_time)) . ' to ' . date("h:i A", strtotime($schedule->end_time)) ?></p>

													</div>
												<?php endif; ?>
											<?php endforeach; ?>
										</td>

										<td class=" border-end border-1">
											<?php foreach ($schedules as $schedule) : ?>
												<div id="delete-dialog-<?= $schedule->schedule_id ?>" class="modal fade" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title modal-title ms-3 fw-bolder">Delete a Product</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this schedule?</p>
															</div>
															<div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_schedule/delete_schedule/') . $schedule->schedule_id ?>" type="button">Confirm</a></div>
														</div>
													</div>
												</div>
												<?php if ($schedule->day == 'Thurs') : ?>
													<div class="sched-card <?= $schedule->theme ?>">
														<div style="text-align: right;">
															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#schedule-edit-modal-' . $schedule->schedule_id ?>">
																<i class="fas fa-pen fa-lg" style="color:#457b9d;"></i>
															</a>

															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#delete-dialog-' . $schedule->schedule_id ?>">
																<i class="fas fa-times fa-lg" style="color:#bc4749;"></i>
															</a>
														</div>

														<?php $schedule->theme ?>
														<h6><?= $schedule->doctor_name ?></h6>
														<p><?= $schedule->specialization ?></p><br>

														<p><?= date("h:i A", strtotime($schedule->start_time)) . ' to ' . date("h:i A", strtotime($schedule->end_time)) ?></p>

													</div>
												<?php endif; ?>
											<?php endforeach; ?>
										</td>

										<td class=" border-end border-1">
											<?php foreach ($schedules as $schedule) : ?>
												<div id="delete-dialog-<?= $schedule->schedule_id ?>" class="modal fade" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title modal-title ms-3 fw-bolder">Delete a Product</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this schedule?</p>
															</div>
															<div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_schedule/delete_schedule/') . $schedule->schedule_id ?>" type="button">Confirm</a></div>
														</div>
													</div>
												</div>
												<?php if ($schedule->day == 'Fri') : ?>
													<div class="sched-card <?= $schedule->theme ?>">
														<div style="text-align: right;">
															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#schedule-edit-modal-' . $schedule->schedule_id ?>">
																<i class="fas fa-pen fa-lg" style="color:#457b9d;"></i>
															</a>

															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#delete-dialog-' . $schedule->schedule_id ?>">
																<i class="fas fa-times fa-lg" style="color:#bc4749;"></i>
															</a>
														</div>

														<?php $schedule->theme ?>
														<h6><?= $schedule->doctor_name ?></h6>
														<p><?= $schedule->specialization ?></p><br>

														<p><?= date("h:i A", strtotime($schedule->start_time)) . ' to ' . date("h:i A", strtotime($schedule->end_time)) ?></p>

													</div>
												<?php endif; ?>
											<?php endforeach; ?>
										</td>

										<td class=" border-end border-1">
											<?php foreach ($schedules as $schedule) : ?>
												<div id="delete-dialog-<?= $schedule->schedule_id ?>" class="modal fade" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title modal-title ms-3 fw-bolder">Delete a Product</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this schedule?</p>
															</div>
															<div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_schedule/delete_schedule/') . $schedule->schedule_id ?>" type="button">Confirm</a></div>
														</div>
													</div>
												</div>
												<?php if ($schedule->day == 'Sat') : ?>
													<div class="sched-card <?= $schedule->theme ?>">
														<div style="text-align: right;">
															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#schedule-edit-modal-' . $schedule->schedule_id ?>">
																<i class="fas fa-pen fa-lg" style="color:#457b9d;"></i>
															</a>

															<a class="btn btn-link btn-sched" data-bs-toggle="modal" data-bs-target="<?= '#delete-dialog-' . $schedule->schedule_id ?>">
																<i class="fas fa-times fa-lg" style="color:#bc4749;"></i>
															</a>
														</div>

														<?php $schedule->theme ?>
														<h6><?= $schedule->doctor_name ?></h6>
														<p><?= $schedule->specialization ?></p><br>

														<p><?= date("h:i A", strtotime($schedule->start_time)) . ' to ' . date("h:i A", strtotime($schedule->end_time)) ?></p>

													</div>
												<?php endif; ?>
											<?php endforeach; ?>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>