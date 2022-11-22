<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>

<script>
    const toastTrigger = document.getElementById('liveToastTrigger')
    const toastLiveExample = document.getElementById('liveToast')

    var succToast = "<?= $this->session->flashdata('message') ?>";
    var editFailed = "<?= $this->session->flashdata('edit_failed') ?>";
    const modal_no = "user-edit-modal-" + editFailed;
    console.log(modal_no);

    if (toastTrigger) {
        if (succToast || editFailed) {


            if (succToast == 'add_failed') {
                $(document).ready(function() {
                    $("#modal-1").modal('show');
                });
            }
            if (editFailed) {
                $(document).ready(function() {
                    $("#" + modal_no).modal('show');
                });
            }

            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()

        }
    }
</script>


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
            document.getElementById("addUserForm").submit();

            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    $(document).ready(function() {
        if ($('#firstName_error').val() == '') {
            $('#firstName_error').hide();
        }
        if ($('#middleName_error').val() == '') {
            $('#middleName_error').hide();
        }
        if ($('#lastName_error').val() == '') {
            $('#lastName_error').hide();
        }
        if ($('#age_error').val() == '') {
            $('#age_error').hide();
        }
        if ($('#birthdate_error').val() == '') {
            $('#birthdate_error').hide();
        }
        if ($('#cell_no_error').val() == '') {
            $('#cell_no_error').hide();
        }
        if ($('#email_error').val() == '') {
            $('#email_error').hide();
        }
        if ($('#email_error').val() == '') {
            $('#email_error').hide();
        }
        if ($('#contact_error').val() == '') {
            $('#contact_error').hide();
        }
        if ($('#role_error').val() == '') {
            $('#role_error').hide();
        }
        if ($('#username_error').val() == '') {
            $('#username_error').hide();
        }
        if ($('#spec_error').val() == '') {
            $('#spec_error').hide();
        }
        if ($('#admin_spec_error').val() == '') {
            $('#admin_spec_error').hide();
        }
    });


    var input_valid = false;

    // validation onchange
    var first_name = document.getElementById('first_name'),
        middle_name = document.getElementById('middle_name'),
        last_name = document.getElementById('last_name'),
        username = document.getElementById('username'),
        role = document.getElementById('role'),
        spec = document.getElementById('specialization'),
        adminSpec = document.getElementById('admin_spec'),
        birthdate = document.getElementById('birth_date'),
        sex = document.getElementById('sex'),
        cell_no = document.getElementById('cell_no'),
        email = document.getElementById('email');


    first_name.onblur = function() {
        if (first_name.value == '') {
            $('#firstName_error').show();
            $('#firstName_error').html('First name is required');
            $('#first_name').removeClass('valid');
            $('#first_name').addClass('invalid');
            //$('#first_name').focus();

            input_valid = false;
        } else {
            $('#firstName_error').hide();

            $('#first_name').removeClass('invalid');
            $('#first_name').addClass('valid');
            input_valid = true;
        }
    }

    middle_name.onblur = function() {
        if (middle_name.value == '') {
            $('#middle_name').removeClass('valid');
            $('#middle_name').addClass('warning');

            input_valid = true;
        } else {
            $('#middle_name').removeClass('warning');
            $('#middle_name').addClass('valid');

            input_valid = true;
        }
    }

    last_name.onblur = function() {
        if (last_name.value == '') {
            $('#lastName_error').show();
            $('#lastName_error').html('Last name is required');
            $('#last_name').removeClass('valid');
            $('#last_name').addClass('invalid');
            //$('#last_name').focus();

            input_valid = false;
        } else {
            $('#lastName_error').hide();

            $('#last_name').removeClass('invalid');
            $('#last_name').addClass('valid');
            input_valid = true;
        }
    }

    username.onblur = function() {
        if (username.value == '') {
            $('#username_error').show();
            $('#username_error').html('Username is required');
            $('#username').removeClass('valid');
            $('#username').addClass('invalid');
            //$('#username').focus();

            input_valid = false;
        } else {
            $('#username_error').hide();

            $('#username').removeClass('invalid');
            $('#username').addClass('valid');
            input_valid = true;
        }
    }

    role.onblur = function() {
        if (role.value == '') {
            $('#role_error').show();
            $('#role_error').html('Role is required');
            $('#role').removeClass('valid');
            $('#role').addClass('invalid');
            //$('#role').focus();

            input_valid = false;
        } else {
            $('#role_error').hide();

            $('#role').removeClass('invalid');
            $('#role').addClass('valid');
            input_valid = true;
        }
    }

    spec.onblur = function() {
        if (spec.value == '') {
            $('#spec_error').show();
            $('#spec_error').html('Specialization is required');
            $('#specialization').removeClass('valid');
            $('#specialization').addClass('invalid');
            //$('#spec').focus();

            input_valid = false;
        } else {
            $('#spec_error').hide();

            $('#specialization').removeClass('invalid');
            $('#specialization').addClass('valid');
            input_valid = true;
        }
    }

    adminSpec.onblur = function() {
        if (adminSpec.value == '') {
            $('#admin_spec_error').show();
            $('#admin_spec_error').html('Position is required');
            $('#admin_spec').removeClass('valid');
            $('#admin_spec').addClass('invalid');
            //$('#spec').focus();

            input_valid = false;
        } else {
            $('#admin_spec_error').hide();

            $('#admin_spec').removeClass('invalid');
            $('#admin_spec').addClass('valid');
            input_valid = true;
        }
    }

    birthdate.onblur = function() {
        if (birthdate.value == '' || birthdate.value == null || birthdate.value == undefined) {
            $('#birthdate_error').show();
            $('#birthdate_error').html('Birthdate is required');
            $('#birth_date').removeClass('valid');
            $('#birth_date').addClass('invalid');

            input_valid = false;

        } else {
            // clear error message
            $('#birthdate_error').hide();
            $('#birthdate_error').html('');

            $('#birth_date').removeClass('invalid');
            $('#birth_date').addClass('valid');

            input_valid = true;
        }
    }

    sex.onblur = function() {
        if (sex.value == '') {
            $('#sex_error').show();
            $('#sex_error').html('Sex is required');
            $('#sex').removeClass('valid');
            $('#sex').addClass('invalid');

            input_valid = false;

        } else {
            $('#sex_error').hide();

            $('#sex').removeClass('invalid');
            $('#sex').addClass('valid');
            input_valid = true;
        }
    }

    cell_no.onblur = function() {
        if (cell_no.value == '') {
            $('#cell_no_error').show();
            $('#cell_no_error').html('Contact number is required');
            $('#cell_no').removeClass('valid');
            $('#cell_no').addClass('invalid');

            input_valid = false;

        } else if (cell_no.value.length < 11) {
            $('#cell_no_error').show();
            $('#cell_no_error').html('Contact number must be 11 digits');
            $('#cell_no').removeClass('valid');
            $('#cell_no').addClass('invalid');

            input_valid = false;

        } else if (isNaN(cell_no.value)) {
            $('#cell_no_error').show();
            $('#cell_no_error').html('Contact number must be numeric');
            $('#cell_no').removeClass('valid');
            $('#cell_no').addClass('invalid');

            input_valid = false;

        } else {
            $('#cell_no_error').hide();

            $('#cell_no').removeClass('invalid');
            $('#cell_no').addClass('valid');
            input_valid = true;
        }
    }


    // validateEmail
    var email_regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    email.onblur = function() {
        if (email.value == '') {
            $('#email').removeClass('valid');
            $('#email').addClass('warning');

            $('#email_error').hide();
            $('#email_error').html('');

            input_valid = true;

        } else if (!email.value.match(email_regex)) {
            $('#email').removeClass('warning');
            $('#email').addClass('invalid');

            // add error message
            $('#email_error').show();
            $('#email_error').html('Invalid email');

            input_valid = false;

        } else {
            $('#email_error').hide();

            $('#email').removeClass('warning');
            $('#email').removeClass('invalid');
            $('#email').addClass('valid');
            input_valid = true;
        }
    }


    function validateForm() {
        //console.log(input_valid);

        var input_valid = true,
            last = true;
        select_valid = true,
            first_name = $('#first_name').val(),
            middle_name = $('#middle_name').val(),
            last_name = $('#last_name').val(),
            username = $('#username').val(),
            role = $('#role').val(),
            spec = $('#specialization').val(),
            adminSpec = $('#admin_spec').val(),
            birthdate = $('#birth_date').val(),
            sex = $('#sex').val(),
            cell_no = $('#cell_no').val(),
            email = $('#email').val();


        // store all input results in an array
        var validation = [];


        // name validation
        if (first_name == '') {

            $('#first_name').addClass('invalid');

            // add error message
            $('#firstName_error').show();
            $('#firstName_error').html('First name is required');

            validation['first_name'] = false;
        } else {
            // remove error message
            $('#firstName_error').hide();
            $('#first_name').html('');

            $('#first_name').removeClass('invalid');
            $('#first_name').addClass('valid');

            validation['first_name'] = true;
        }

        if (middle_name == '') {
            $('#middle_name').removeClass('invalid');
            $('#middle_name').addClass('warning');

            $('#middleName_error').hide();
            $('#middleName_error').html('');

            validation['middle_name'] = true;
        } else {
            // remove error message
            $('#middleName_error').hide();
            $('#middle_name').html('');

            $('#middle_name').removeClass('warning');;
            $('#middle_name').removeClass('invalid');
            $('#middle_name').addClass('valid');

            validation['middle_name'] = true;
        }

        if (last_name == '') {
            $('#last_name').addClass('invalid');

            // add error message
            $('#lastName_error').show();
            $('#lastName_error').html('Last name is required');

            validation['last_name'] = false;
        } else {
            // remove error message
            $('#lastName_error').hide();
            $('#last_name').html('');

            $('#last_name').removeClass('invalid');
            $('#last_name').addClass('valid');

            validation['last_name'] = true;
        }


        if (username == '') {
            $('#username').addClass('invalid');

            // add error message
            $('#username_error').show();
            $('#username_error').html('Username is required');

            validation['username'] = false;
        } else {
            // remove error message
            $('#username_error').hide();
            $('#username').html('');

            $('#username').removeClass('invalid');
            $('#username').addClass('valid');

            validation['username'] = true;
        }


        if (role == '' || role == null) {
            $('#role_error').show();
            $('#role_error').html('Role is required');
            $('#role').removeClass('valid');
            $('#role').addClass('invalid');
            //$('#role').focus();

            validation['role'] = false;
        } else if (role == 'doctor' || role == 'Doctor') {
            if (spec == '' || spec == null) {
                $('#spec_error').show();
                $('#spec_error').html('Specialization is required');
                $('#specialization').removeClass('valid');
                $('#specialization').addClass('invalid');

                validation['spec'] = false;
            } else {
                $('#spec_error').hide();
                $('#specialization').removeClass('invalid');
                $('#specialization').addClass('valid');

                validation['spec'] = true;
            }
        } else if (role == 'admin' || role == 'Admin') {
            if (adminSpec == '' || adminSpec == null) {
                $('#admin_spec_error').show();
                $('#admin_spec_error').html('Position is required');
                $('#admin_spec').removeClass('valid');
                $('#admin_spec').addClass('invalid');

                validation['adminSpec'] = false;
            } else {
                $('#admin_spec_error').hide();
                $('#admin_spec').removeClass('invalid');
                $('#admin_spec').addClass('valid');

                validation['adminSpec'] = true;
            }
        } else {
            $('#role_error').hide();
            $('#role').removeClass('invalid');
            $('#role').addClass('valid');

            validation['role'] = true;
        }
        


        if (sex == '' || sex == null) {
            $('#sex_error').show();
            $('#sex_error').html('Sex is required');
            $('#sex').removeClass('valid');
            $('#sex').addClass('invalid');

            validation['sex'] = false;
        } else {
            $('#sex_error').hide();

            $('#sex').removeClass('invalid');
            $('#sex').addClass('valid');

            validation['sex'] = true;
        }


        if (birthdate == '' || birthdate == null || birthdate == '0000-00-00' || birthdate == '1970-01-01' || birthdate == undefined) {
            $('#birth_date').addClass('invalid');

            // add error message
            $('#birthDate_error').show();
            $('#birthDate_error').html('Birthdate is required');

            validation['birthdate'] = false;
        } else {
            // remove error message
            $('#birthDate_error').hide();
            $('#birth_date').html('');

            $('#birth_date').removeClass('invalid');
            $('#birth_date').addClass('valid');

            validation['birthdate'] = true;
        }



        // if current tab is 1
        if (currentTab == 1) {
            // cellphone number validation
            if (cell_no == '') {
                $('#cell_no').addClass('invalid');

                // add error message
                $('#cell_no_error').show();
                $('#cell_no_error').html('Cellphone number is required');

                validation['cell_no'] = false;

            } else if (isNaN(cell_no)) {
                $('#cell_no').addClass('invalid');

                // add error message
                $('#cell_no_error').show();
                $('#cell_no_error').html('Cellphone number must be a number');

                validation['cell_no'] = false;

            } else if (cell_no.length < 11) {
                $('#cell_no').addClass('invalid');

                // add error message
                $('#cell_no_error').show();
                $('#cell_no_error').html('Cellphone number must be 11 digits');

                validation['cell_no'] = false;

            } else {
                // remove error message
                $('#cell_no_error').hide();
                $('#cell_no').html('');

                $('#cell_no').removeClass('invalid');
                $('#cell_no').addClass('valid');

                validation['cell_no'] = true;
            }



            var email_regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            // email validation
            if (email == '') {
                $('#email').addClass('invalid');

                // add error message
                $('#email_error').show();
                $('#email_error').html('Email is required');

                validation['email'] = false;

            } else if (!email_regex.test(email)) {
                $('#email').addClass('invalid');

                // add error message
                $('#email_error').show();
                $('#email_error').html('Invalid email format');

                validation['email'] = false;

            } else {
                // remove error message
                $('#email_error').hide();
                $('#email').html('');

                $('#email').removeClass('invalid');
                $('#email').addClass('valid');

                validation['email'] = true;
            }
        }

        if (currentTab == 2) {
            // ec_contact_no validation
            if (ec_contact == '') {
                $('#ec_contact_no').removeClass('valid');
                $('#ec_contact_no').addClass('warning');

                $('#ec_contact_error').hide();
                $('#ec_contact_error').html('');

            } else if (isNaN(ec_contact)) {
                $('#ec_contact_no').removeClass('warning');
                $('#ec_contact_no').addClass('invalid');

                // add error message
                $('#ec_contact_error').show();
                $('#ec_contact_error').html('Invalid cellphone number');

                input_valid = false;

            } else {
                $('#ec_contact_error').hide();

                $('#ec_contact_no').removeClass('warning');
                $('#ec_contact_no').removeClass('invalid');
                $('#ec_contact_no').addClass('valid');
            }
        }

        console.log(validation);
        // console.log(!validation.includes(false));

        const areTrue = Object.values(validation).every(
            value => value === true
        );

        console.log(areTrue);


        //nput_valid = false; // remove this
        // If all the fields are valid, return true. Otherwise, return false:
        if (areTrue == true) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }

        return areTrue;
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#useracc-table').DataTable({
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            responsive: true,
            "ajax": {
                url: "<?php echo site_url("Admin_useracc/datatable") ?>",
                type: 'POST'
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [7], //first column / numbering column
                "orderable": false, //set not orderable
                "className": "text-center",
                "targets": [7]
            }]
        });

    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>


</body>

</html>