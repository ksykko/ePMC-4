<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>

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
            document.getElementById("editPatient").submit();

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
        if ($('#tel_no_error').val() == '') {
            $('#tel_no_error').hide();
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
        if ($('#ext_name_error').val() == '') {
            $('#ext_name_error').hide();
        }
        if ($('#ext_age_error').val() == '') {
            $('#ext_age_error').hide();
        }
        if ($('#ext_birthdate_error').val() == '') {
            $('#ext_birthdate_error').hide();
        }
        if ($('#ext_mob_error').val() == '') {
            $('#ext_mob_error').hide();
        }
        if ($('#ext_tel_error').val() == '') {
            $('#ext_tel_error').hide();
        }
        if ($('#ext_weight_error').val() == '') {
            $('#ext_weight_error').hide();
        }
        if ($('#ext_height_error').val() == '') {
            $('#ext_height_error').hide();
        }



    });


    var input_valid = false;

    // validation onchange
    var first_name = document.getElementById('first_name'),
        middle_name = document.getElementById('middle_name'),
        last_name = document.getElementById('last_name'),
        age = document.getElementById('age'),
        birthdate = document.getElementById('birth_date'),
        sex = document.getElementById('sex'),
        civil_status = document.getElementById('civil_status'),
        occupation = document.getElementById('occupation'),
        address = document.getElementById('address'),
        cell_no = document.getElementById('cell_no'),
        tel_no = document.getElementById('tel_no'),
        email = document.getElementById('email'),
        ec_name = document.getElementById('ec_name'),
        relationship = document.getElementById('relationship'),
        ec_contact = document.getElementById('ec_contact_no');


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
            $('#middle_name').removeClass('invalid');
            $('#middle_name').addClass('warning');

            input_valid = true;
        } else {
            $('#middle_name').removeClass('warning');
            $('#middle_name').removeClass('invalid');
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

    age.onblur = function() {
        if (age.value < 0 || age.value > 120) {
            $('#age_error').show();
            $('#age_error').html('Age must be between 0 and 120');

            $('#age').removeClass('warning');
            $('#age').removeClass('valid');
            $('#age').addClass('invalid');
            //$('#age').focus();

            input_valid = false;

        } else if (isNaN(age.value)) {
            $('#age').removeClass('warning');
            $('#age').addClass('invalid');

            // add error message
            $('#age_error').show();
            $('#age_error').html('Invalid age');
            input_valid = false;

        } else if (age.value == '') {
            $('#age').removeClass('invalid');
            $('#age').addClass('warning');

            $('#age_error').hide();
            $('#age_error').html('');

            input_valid = true;
        } else {
            $('#age_error').hide();

            $('#age').removeClass('warning');
            $('#age').removeClass('invalid');
            $('#age').addClass('valid');
            input_valid = true;
        }
    }

    var age_imp = document.getElementById('age_imp');

    age_imp.onblur = function() {
        if (age_imp.value < 0 || age_imp.value > 120) {
            $('#age_imp_error').show();
            $('#age_imp_error').html('Age must be between 0 and 120');

            $('#age_imp').removeClass('warning');
            $('#age_imp').removeClass('valid');
            $('#age_imp').addClass('invalid');
            //$('#age_imp').focus();

            input_valid = false;

        } else if (isNaN(age_imp.value)) {
            $('#age_imp').removeClass('warning');
            $('#age_imp').addClass('invalid');

            // add error message
            $('#age_imp_error').show();
            $('#age_imp_error').html('Invalid age');
            input_valid = false;

        } else if (age_imp.value == '') {
            $('#age_imp').removeClass('invalid');
            $('#age_imp').addClass('warning');

            $('#age_imp_error').hide();
            $('#age_imp_error').html('');

            input_valid = true;
        } else {
            $('#age_imp_error').hide();

            $('#age_imp').removeClass('warning');
            $('#age_imp').removeClass('invalid');
            $('#age_imp').addClass('valid');
            input_valid = true;
        }
    }

    birthdate.onblur = function() {
        if (birthdate.value == '') {
            $('#birth_date').removeClass('invalid');
            $('#birth_date').addClass('warning');

            $('#birthdate_error').hide();
            $('#birthdate_error').html('');

            input_valid = true;
        } else if (age.value != '') {
            var birthdate_year = birthdate.value.split('-')[0];
            var birthdate_month = birthdate.value.split('-')[1];
            var birthdate_day = birthdate.value.split('-')[2];

            var today = new Date();
            var current_year = today.getFullYear();
            var current_month = today.getMonth() + 1;
            var current_day = today.getDate();

            var age_year = current_year - birthdate_year;
            var age_month = current_month - birthdate_month;
            var age_day = current_day - birthdate_day;

            if (age_year != age.value) {
                $('#birth_date').addClass('invalid');

                // add error message
                $('#birthdate_error').show();
                $('#birthdate_error').html('Birthdate does not match age');

                $('#birth_date').removeClass('warning');
                $('#birth_date').addClass('invalid');
                input_valid = false;

            } else {
                // clear error message
                $('#birthdate_error').hide();
                $('#birthdate_error').html('');

                $('#birth_date').removeClass('warning');
                $('#birth_date').removeClass('invalid');
                $('#birth_date').addClass('valid');

                input_valid = true;
            }

        } else {
            // clear error message
            $('#birthdate_error').hide();
            $('#birthdate_error').html('');

            $('#birth_date').removeClass('warning');
            $('#birth_date').addClass('valid');

            input_valid = true;
        }
    }

    sex.onblur = function() {
        if (sex.value == '') {
            $('#sex').removeClass('valid');
            $('#sex').addClass('warning');


            input_valid = true;

        } else if (sex.value == 'Male' || sex.value == 'Female') {
            $('#sex').removeClass('warning');
            $('#sex').addClass('valid');


        } else {
            $('#sex').removeClass('warning');
            $('#sex').addClass('valid');

            input_valid = true;
        }
    }

    civil_status.onblur = function() {
        if (civil_status.value == '') {
            $('#civil_status').removeClass('valid');
            $('#civil_status').addClass('warning');

            input_valid = true;
        } else {
            $('#civil_status').removeClass('warning');
            $('#civil_status').addClass('valid');

            input_valid = true;
        }
    }

    occupation.onblur = function() {
        if (occupation.value == '') {
            $('#occupation').removeClass('valid');
            $('#occupation').addClass('warning');

            input_valid = true;
        } else {
            $('#occupation').removeClass('warning');
            $('#occupation').addClass('valid');

            input_valid = true;
        }
    }

    address.onblur = function() {
        if (address.value == '') {
            $('#address').removeClass('valid');
            $('#address').addClass('warning');

            input_valid = true;
        } else {
            $('#address').removeClass('warning');
            $('#address').addClass('valid');

            input_valid = true;
        }
    }

    cell_no.onblur = function() {
        if (cell_no.value == '') {
            $('#cell_no').removeClass('valid');
            $('#cell_no').addClass('warning');

            $('#cell_no_error').hide();
            $('#cell_no_error').html('');

            input_valid = true;

        } else if (isNaN(cell_no.value) || cell_no.value.length != 11) {
            $('#cell_no').removeClass('warning');
            $('#cell_no').addClass('invalid');

            // add error message
            $('#cell_no_error').show();
            $('#cell_no_error').html('Invalid cellphone number');
            input_valid = false;

        } else {
            $('#cell_no_error').hide();

            $('#cell_no').removeClass('warning');
            $('#cell_no').removeClass('invalid');
            $('#cell_no').addClass('valid');
            input_valid = true;
        }
    }

    tel_no.onblur = function() {
        if (tel_no.value == '') {
            $('#tel_no').removeClass('valid');
            $('#tel_no').addClass('warning');

            $('#tel_no_error').hide();
            $('#tel_no_error').html('');

            input_valid = true;

        } else if (isNaN(tel_no.value)) {
            $('#tel_no').removeClass('warning');
            $('#tel_no').addClass('invalid');

            // add error message
            $('#tel_no_error').show();
            $('#tel_no_error').html('Invalid telephone number');
            input_valid = false;

        } else {
            $('#tel_no_error').hide();

            $('#tel_no').removeClass('warning');
            $('#tel_no').removeClass('invalid');
            $('#tel_no').addClass('valid');
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

    ec_name.onblur = function() {
        if (ec_name.value == '') {
            $('#ec_name').removeClass('valid');
            $('#ec_name').addClass('warning');

            input_valid = true;
        } else {
            $('#ec_name').removeClass('warning');
            $('#ec_name').addClass('valid');

            input_valid = true;
        }
    }

    relationship.onblur = function() {
        if (relationship.value == '') {
            $('#relationship').removeClass('valid');
            $('#relationship').addClass('warning');

            input_valid = true;
        } else {
            $('#relationship').removeClass('warning');
            $('#relationship').addClass('valid');

            input_valid = true;
        }
    }

    ec_contact.onblur = function() {
        if (ec_contact.value == '') {
            $('#ec_contact_no').removeClass('valid');
            $('#ec_contact_no').addClass('warning');

            $('#ec_contact_error').hide();
            $('#ec_contact_error').html('');

            input_valid = true;

        } else if (isNaN(ec_contact.value)) {
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
            input_valid = true;
        }
    }




    function validateForm() {
        //console.log(input_valid);

        var input_valid = true,
            select_valid = true,
            first_name = $('#first_name').val(),
            middle_name = $('#middle_name').val(),
            last_name = $('#last_name').val(),
            age = $('#age').val(),
            birthdate = $('#birth_date').val(),
            sex = $('#sex').val(),
            civil_status = $('#civil_status').val(),
            occupation = $('#occupation').val(),
            address = $('#address').val(),
            cell_no = $('#cell_no').val(),
            tel_no = $('#tel_no').val(),
            email = $('#email').val(),
            ec_name = $('#ec_name').val(),
            relationship = $('#relationship').val(),
            ec_contact = $('#ec_contact_no').val();


        // name validation
        if (first_name == '') {

            $('#first_name').addClass('invalid');

            // add error message
            $('#firstName_error').show();
            $('#firstName_error').html('First name is required');

            input_valid = false;
        } else {
            // remove error message
            $('#firstName_error').hide();
            $('#first_name').html('');

            $('#first_name').removeClass('invalid');
            $('#first_name').addClass('valid');

            input_valid = true;
        }

        if (middle_name == '') {
            $('#middle_name').removeClass('invalid');
            $('#middle_name').addClass('warning');

            $('#middleName_error').hide();
            $('#middleName_error').html('');

        } else {
            // remove error message
            $('#middleName_error').hide();
            $('#middle_name').html('');

            $('#middle_name').removeClass('warning');;
            $('#middle_name').removeClass('invalid');
            $('#middle_name').addClass('valid');
        }

        if (last_name == '') {
            $('#last_name').addClass('invalid');

            // add error message
            $('#lastName_error').show();
            $('#lastName_error').html('Last name is required');

            input_valid = false;
        } else {
            // remove error message
            $('#lastName_error').hide();
            $('#last_name').html('');

            $('#last_name').removeClass('invalid');
            $('#last_name').addClass('valid');

            input_valid = true;
        }



        // age validation
        // if age has error add invalid class
        if (age < 0 || age > 120) {
            $('#age').removeClass('warning');
            $('#age').addClass('invalid');

            // add error message
            $('#age_error').show();
            $('#age_error').html('Invalid age');

            input_valid = false;

            // only accept numbers
        } else if (isNaN(age)) {
            $('#age').removeClass('warning');
            $('#age').addClass('invalid');

            // add error message
            $('#age_error').show();
            $('#age_error').html('Invalid age');
            input_valid = false;

            // if empty
        } else if (age == '') {
            $('#age').removeClass('invalid');
            $('#age').addClass('warning');

            $('#age_error').hide();
            $('#age_error').html('');
        } else {
            // clear error message
            $('#age_error').hide();
            $('#age_error').html('');

            $('#age').removeClass('warning');
            $('#age').removeClass('invalid');
            $('#age').addClass('valid');
        }


        // birthdate validation
        // if empty add warning class
        if (birthdate == '') {
            $('#birth_date').removeClass('invalid');
            $('#birth_date').addClass('warning');

            $('#birthdate_error').hide();
            $('#birthdate_error').html('');

            // check if birthdate matches age input
        } else if (age != '') {
            var birthdate_year = birthdate.split('-')[0];
            var birthdate_month = birthdate.split('-')[1];
            var birthdate_day = birthdate.split('-')[2];

            var today = new Date();
            var current_year = today.getFullYear();
            var current_month = today.getMonth() + 1;
            var current_day = today.getDate();

            var age_year = current_year - birthdate_year;
            var age_month = current_month - birthdate_month;
            var age_day = current_day - birthdate_day;

            if (age_year != age) {
                $('#birth_date').addClass('invalid');

                // add error message
                $('#birthdate_error').show();
                $('#birthdate_error').html('Birthdate does not match age');

                $('#birth_date').removeClass('warning');
                $('#birth_date').addClass('invalid');
                input_valid = false;

            } else {
                // clear error message
                $('#birthdate_error').hide();
                $('#birthdate_error').html('');

                $('#birth_date').removeClass('warning');
                $('#birth_date').removeClass('invalid');
                $('#birth_date').addClass('valid');
            }

        } else {
            // clear error message
            $('#birthdate_error').hide();
            $('#birthdate_error').html('');

            $('#birth_date').removeClass('warning');
            $('#birth_date').addClass('valid');
        }


        // sex validation
        if (sex == null) {
            $('#sex').removeClass('invalid');
            $('#sex').addClass('warning');
        } else {
            $('#sex').removeClass('warning');
            $('#sex').addClass('valid');
        }


        // civil status validation
        if (civil_status == '') {
            $('#civil_status').removeClass('invalid');
            $('#civil_status').addClass('warning');
        } else {
            $('#civil_status').removeClass('warning');
            $('#civil_status').addClass('valid');
        }


        // occupation validation
        if (occupation == '') {
            $('#occupation').removeClass('invalid');
            $('#occupation').addClass('warning');
        } else {
            $('#occupation').removeClass('warning');
            $('#occupation').addClass('valid');
        }

        // address validation
        if (address == '') {
            $('#address').removeClass('invalid');
            $('#address').addClass('warning');
        } else {
            $('#address').removeClass('warning');
            $('#address').addClass('valid');
        }


        // if current tab is 1
        if (currentTab == 1) {
            // cellphone number validation
            if (cell_no == '') {
                $('#cell_no').removeClass('valid');
                $('#cell_no').addClass('warning');

                $('#cell_no_error').hide();
                $('#cell_no_error').html('');

            } else if (cell_no.length != 11 || isNaN(cell_no)) {
                $('#cell_no').removeClass('warning');
                $('#cell_no').addClass('invalid');

                // add error message
                $('#cell_no_error').show();
                $('#cell_no_error').html('Invalid cellphone number');

                input_valid = false;

            } else {
                $('#cell_no_error').hide();

                $('#cell_no').removeClass('warning');
                $('#cell_no').removeClass('invalid');
                $('#cell_no').addClass('valid');
            }


            // telephone number validation
            if (tel_no == '') {
                $('#tel_no').removeClass('valid');
                $('#tel_no').addClass('warning');

                $('#tel_no_error').hide();
                $('#tel_no_error').html('');

            } else if (isNaN(tel_no)) {
                $('#tel_no').removeClass('warning');
                $('#tel_no').addClass('invalid');

                // add error message
                $('#tel_no_error').show();
                $('#tel_no_error').html('Invalid telephone number');

                input_valid = false;

            } else {
                $('#tel_no_error').hide();

                $('#tel_no').removeClass('warning');
                $('#tel_no').removeClass('invalid');
                $('#tel_no').addClass('valid');
            }

            var email_regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            // email validation
            if (email == '') {
                $('#email').removeClass('valid');
                $('#email').addClass('warning');

                $('#email_error').hide();
                $('#email_error').html('');

            } else if (!email.match(email_regex)) {
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




        //input_valid = false; // remove this
        // If all the fields are valid, return true. Otherwise, return false:
        if (input_valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }

        //console.log(select_valid);
        // return the valid status
        return input_valid;
    }



    var ext_name = document.getElementById('ext_name'),
        ext_age = document.getElementById('ext_age'),
        ext_birthdate = document.getElementById('ext_birthdate'),
        ext_sex = document.getElementById('ext_sex'),
        ext_cs = document.getElementById('ext_cs'),
        ext_occ = document.getElementById('ext_occ'),
        ext_address = document.getElementById('ext_address'),
        ext_mob = document.getElementById('ext_mob'),
        ext_tel = document.getElementById('ext_tel'),
        ext_weight = document.getElementById('ext_weight'),
        ext_height = document.getElementById('ext_height');


    ext_name.onblur = function() {
        if (ext_name.value == '') {
            $('#ext_name_error').show();
            $('#ext_name_error').html('Name is required');
            $('#ext_name').removeClass('valid');
            $('#ext_name').addClass('invalid');
            //$('#first_name').focus();

            input_valid = false;
        } else {
            $('#ext_name_error').hide();

            $('#ext_name').removeClass('invalid');
            $('#ext_name').addClass('valid');

            input_valid = true;
        }
    }

    ext_age.onblur = function() {
        if (ext_age.value < 0 || ext_age.value > 120) {
            $('#ext_age_error').show();
            $('#ext_age_error').html('Age must be between 0 and 120');

            $('#ext_age').removeClass('warning');
            $('#ext_age').removeClass('valid');
            $('#ext_age').addClass('invalid');
            //$('#age').focus();

            input_valid = false;

        } else if (isNaN(ext_age.value)) {
            $('#ext_age').removeClass('warning');
            $('#ext_age').addClass('invalid');

            // add error message
            $('#ext_age_error').show();
            $('#ext_age_error').html('Invalid age');
            input_valid = false;

        } else if (ext_age.value == '') {
            $('#ext_age').removeClass('invalid');
            $('#ext_age').addClass('warning');

            $('#ext_age_error').hide();
            $('#ext_age_error').html('');

            input_valid = true;
        } else {
            $('#ext_age_error').hide();

            $('#ext_age').removeClass('warning');
            $('#ext_age').removeClass('invalid');
            $('#ext_age').addClass('valid');
            input_valid = true;
        }
    }

    ext_birthdate.onblur = function() {

        if (ext_birthdate.value == '') {
            $('#ext_birthdate').removeClass('invalid');
            $('#ext_birthdate').addClass('warning');

            $('#ext_birthdate_error').hide();
            $('#ext_birthdate_error').html('');

            input_valid = true;
        } else if (ext_age.value != '') {
            var ext_birthdate_year = ext_birthdate.value.split('-')[0];
            var ext_birthdate_month = ext_birthdate.value.split('-')[1];
            var ext_birthdate_day = ext_birthdate.value.split('-')[2];

            var ext_today = new Date();
            var ext_current_year = ext_today.getFullYear();
            var ext_current_month = ext_today.getMonth() + 1;
            var ext_current_day = ext_today.getDate();

            var ext_age_year = ext_current_year - ext_birthdate_year;
            var ext_age_month = ext_current_month - ext_birthdate_month;
            var ext_age_day = ext_current_day - ext_birthdate_day;

            if (ext_age_year != ext_age.value) {
                $('#ext_birthdate').addClass('invalid');

                // add error message
                $('#ext_birthdate_error').show();
                $('#ext_birthdate_error').html('Birthdate does not match age');

                $('#ext_birthdate').removeClass('warning');
                $('#ext_birthdate').addClass('invalid');
                input_valid = false;
            } else {
                $('#ext_birthdate_error').hide();

                $('#ext_birthdate').removeClass('warning');
                $('#ext_birthdate').removeClass('invalid');
                $('#ext_birthdate').addClass('valid');
                input_valid = true;
            }
        } else {
            $('#ext_birthdate_error').hide();

            $('#ext_birthdate').removeClass('warning');
            $('#ext_birthdate').removeClass('invalid');
            $('#ext_birthdate').addClass('valid');
            input_valid = true;
        }

    }

    ext_sex.onblur = function() {
        if (ext_sex.value == '') {
            $('#ext_sex').removeClass('valid');
            $('#ext_sex').addClass('warning');

            input_valid = true;
        } else {
            $('#ext_sex').removeClass('warning');
            $('#ext_xex').addClass('valid');

            input_valid = true;
        }
    }

    ext_cs.onblur = function() {
        if (ext_cs.value == '') {
            $('#ext_cs').removeClass('valid');
            $('#ext_cs').addClass('warning');

            input_valid = true;
        } else {
            $('#ext_cs').removeClass('warning');
            $('#ext_cs').addClass('valid');

            input_valid = true;
        }
    }

    ext_occ.onblur = function() {
        if (ext_occ.value == '') {
            $('#ext_occ').removeClass('valid');
            $('#ext_occ').addClass('warning');

            input_valid = true;
        } else {
            $('#ext_occ').removeClass('warning');
            $('#ext_occ').addClass('valid');

            input_valid = true;
        }
    }

    ext_address.onblur = function() {
        if (ext_address.value == '') {
            $('#ext_address').removeClass('valid');
            $('#ext_address').addClass('warning');

            input_valid = true;
        } else {
            $('#ext_address').removeClass('warning');
            $('#ext_address').addClass('valid');

            input_valid = true;
        }
    }

    ext_mob.onblur = function() {
        if (ext_mob.value == '') {
            $('#ext_mob').removeClass('valid');
            $('#ext_mob').addClass('warning');

            $('#ext_mob_error').hide();
            $('#ext_mob_error').html('');

            input_valid = true;
        } else if (isNaN(ext_mob.value) || ext_mob.value.length != 11) {
            $('#ext_mob').removeClass('warning');
            $('#ext_mob').addClass('invalid');

            // add error message
            $('#ext_mob_error').show();
            $('#ext_mob_error').html('Invalid mobile number');
            input_valid = false;

        } else {
            $('#ext_mob_error').hide();

            $('#ext_mob').removeClass('warning');
            $('#ext_mob').removeClass('invalid');
            $('#ext_mob').addClass('valid');
            input_valid = true;
        }
    }

    ext_tel.onblur = function() {
        if (ext_tel.value == '') {
            $('#ext_tel').removeClass('valid');
            $('#ext_tel').addClass('warning');

            $('#ext_tel_error').hide();
            $('#ext_tel_error').html('');

            input_valid = true;
        } else {
            $('#ext_tel_error').hide();

            $('#ext_tel').removeClass('warning');
            $('#ext_tel').removeClass('invalid');
            $('#ext_tel').addClass('valid');
            input_valid = true;
        }
    }

    ext_weight.onblur = function() {
        if (ext_weight.value == '') {
            $('#ext_weight').removeClass('valid');
            $('#ext_weight').addClass('warning');

            $('#ext_weight_error').hide();
            $('#ext_weight_error').html('');

            input_valid = true;
        } else if (isNaN(ext_weight.value)) {
            $('#ext_weight').removeClass('warning');
            $('#ext_weight').addClass('invalid');

            // add error message
            $('#ext_weight_error').show();
            $('#ext_weight_error').html('Invalid weight');
            input_valid = false;

        } else {
            $('#ext_weight_error').hide();

            $('#ext_weight').removeClass('warning');
            $('#ext_weight').removeClass('invalid');
            $('#ext_weight').addClass('valid');
            input_valid = true;
        }
    }

    ext_height.onblur = function() {
        if (ext_height.value == '') {
            $('#ext_height').removeClass('valid');
            $('#ext_height').addClass('warning');

            $('#ext_height_error').hide();
            $('#ext_height_error').html('');

            input_valid = true;
        } else if (isNaN(ext_height.value)) {
            $('#ext_height').removeClass('warning');
            $('#ext_height').addClass('invalid');

            // add error message
            $('#ext_height_error').show();
            $('#ext_height_error').html('Invalid height');
            input_valid = false;

        } else {
            $('#ext_height_error').hide();

            $('#ext_height').removeClass('warning');
            $('#ext_height').removeClass('invalid');
            $('#ext_height').addClass('valid');
            input_valid = true;
        }
    }


    ext_mob.onblur = function() {
        if (ext_mob.value == '') {
            $('#ext_mob_error').show();
            $('#ext_mob_error').html('Mobile number is required');
            $('#ext_mob').removeClass('valid');
            $('#ext_mob').addClass('invalid');
            //$('#first_name').focus();

            input_valid = false;
        } else if (isNaN(ext_mob.value)) {
            $('#ext_mob').removeClass('warning');
            $('#ext_mob').addClass('invalid');

            // add error message
            $('#ext_mob_error').show();
            $('#ext_mob_error').html('Invalid cellphone number');
            input_valid = false;

        } else {
            $('#ext_mob_error').hide();

            $('#ext_mob').removeClass('warning');
            $('#ext_mob').removeClass('invalid');
            $('#ext_mob').addClass('valid');
            input_valid = true;
        }
    }





    function validateImport() {
        var input_valid = true,
            name = $('#ext_name').val(),
            age = $('#ext_age').val(),
            birthdate = $('#ext_birthdate').val(),
            sex = $('#ext_sex').val(),
            cs = $('#ext_cs').val(),
            occ = $('#ext_occ').val(),
            address = $('#ext_address').val(),
            mob = $('#ext_mob').val(),
            tel = $('#ext_tel').val(),
            weight = $('#ext_weight').val(),
            height = $('#ext_height').val();


        if (name == '') {
            $('#ext_name').addClass('invalid');

            $('#ext_name_error').show();
            $('#ext_name_error').html('Name is required');

            input_valid = false;
        } else {
            $('#ext_name_error').hide();
            $('#ext_name').html('');

            $('#ext_name').removeClass('invalid');
            $('#ext_name').addClass('valid');
        }


        if (age < 0 || age > 120) {
            $('#ext_age').removeClass('warning');
            $('#ext_age').removeClass('valid');
            $('#ext_age').addClass('invalid');

            $('#ext_age_error').show();
            $('#ext_age_error').html('Invalid age');

            input_valid = false;

        } else if (age == '') {
            $('#ext_age').removeClass('valid');
            $('#ext_age').removeClass('invalid');
            $('#ext_age').addClass('warning');

            $('#ext_age_error').hide();
            $('#ext_age_error').html('');

            input_valid = true;
        } else {
            $('#ext_age_error').hide();

            $('#ext_age').removeClass('warning');
            $('#ext_age').removeClass('invalid');
            $('#ext_age').addClass('valid');
            input_valid = true;
        }


        if (birthdate == '') {
            $('#ext_birthdate').removeClass('valid');
            $('#ext_birthdate').addClass('warning');

            $('#ext_birthdate_error').hide();
            $('#ext_birthdate_error').html('');

            input_valid = true;

        } else if (age != '') {
            var birthdate_year = birthdate.split('-')[0];
            var birthdate_month = birthdate.split('-')[1];
            var birthdate_day = birthdate.split('-')[2];

            var today = new Date();
            var current_year = today.getFullYear();
            var current_month = today.getMonth() + 1;
            var current_day = today.getDate();

            var age_year = current_year - birthdate_year;
            var age_month = current_month - birthdate_month;

            if (age_year != age) {
                $('#ext_birthdate').removeClass('warning');
                $('#ext_birthdate').addClass('invalid');

                $('#ext_birthdate_error').show();
                $('#ext_birthdate_error').html('Invalid birthdate');

                input_valid = false;
            } else {
                $('#ext_birthdate_error').hide();

                $('#ext_birthdate').removeClass('warning');
                $('#ext_birthdate').removeClass('invalid');
                $('#ext_birthdate').addClass('valid');
                input_valid = true;
            }
        } else {
            $('#ext_birthdate_error').hide();

            $('#ext_birthdate').removeClass('warning');
            $('#ext_birthdate').removeClass('invalid');
            $('#ext_birthdate').addClass('valid');
            input_valid = true;
        }


        if (sex == null) {
            $('#ext_sex').removeClass('invalid');
            $('#ext_sex').addClass('warning');
        } else {
            $('#ext_sex').removeClass('warning');
            $('#ext_sex').removeClass('invalid');
            $('#ext_sex').addClass('valid');
        }


        if (cs == '') {
            $('#ext_cs').removeClass('valid');
            $('#ext_cs').addClass('warning');
        } else {
            $('#ext_cs').removeClass('warning');
            $('#ext_cs').removeClass('invalid');
            $('#ext_cs').addClass('valid');
        }


        if (occ = '') {
            $('#ext_occ').removeClass('valid');
            $('#ext_occ').addClass('warning');
        } else {
            $('#ext_occ').removeClass('warning');
            $('#ext_occ').removeClass('invalid');
            $('#ext_occ').addClass('valid');
        }


        if (address == '') {
            $('#ext_address').removeClass('valid');
            $('#ext_address').addClass('warning');
        } else {
            $('#ext_address').removeClass('warning');
            $('#ext_address').removeClass('invalid');
            $('#ext_address').addClass('valid');
        }

        if (mob == '') {
            $('#ext_mob').removeClass('valid');
            $('#ext_mob').addClass('warning');

            $('#ext_mob_error').hide();
            $('#ext_mob_error').html('');

        } else if (mob.length != 11 || isNaN(mob)) {
            $('#ext_mob').removeClass('warning');
            $('#ext_mob').addClass('invalid');

            $('#ext_mob_error').show();
            $('#ext_mob_error').html('Invalid cellphone number');

            input_valid = false;
        } else {
            $('#ext_mob_error').hide();

            $('#ext_mob').removeClass('warning');
            $('#ext_mob').removeClass('invalid');
            $('#ext_mob').addClass('valid');
            input_valid = true;
        }


        if (tel == '') {
            $('#ext_tel').removeClass('valid');
            $('#ext_tel').addClass('warning');

            $('#ext_tel_error').hide();
            $('#ext_tel_error').html('');

        } else {
            $('#ext_tel_error').hide();

            $('#ext_tel').removeClass('warning');
            $('#ext_tel').removeClass('invalid');
            $('#ext_tel').addClass('valid');
            input_valid = true;
        }


        if (weight == '') {
            $('#ext_weight').removeClass('valid');
            $('#ext_weight').addClass('warning');

            $('#ext_weight_error').hide();
            $('#ext_weight_error').html('');

        } else if (isNaN(weight)) {
            $('#ext_weight').removeClass('warning');
            $('#ext_weight').addClass('invalid');

            $('#ext_weight_error').show();
            $('#ext_weight_error').html('Invalid weight');

            input_valid = false;
        } else {
            $('#ext_weight_error').hide();

            $('#ext_weight').removeClass('warning');
            $('#ext_weight').removeClass('invalid');
            $('#ext_weight').addClass('valid');
            input_valid = true;
        }

        if (height == '') {
            $('#ext_height').removeClass('valid');
            $('#ext_height').addClass('warning');

            $('#ext_height_error').hide();
            $('#ext_height_error').html('');

        } else if (isNaN(height)) {
            $('#ext_height').removeClass('warning');
            $('#ext_height').addClass('invalid');

            $('#ext_height_error').show();
            $('#ext_height_error').html('Invalid height');

            input_valid = false;
        } else {
            $('#ext_height_error').hide();

            $('#ext_height').removeClass('warning');
            $('#ext_height').removeClass('invalid');
            $('#ext_height').addClass('valid');
            input_valid = true;
        }




        // if input_valid is true submit the form
        if (input_valid == true) {
            // add type=submit to the button
            $('#save_import').attr('type', 'submit');
            $('#importForm').submit();
        }
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
    const toastTrigger = document.getElementById('liveToastTrigger')
    const toastLiveExample = document.getElementById('liveToast')

    var $active_toast = "<?= $this->session->flashdata('message') ?>"
    var $err_toast = "<?= $this->session->flashdata('error-import') ?>"
    var $err_img = "<?= $this->session->flashdata('error-profilepic') ?>"
    var $err_info = "<?= $this->session->flashdata('error') ?>"
    var $err_diag = "<?= $this->session->flashdata('error-diagnosis') ?>"
    var $err_doc = "<?= $this->session->flashdata('error-doc') ?>"

    if (toastTrigger) {
        if ($active_toast || $err_toast || $err_img || $err_info || $err_diag || $err_doc) {
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()

            if ($err_info == "input-error") {
                $(document).ready(function() {
                    $("#mdl-add-diagnosis").modal('show');
                });
            }

            if ($err_info == "error-treatment") {
                $(document).ready(function() {
                    $("#mdl-add-treatment-plan").modal('show');
                });
            }
        };
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
            "columnDefs": [
            { 
                "targets": [ 7 ], //first column / numbering column
                "orderable": false, //set not orderable
                "className": "text-center", "targets": [7]
            }
            ]
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