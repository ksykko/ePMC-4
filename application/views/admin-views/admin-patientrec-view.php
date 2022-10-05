<div class="container-fluid patientrec-container">
    <div class="d-flex mb-3">
        <div>
            <h3 class="d-none d-sm-inline-block">Patient Record</h3>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4">
            <div id="modal-1" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3">Add a Patient Record</h4><button class="btn-close me-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?= form_open_multipart('Admin_patientrec/add_patient_validation', array('id' => 'regForm', 'name' =>'addPatient')); ?>
                        <div class="modal-body mx-5">

                            <!-- One "tab" for each step in the form: -->

                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Personal Information</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                    <div class="col form-group col-md-5 px-1"><label class="form-label">First
                                            Name</label><input class="form-control form-control-sm" type="text" name="first_name" /><small class="text-danger"><?= form_error('first_name') ?></small></div>
                                    <div class="col form-group col-md-4 px-1"><label class="form-label">Middle
                                            Name</label><input class="form-control form-control-sm" type="text" name="middle_name" /><small class="text-danger"><?= form_error('middle_name') ?></small></div>
                                    <div class="col form-group col-md-3 px-1"><label class="form-label">Surname</label><input class="form-control form-control-sm" type="text" name="last_name" /><small class="text-danger"><?= form_error('last_name') ?></small>
                                    </div>
                                </div>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Age</label><input class="form-control form-control-sm" type="text" name="age" /><small class="text-danger"><?= form_error('age') ?></small></div>
                                    <div class="col form-group px-1"><label class="form-label">Birth date</label><input class="form-control form-control-sm" name="birth_date" type="date" /><small class="text-danger"><?= form_error('birth_date') ?></small></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Sex</label><select class="form-select form-select-sm" name="sex">
                                            <option value="select" selected>select ...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select><small class="text-danger"><?= form_error('sex') ?></small></div>
                                    <div class="col form-group px-1"><label class="form-label">Occupation</label><input class="form-control form-control-sm" type="text" name="occupation" /><small class="text-danger"><?= form_error('occupation') ?></small></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Address</label><input class="form-control form-control-sm" type="text" name="address" /><small class="text-danger"><?= form_error('address') ?></small></div>
                                </div>
                            </div>

                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Contact Information</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Cellphone No.</label><input class="form-control form-control-sm" type="tel" name="cell_no" /><small class="text-danger"><?= form_error('cell_no') ?></small></div>
                                    <div class="col form-group px-1"><label class="form-label">Telephone No.</label><input class="form-control form-control-sm" type="tel" name="tel_no" /><small class="text-danger"><?= form_error('tel_no') ?></small></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Email</label><input class="form-control form-control-sm" type="email" name="email" placeholder="name@example.com" /><small class="text-danger"><?= form_error('email') ?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Emergency Contact</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Name</label><input class="form-control form-control-sm" type="text" name="ec_name" /><small class="text-danger"><?= form_error('ec_name') ?></small></div>
                                    <div class="col form-group px-1"><label class="form-label">Relationship</label><select class="form-select form-select-sm" name="relationship">
                                            <option value="select" selected>select ...</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Grandparent">Grandparent</option>
                                            <option value="Guardian">Guardian</option>
                                            <option value="Others">Others</option>
                                        </select><small class="text-danger"><?= form_error('relationship') ?></small></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1 col-md-6"><label class="form-label">Contact No</label>
                                        <input class="form-control form-control-sm" type="tel" name="ec_contact_no" /><small class="text-danger"><?= form_error('ec_contact_no') ?></small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" type="submit" style="background: #3269bf;">Next</button></div> -->
                        <div class="modal-footer" style="overflow:auto;">
                            <div style="float:right;">
                                <button class="btn btn-light" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                        <!-- Circles which indicates the steps of the form: -->
                        <div class="mb-4" style="text-align:center;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-sm-flex d-md-flex d-lg-flex d-xxl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center align-items-lg-center justify-content-xxl-center align-items-xxl-center me-4"><button id="btn-add-patient" class="btn" type="button" data-bs-toggle="modal" data-bs-target="#modal-1"><i class="icon ion-android-add-circle"></i><span class="d-none d-sm-inline-block ms-1">Add Patient Record</span></button></div>
        <div class="d-sm-flex d-md-flex d-lg-flex d-xxl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center align-items-lg-center justify-content-xxl-center align-items-xxl-center me-4"><button id="btn-add-import" class="btn" type="button" data-bs-toggle="modal" data-bs-target="#modal-3"><i class="fa fa-picture-o"></i><span class="d-none d-sm-inline-block ms-1">Add via Import</span></button></div>
        <div id="modal-3" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title ms-2">Add Via Import</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Upload image below.</p><input type="file" />
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4">
                <div id="patient-table">
                    <table id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th class="text-center col-md-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patients as $patient) : ?>
                                <tr>
                                    <td><?= $patient->patient_id ?></td>
                                    <td><?= $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name ?></td>
                                    <td class="text-center d-xxl-flex justify-content-xxl-end align-items-xxl-center">
                                        <a class="btn btn-light mx-2" href="<?= base_url('Admin_patientrec/view_patient/') . $patient->patient_id ?>" type="button">View</a>
                                        <button class="btn btn-light mx-2" type="button">Edit</button>
                                        <a class="btn btn-link btn-sm btn-delete" href="<?= base_url('Admin_patientrec/delete_patient/') . $patient->patient_id ?>"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?= $this->pagination->create_links() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                
                document.getElementById("nextBtn").innerHTML = "Submit";

            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                for (i = 0; i < y.length; i++) {
                    y[i].className = "form-control form-control-sm valid";
                }
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
    <script>
        var forms = document.querySelectorAll('.needs-validation');

        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    </script>