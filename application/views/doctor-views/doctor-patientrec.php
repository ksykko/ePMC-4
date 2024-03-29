<div class="container-fluid patientrec-container">
    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-lg-inline-block patientrec-label">Patient Record</h1>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4">
            <div id="modal-1" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3 fw-bolder">Add a Patient Record</h4><button id="closeFormModal" class="btn-close me-1 shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?= form_open('Admin_patientrec/add_patient_validation', array('id' => 'regForm')); ?>
                        <div class="modal-body mx-5">

                            <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Personal Information</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                    <div class="col form-group col-md-5 px-1"><label class="form-label">First Name</label>
                                        <input class="form-control form-control-sm" type="text" id="first_name" name="first_name" /><small class="text-danger"><?= form_error('first_name') ?></small>
                                        <span id="fullName_result"></span>
                                        <label id="firstName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group col-md-4 px-1"><label class="form-label">Middle Name</label>
                                        <input class="form-control form-control-sm" type="text" id="middle_name" name="middle_name" /><small class="text-danger"><?= form_error('middle_name') ?></small>
                                        <label id="middleName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group col-md-3 px-1"><label class="form-label">Surname</label>
                                        <input class="form-control form-control-sm" type="text" id="last_name" name="last_name" /><small class="text-danger"><?= form_error('last_name') ?></small>
                                        <label id="lastName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Age</label>
                                        <input class="form-control form-control-sm" type="text" id="age" name="age" /><small class="text-danger"><?= form_error('age') ?></small>
                                        <label id="age_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group px-1"><label class="form-label">Birth date</label>
                                        <input class="form-control form-control-sm" id="birth_date" name="birth_date" type="date" /><small class="text-danger"><?= form_error('birth_date') ?></small>
                                        <label id="birthdate_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group col-md-3 px-1"><label class="form-label">Sex</label><select class="form-select form-select-sm" id="sex" name="sex">
                                            <?php if (set_value('sex') == 'Male') : ?>
                                                <option value="" disabled>select ...</option>
                                                <option value="Male" selected>Male</option>
                                                <option value="Female">Female</option>
                                            <?php else : ?>
                                                <option value="" selected disabled>select ...</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            <?php endif; ?>
                                        </select><small class="text-danger"><?= form_error('sex') ?></small></div>
                                    <div class="col form-group px-1"><label class="form-label">Civil Status</label><select class="form-select form-select-sm" id="civil_status" name="civil_status">
                                            <?php if (set_value('civil_status') == 'Single') : ?>
                                                <option value="">select ...</option>
                                                <option value="Single" selected>Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Widowed">Widowed</option>
                                            <?php elseif (set_value('civil_status') == 'Married') : ?>
                                                <option value="">select ...</option>
                                                <option value="Single">Single</option>
                                                <option value="Married" selected>Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Widowed">Widowed</option>
                                            <?php elseif (set_value('civil_status') == 'Divorced') : ?>
                                                <option value="">select ...</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced" selected>Divorced</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Widowed">Widowed</option>
                                            <?php elseif (set_value('civil_status') == 'Separated') : ?>
                                                <option value="">select ...</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Separated" selected>Separated</option>
                                                <option value="Widowed">Widowed</option>
                                            <?php elseif (set_value('civil_status') == 'Widowed') : ?>
                                                <option value="">select ...</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Widowed" selected>Widowed</option>
                                            <?php else : ?>
                                                <option value="" selected disabled>select ...</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Widowed">Widowed</option>
                                            <?php endif; ?>
                                        </select><small class="text-danger"><?= form_error('civil_status') ?></small></div>
                                    <div class="col form-group px-1"><label class="form-label">Occupation</label><input class="form-control form-control-sm" type="text" id="occupation" name="occupation" /><small class="text-danger"><?= form_error('occupation') ?></small></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Address</label>
                                        <input class="form-control form-control-sm" type="text" id="address" name="address" /><small class="text-danger"><?= form_error('address') ?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Contact Information</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Cellphone No.</label><input class="form-control form-control-sm" type="tel" id="cell_no" name="cell_no" /><small class="text-danger"><?= form_error('cell_no') ?></small>
                                        <label id="cell_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group px-1"><label class="form-label">Telephone No.</label><input class="form-control form-control-sm" type="tel" id="tel_no" name="tel_no" /><small class="text-danger"><?= form_error('tel_no') ?></small>
                                        <label id="tel_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Email</label><input class="form-control form-control-sm" type="email" id="email" name="email" placeholder="name@example.com" /><small class="text-danger"><?= form_error('email') ?></small>
                                        <label id="email_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Emergency Contact</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Name</label><input class="form-control form-control-sm" type="text" id="ec_name" name="ec_name" /><small class="text-danger"><?= form_error('ec_name') ?></small></div>
                                    <div class="col form-group px-1"><label class="form-label">Relationship</label><select class="form-select form-select-sm" id="relationship" name="relationship">
                                            <option value="select" selected disabled>select ...</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Sibling">Sibling</option>
                                            <option value="Child">Child</option>
                                            <option value="Spouse">Spouse</option>
                                            <option value="Grandparent">Grandparent</option>
                                            <option value="Guardian">Guardian</option>
                                            <option value="Other">Other</option>
                                        </select><small class="text-danger"><?= form_error('relationship') ?></small></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1 col-md-6"><label class="form-label">Contact No</label>
                                        <input class="form-control form-control-sm" type="tel" id="ec_contact_no" name="ec_contact_no" /><small class="text-danger"><?= form_error('ec_contact_no') ?></small>
                                        <label id="ec_contact_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" type="submit" style="background: #3269bf;">Next</button></div> -->
                        <div class="modal-footer" style="overflow:auto;">
                            <div style="float:right;">
                                <button class="btn btn-sm btn-light" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button class="btn btn-sm btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
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
        <div class="d-sm-flex d-md-flex d-lg-flex d-xxl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center align-items-lg-center justify-content-xxl-center align-items-xxl-center me-4"><button id="btn-add-patient" onclick="formValidation()" class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-1"><i class="icon ion-android-add-circle"></i><span class="d-none d-lg-inline-block ms-1">Add Patient Record</span></button></div>
        <div class="d-sm-flex d-md-flex d-lg-flex d-xxl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center align-items-lg-center justify-content-xxl-center align-items-xxl-center me-4"><a id="btn-view-archives" href="<?= base_url('Admin_archives/index') ?>" class="btn btn-sm btn-dark" type="button"><i class="fas fa-file-archive"></i><span class="d-none d-lg-inline-block ms-1">Archives</span></a></div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4 p-5 pt-4 pb-5">
                <div>
                    <div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
                        <?php if ($this->session->flashdata('message') == 'success') : ?>
                            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header toast-success">
                                    <strong class="me-auto">Success!</strong>
                                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body bg-opacity-50">
                                    <span>You successfully added a new patient.</span>
                                </div>
                            </div>
                        <?php elseif ($this->session->flashdata('message') == 'dlt_success') : ?>
                            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header toast-success">
                                    <strong class="me-auto">Success!</strong>
                                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body bg-opacity-50">
                                    <span>You successfully deleted a patient.</span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <table id="example" class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="col-md-2 align-middle">Patient ID</th>
                                <th class="col-md-4 align-middle">Name</th>
                                <th class="col-md-2 align-middle">Date Added</th>
                                <th class="col-md-1 align-middle text-center">Type</th>
                                <th class="text-center col-md-3 align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patients as $patient) : ?>
                                <div id="delete-dialog-<?= $patient->patient_id ?>" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete a Patient</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-danger"></i>Are you sure you want to delete this patient?</p>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_patientrec/delete_patient/') . $patient->patient_id ?>" type="button">Confirm</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
        var x, y, i, j, input_valid = true,
            select_valid = true;

        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        z = x[currentTab].getElementsByTagName("select");

        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If an input field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                input_valid = false;
            } else
                y[i].className = "form-control form-control-sm valid";
        }

        // A loop that checks every select field in the current tab:
        for (j = 0; j < z.length; j++) {
            // If a select field is empty...
            if (z[j].value == "select") {
                // add an "invalid" class to the field:
                z[j].className += " invalid";
                // and set the current valid status to false
                select_valid = false;
            } else
                z[j].className = "form-select form-select-sm valid";
        }


        // If all the fields are valid, return true. Otherwise, return false:
        if (input_valid && select_valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }

        console.log(select_valid);
        // return the valid status
        return input_valid && select_valid;
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
    (function() {
        'use strict';
        window.addEventListener('load', function() {

            const first_name = document.getElementById('first_name')
            const middle_name = document.getElementById('middle_name')
            const last_name = document.getElementById('last_name')
            const age = document.getElementById('age')
            const birthdate = document.getElementById('birth_date')
            const sex = document.getElementById('sex')
            const occupation = document.getElementById('occupation')
            const address = document.getElementById('address')
            const cell_no = document.getElementById('cell_no')
            const tel_no = document.getElementById('tel_no')
            const email = document.getElementById('email')
            const ec_name = document.getElementById('ec_name')
            const relationship = document.getElementById('relationship')
            const ec_contact_no = document.getElementById('ec_contact_no')

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const setError = (element, message) => {
                const inputControl = element.parentElement;
                const errorDisplay = inputControl.querySelector('.error');

                errorDisplay.innerText = message;
                inputControl.classList.add('invalid');
                inputControl.classList.remove('success')
            }

            // Fetch all the forms we want to apply custom Bootstrap validation styles to 
            const setSuccess = element => {
                const inputControl = element.parentElement;
                const errorDisplay = inputControl.querySelector('.error');

                errorDisplay.innerText = '';
                inputControl.classList.add('success');
                inputControl.classList.remove('error');
            };

            const isValidEmail = email => {
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }


            // fetch all the forms we want to apply custom style
            var inputs = document.getElementsByClassName('form-control')

            // loop over each input and watch blur event
            var validation = Array.prototype.filter.call(inputs, function(input) {

                input.addEventListener('blur', function(event) {
                    // reset
                    input.classList.remove('is-invalid')
                    input.classList.remove('is-valid')

                    // if (input.checkValidity() === false) {
                    //     input.classList.add('is-invalid')
                    // } else {
                    //     input.classList.add('is-valid')
                    // }

                    // const first_nameValue = first_name.value.trim();
                    // const middle_nameValue = middle_name.value.trim();
                    // const last_nameValue = last_name.value.trim();
                    // const ageValue = age.value.trim();
                    // const birthdateValue = birthdate.value.trim();
                    // const sexValue = sex.value.trim();
                    // const occupationValue = occupation.value.trim();
                    // const addressValue = address.value.trim();
                    // const cell_noValue = cell_no.value.trim();
                    // const tel_noValue = tel_no.value.trim();
                    // const emailValue = email.value.trim();
                    // const ec_nameValue = ec_name.value.trim();
                    // const relationshipValue = relationship.value.trim();
                    // const ec_contact_noValue = ec_contact_no.value.trim();

                    if (first_name.value === '') {
                        setError(first_name, 'First name cannot be blank');
                    } else {
                        setSuccess(first_name);
                    }






                }, false);
            });
        }, false);
    })()
</script>
<!-- <script>
    $(document).ready(function() {
        $('#closeFormModal').on('click', function() {
            $('#regForm').trigger("reset");
            console.log($('#regForm'));
        })
    });
</script> -->