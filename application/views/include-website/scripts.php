<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('/assets/js/website-scripts.js') ?>"></script>
<script src="https://account.snatchbot.me/script.js"></script>
<script>
    window.sntchChat.Init(270244)
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
            document.getElementById("regForm").submit();

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
        if ($('#ec_name_error').val() == '') {
            $('#ec_name_error').hide();
        }
        if ($('#relationship_error').val() == '') {
            $('#relationship_error').hide();
        }
        if ($('#ec_contact_error').val() == '') {
            $('#ec_contact_error').hide();
        }
        if ($('#password_error').val() == '') {
            $('#password_error').hide();
        }
        if ($('#confirm_password_error').val() == '') {
            $('#confirm_password_error').hide();
        }
    });


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
        password = $('#password').val();
        confirm_password = $('#conf_password').val();


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

            validation['last_name'] = false;
        } else {
            // remove error message
            $('#lastName_error').hide();
            $('#last_name').html('');

            $('#last_name').removeClass('invalid');
            $('#last_name').addClass('valid');

            validation['last_name'] = true;
        }



        // age validation
        // if age has error add invalid class
        if (age < 0 || age > 120) {
            $('#age').removeClass('warning');
            $('#age').addClass('invalid');

            // add error message
            $('#age_error').show();
            $('#age_error').html('Invalid age');

            validation['age'] = false;

            // only accept numbers
        } else if (isNaN(age)) {
            $('#age').removeClass('warning');
            $('#age').addClass('invalid');

            // add error message
            $('#age_error').show();
            $('#age_error').html('Invalid age');
            validation['age'] = false;

            // if empty
        } else if (age == '') {
            $('#age').removeClass('valid');
            $('#age').addClass('invalid');

            // add error message
            $('#age_error').show();
            $('#age_error').html('Age is required');

            validation['age'] = false;
        } else {
            // clear error message
            $('#age_error').hide();
            $('#age_error').html('');

            $('#age').removeClass('warning');
            $('#age').removeClass('invalid');
            $('#age').addClass('valid');

            validation['age'] = true;
        }


        // birthdate validation
        // if empty add warning class
        if (birthdate == '') {
            $('#birth_date').removeClass('valid');
            $('#birth_date').addClass('invalid');

            // add error message
            $('#birthdate_error').show();
            $('#birthdate_error').html('Birthdate is required');

            validation['birthdate'] = false;

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
                validation['birthdate'] = false;

            } else {
                // clear error message
                $('#birthdate_error').hide();
                $('#birthdate_error').html('');

                $('#birth_date').removeClass('warning');
                $('#birth_date').removeClass('invalid');
                $('#birth_date').addClass('valid');

                validation['birthdate'] = true;
            }

        } else {
            // clear error message
            $('#birthdate_error').hide();
            $('#birthdate_error').html('');

            $('#birth_date').removeClass('warning');
            $('#birth_date').removeClass('invalid');
            $('#birth_date').addClass('valid');

            validation['birthdate'] = true;
        }


        // sex validation
        if (sex == null) {
            $('#sex').removeClass('valid');
            $('#sex').addClass('invalid');

            // add error message
            $('#sex_error').show();
            $('#sex_error').html('Sex is required');

            validation['sex'] = false;

        } else {
            $('#sex').removeClass('invalid');
            $('#sex').addClass('valid');

            // clear error message
            $('#sex_error').hide();
            $('#sex_error').html('');

            validation['sex'] = true;
        }


        // civil status validation
        if (civil_status == '' || civil_status == null) {
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
                $('#cell_no').addClass('invalid');

                // add error message
                $('#cell_no_error').show();
                $('#cell_no_error').html('Mobile number is required');

                validation['cell_no'] = false;

            } else if (cell_no.length != 11 || isNaN(cell_no)) {
                $('#cell_no').removeClass('warning');
                $('#cell_no').addClass('invalid');

                // add error message
                $('#cell_no_error').show();
                $('#cell_no_error').html('Invalid cellphone number');

                validation['cell_no'] = false;

            } else {
                $('#cell_no_error').hide();

                $('#cell_no').removeClass('warning');
                $('#cell_no').removeClass('invalid');
                $('#cell_no').addClass('valid');

                validation['cell_no'] = true;
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

                validation['tel_no'] = false;

            } else {
                $('#tel_no_error').hide();

                $('#tel_no').removeClass('warning');
                $('#tel_no').removeClass('invalid');
                $('#tel_no').addClass('valid');

                validation['tel_no'] = true;
            }

            var email_regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            // email validation
            if (email == '') {
                $('#email').removeClass('valid');
                $('#email').addClass('invalid');

                // add error message
                $('#email_error').show();
                $('#email_error').html('Email is required');

                validation['email'] = false;

            } else if (!email.match(email_regex)) {
                $('#email').removeClass('warning');
                $('#email').addClass('invalid');

                // add error message
                $('#email_error').show();
                $('#email_error').html('Invalid email');

                validation['email'] = false;

            } else {
                $('#email_error').hide();

                $('#email').removeClass('warning');
                $('#email').removeClass('invalid');
                $('#email').addClass('valid');

                validation['email'] = true;
            }
        }

        if (currentTab == 2) {
            // ec_name validation
            if (ec_name == '') {
                $('#ec_name').removeClass('valid');
                $('#ec_name').addClass('invalid');

                // add error message
                $('#ec_name_error').show();
                $('#ec_name_error').html('Name is required');

                validation['ec_name'] = false;

            } else {
                $('#ec_name_error').hide();

                $('#ec_name').removeClass('warning');
                $('#ec_name').removeClass('invalid');
                $('#ec_name').addClass('valid');

                validation['ec_name'] = true;
            }

            // relationship validation
            if (relationship == '' || relationship == null) {
                $('#relationship').removeClass('valid');
                $('#relationship').addClass('invalid');

                // add error message
                $('#relationship_error').show();
                $('#relationship_error').html('Relationship is required');

                validation['relationship'] = false;

            } else {
                $('#relationship_error').hide();

                $('#relationship').removeClass('warning');
                $('#relationship').removeClass('invalid');
                $('#relationship').addClass('valid');

                validation['relationship'] = true;
            }

            // ec_contact validation
            if (ec_contact == '') {
                $('#ec_contact_no').removeClass('valid');
                $('#ec_contact_no').addClass('invalid');

                // add error message
                $('#ec_contact_error').show();
                $('#ec_contact_error').html('Contact number is required');

                validation['ec_contact'] = false;

            } else if (ec_contact.length != 11 || isNaN(ec_contact)) {
                $('#ec_contact_no').removeClass('warning');
                $('#ec_contact_no').addClass('invalid');

                // add error message
                $('#ec_contact_error').show();
                $('#ec_contact_error').html('Invalid cellphone number');

                validation['ec_contact'] = false;

            } else {
                $('#ec_contact_error').hide();

                $('#ec_contact_no').removeClass('warning');
                $('#ec_contact_no').removeClass('invalid');
                $('#ec_contact_no').addClass('valid');

                validation['ec_contact'] = true;
            }
        }

        if (currentTab == 3) {
            // password validation
            if (password == '') {
                $('#password').removeClass('valid');
                $('#password').addClass('invalid');

                // add error message
                $('#password_error').show();
                $('#password_error').html('Password is required');

                validation['password'] = false;

            } else if (password.length < 8) {
                $('#password').removeClass('warning');
                $('#password').addClass('invalid');

                // add error message
                $('#password_error').show();
                $('#password_error').html('Password must be at least 8 characters');

                validation['password'] = false;

            } else {
                $('#password_error').hide();

                $('#password').removeClass('warning');
                $('#password').removeClass('invalid');
                $('#password').addClass('valid');

                validation['password'] = true;
            }

            // confirm password validation
            if (confirm_password == '') {
                $('#conf_password').removeClass('valid');
                $('#conf_password').addClass('invalid');

                // add error message
                $('#confirm_password_error').show();
                $('#confirm_password_error').html('Confirm password is required');

                validation['confirm_password'] = false;

            } else if (confirm_password != password) {
                $('#conf_password').removeClass('warning');
                $('#conf_password').addClass('invalid');

                // add error message
                $('#confirm_password_error').show();
                $('#confirm_password_error').html('Password does not match');

                validation['confirm_password'] = false;

            } else {
                $('#confirm_password_error').hide();

                $('#conf_password').removeClass('warning');
                $('#conf_password').removeClass('invalid');
                $('#conf_password').addClass('valid');

                validation['confirm_password'] = true;
            }
        }

        const areTrue = Object.values(validation).every(
            value => value === true
        );

        //input_valid = false; // remove this
        // If all the fields are valid, return true. Otherwise, return false:
        if (areTrue == true) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }

        //console.log(select_valid);
        // return the valid status
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


    $(document).ready(function() {
        $("#terms-conditions").modal('show');
    });

    var acceptCheck = document.getElementById('acceptCheck');
    var continueBtn = document.getElementById('continueBtn');

    // button is disabled until checkbox is checked
    continueBtn.disabled = true;

    acceptCheck.addEventListener('change', function() {
        continueBtn.disabled = !this.checked;
    });




</script>

</body>

</html>