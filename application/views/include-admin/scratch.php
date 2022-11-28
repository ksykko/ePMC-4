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
				<div id="schedule-edit-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
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

            <!-- Update Schedule -->

            <?php foreach ($schedules as $schedule) : ?>
            
            <?= form_open_multipart('Admin_schedule_scratch/update_schedule'); ?>
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
            <?php endforeach; ?>


<!-- Error -->
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