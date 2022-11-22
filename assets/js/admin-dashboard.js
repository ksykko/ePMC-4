// * Edit function
function editInfo() {
    // remove readonly attribute from all input fields

    var inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.removeAttribute('readonly');
    });

    // highlight input fields
    inputs.forEach(input => {
        input.classList.add('border', 'border-warning');
    });

    // focus on first input field and display cursor at the end of the text
    inputs[0].focus();
    inputs[0].setSelectionRange(inputs[0].value.length, inputs[0].value.length);

    // if it leaves the input field, remove the highlight
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            input.classList.remove('border', 'border-warning');
        });
    });

    // if it leaves modal, remove the highlight
    $('#view-pers-info').on('hidden.bs.modal', function() {
        inputs.forEach(input => {
            input.classList.remove('border', 'border-warning');
        });
    });

    var first_name = document.getElementById('first_name'),
        middle_name = document.getElementById('middle_name'),
        last_name = document.getElementById('last_name'),
        username = document.getElementById('username'),
        birthdate = document.getElementById('birth_date'),
        cell_no = document.getElementById('cell_no'),
        email = document.getElementById('email');
    password = document.getElementById('password'),
        confpass = document.getElementById('confpass');


    first_name.onblur = function() {
        if (first_name.value == '') {
            $('#firstName_error').show();
            $('#firstName_error').html('First name is required');
            $('#first_name').removeClass('valid')
            $('#first_name').addClass('invalid')
                //first_name.focus();

        } else {
            $('#firstName_error').hide();
            $('#first_name').removeClass('invalid')
            $('#first_name').addClass('valid')
        }
    }

    middle_name.onblur = function() {
        if (middle_name.value == '') {
            $('#middle_name').removeClass('valid')
            $('#middle_name').addClass('warning')
                //middle_name.focus();

        } else {
            $('#middle_name').removeClass('warning')
            $('#middle_name').addClass('valid')
        }
    }

    last_name.onblur = function() {
        if (last_name.value == '') {
            $('#lastName_error').show();
            $('#lastName_error').html('Last name is required');
            $('#last_name').removeClass('valid')
            $('#last_name').addClass('invalid')
                //last_name.focus();

        } else {
            $('#lastName_error').hide();
            $('#last_name').removeClass('invalid')
            $('#last_name').addClass('valid')
        }
    }

    username.onblur = function() {
        if (username.value == '') {
            $('#username_error').show();
            $('#username_error').html('Username is required');
            $('#username').removeClass('valid')
            $('#username').addClass('invalid')
                //username.focus();

        } else {
            $('#username_error').hide();
            $('#username').removeClass('invalid')
            $('#username').addClass('valid')
        }
    }

    birthdate.onblur = function() {
        if (birthdate.value == '') {
            $('#birthdate_error').show();
            $('#birthdate_error').html('Birthdate is required');
            $('#birth_date').removeClass('valid')
            $('#birth_date').addClass('invalid')
                //birthdate.focus();

        } else {
            $('#birthdate_error').hide();
            $('#birth_date').removeClass('invalid')
            $('#birth_date').addClass('valid')
        }
    }

    cell_no.onblur = function() {
        if (cell_no.value == '') {
            $('#cell_no_error').show();
            $('#cell_no_error').html('Contact number is required');
            $('#cell_no').removeClass('valid')
            $('#cell_no').addClass('invalid')
                //cell_no.focus();

        } else if (cell_no.value.length < 11) {
            $('#cell_no_error').show();
            $('#cell_no_error').html('Contact number must be 11 digits');
            $('#cell_no').removeClass('valid')
            $('#cell_no').addClass('invalid')
                //cell_no.focus();

        } else if (isNaN(cell_no.value)) {
            $('#cell_no_error').show();

            $('#cell_no_error').html('Contact number must be numeric');
            $('#cell_no').removeClass('valid')
            $('#cell_no').addClass('invalid')
                //cell_no.focus();

        } else {
            $('#cell_no_error').hide();
            $('#cell_no').removeClass('invalid')
            $('#cell_no').addClass('valid')
        }
    }


    var email_regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    email.onblur = function() {
        if (email.value == '') {
            $('#email_error').show();
            $('#email_error').html('Email is required');
            $('#email').removeClass('valid')
            $('#email').addClass('invalid')
                //email.focus();

        } else if (!email.value.match(email_regex)) {
            $('#email_error').show();
            $('#email_error').html('Invalid email format');
            $('#email').removeClass('valid')
            $('#email').addClass('invalid')
                //email.focus();

        } else {
            $('#email_error').hide();
            $('#email').removeClass('invalid')
            $('#email').addClass('valid')
        }
    }

    password.onblur = function() {
        if (password.value == '') {
            $('#password_error').show();
            $('#password_error').html('Password is required');
            $('#password').removeClass('valid')
            $('#password').addClass('invalid')
                //password.focus();

        } else if (password.value.length < 8) {
            $('#password_error').show();
            $('#password_error').html('Password must be at least 8 characters');
            $('#password').removeClass('valid')
            $('#password').addClass('invalid')
                //password.focus();

        } else {
            $('#password_error').hide();
            $('#password').removeClass('invalid')
            $('#password').addClass('valid')
        }
    }

    confpass.onblur = function() {
        if (confpass.value == '') {
            $('#confpass_error').show();
            $('#confpass_error').html('Confirm password is required');
            $('#confpass').removeClass('valid')
            $('#confpass').addClass('invalid')
                //confirms.focus();

        } else if (confpass.value != password.value) {
            $('#confpass_error').show();
            $('#confpass_error').html('Password does not match');
            $('#confpass').removeClass('valid')
            $('#confpass').addClass('invalid')
                //confirms.focus();

        } else {
            $('#confpass_error').hide();
            $('#confpass').removeClass('invalid')
            $('#confpass').addClass('valid')
        }
    }

    // if it leaves modal, reset values
    $('#view-pers-info').on('hidden.bs.modal', function() {
        $('#firstName_error').hide();
        $('#lastName_error').hide();
        $('#username_error').hide();
        $('#birthdate_error').hide();
        $('#cell_no_error').hide();
        $('#email_error').hide();
        $('#password_error').hide();
        $('#confpass_error').hide();
        $('#first_name').removeClass('invalid')
        $('#first_name').removeClass('valid')
        $('#middle_name').removeClass('warning')
        $('#middle_name').removeClass('valid')
        $('#last_name').removeClass('invalid')
        $('#last_name').removeClass('valid')
        $('#username').removeClass('invalid')
        $('#username').removeClass('valid')
        $('#birth_date').removeClass('invalid')
        $('#birth_date').removeClass('valid')
        $('#cell_no').removeClass('invalid')
        $('#cell_no').removeClass('valid')
        $('#email').removeClass('invalid')
        $('#email').removeClass('valid')
        $('#password').removeClass('invalid')
        $('#password').removeClass('valid')
        $('#confpass').removeClass('invalid')
        $('#confpass').removeClass('valid')
    });

}


function validateForm() {
    var first_name = $('#first_name').val(),
        middle_name = $('#middle_name').val(),
        last_name = $('#last_name').val(),
        username = $('#username').val(),
        birthdate = $('#birth_date').val(),
        cell_no = $('#cell_no').val(),
        email = $('#email').val(),
        pass = $('#password').val(),
        confpass = $('#confpass').val();

    var validation = [];

    if (first_name == '') {
        $('#firstName_error').show();
        $('#firstName_error').html('First name is required');
        $('#first_name').removeClass('valid');
        $('#first_name').addClass('invalid');

        validation['first_name'] = false;

    } else {
        $('#firstName_error').hide();
        $('#first_name').removeClass('invalid');
        $('#first_name').addClass('valid');

        validation['first_name'] = true;
    }

    if (middle_name == '') {
        $('#middle_name').removeClass('valid');
        $('#middle_name').addClass('warning');

    } else {
        $('#middle_name').removeClass('warning');
        $('#middle_name').addClass('valid');

        validation['middle_name'] = true;
    }

    if (last_name == '') {
        $('#lastName_error').show();
        $('#lastName_error').html('Last name is required');
        $('#last_name').removeClass('valid');
        $('#last_name').addClass('invalid');

        validation['last_name'] = false;

    } else {
        $('#lastName_error').hide();
        $('#last_name').removeClass('invalid');
        $('#last_name').addClass('valid');

        validation['last_name'] = true;
    }

    if (username == '') {
        $('#username_error').show();
        $('#username_error').html('Username is required');
        $('#username').removeClass('valid');
        $('#username').addClass('invalid');

        validation['username'] = false;

    } else {
        $('#username_error').hide();
        $('#username').removeClass('invalid');
        $('#username').addClass('valid');

        validation['username'] = true;
    }

    if (birthdate == '') {
        $('#birthdate_error').show();
        $('#birthdate_error').html('Birthdate is required');
        $('#birth_date').removeClass('valid');
        $('#birth_date').addClass('invalid');

        validation['birthdate'] = false;

    } else {
        $('#birthdate_error').hide();
        $('#birth_date').removeClass('invalid');
        $('#birth_date').addClass('valid');

        validation['birthdate'] = true;
    }

    if (cell_no == '') {
        $('#cell_no_error').show();
        $('#cell_no_error').html('Contact number is required');
        $('#cell_no').removeClass('valid');
        $('#cell_no').addClass('invalid');

        validation['cell_no'] = false;


    } else if (cell_no.length < 11) {
        $('#cell_no_error').show();
        $('#cell_no_error').html('Contact number must be 11 digits');
        $('#cell_no').removeClass('valid');
        $('#cell_no').addClass('invalid');

        validation['cell_no'] = false;

    } else if (isNaN(cell_no)) {
        $('#cell_no_error').show();
        $('#cell_no_error').html('Contact number must be numeric');
        $('#cell_no').removeClass('valid');
        $('#cell_no').addClass('invalid');

        validation['cell_no'] = false;

    } else {
        $('#cell_no_error').hide();
        $('#cell_no').removeClass('invalid');
        $('#cell_no').addClass('valid');

        validation['cell_no'] = true;
    }

    var email_regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (email == '') {
        $('#email_error').show();
        $('#email_error').html('Email is required');
        $('#email').removeClass('valid');
        $('#email').addClass('invalid');

        validation['email'] = false;

    } else if (!email_regex.test(email)) {
        $('#email_error').show();
        $('#email_error').html('Invalid email');
        $('#email').removeClass('valid');
        $('#email').addClass('invalid');

        validation['email'] = false;

    } else {
        $('#email_error').hide();
        $('#email').removeClass('invalid');
        $('#email').addClass('valid');

        validation['email'] = true;
    }

    if (pass == '') {
        $('#password_error').show();
        $('#password_error').html('Password is required');
        $('#password').removeClass('valid');
        $('#password').addClass('invalid');

        validation['password'] = false;

    } else if (pass.length < 8) {
        $('#password_error').show();
        $('#password_error').html('Password must be at least 8 characters');
        $('#password').removeClass('valid');
        $('#password').addClass('invalid');

        validation['password'] = false;

    } else {
        $('#password_error').hide();
        $('#password').removeClass('invalid');
        $('#password').addClass('valid');

        validation['password'] = true;
    }

    if (confpass == '') {
        $('#confpass_error').show();
        $('#confpass_error').html('Confirm password is required');
        $('#confpass').removeClass('valid');
        $('#confpass').addClass('invalid');

        validation['confpass'] = false;

    } else if (confpass != pass) {
        $('#confpass_error').show();
        $('#confpass_error').html('Password does not match');
        $('#confpass').removeClass('valid');
        $('#confpass').addClass('invalid');

        validation['confpass'] = false;

    } else {
        $('#confpass_error').hide();
        $('#confpass').removeClass('invalid');
        $('#confpass').addClass('valid');

        validation['confpass'] = true;
    }

    console.log(pass.length);
    console.log(validation);

    // remove border-warning class if all fields are true
    if (validation['first_name'] && validation['middle_name'] && validation['last_name'] && validation['username'] && validation['birthdate'] && validation['cell_no'] && validation['email'] && validation['password'] && validation['confpass']) {
        $('#first_name').removeClass('border-warning');
        $('#middle_name').removeClass('border-warning');
        $('#last_name').removeClass('border-warning');
        $('#username').removeClass('border-warning');
        $('#birth_date').removeClass('border-warning');
        $('#cell_no').removeClass('border-warning');
        $('#email').removeClass('border-warning');
        $('#password').removeClass('border-warning');
        $('#confpass').removeClass('border-warning');
    }



    const areTrue = Object.values(validation).every(
        value => value === true
    );

    if (areTrue) {
        $('#edit_info').submit();
    }
}


// * Validation
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
    if ($('#username_error').val() == '') {
        $('#username_error').hide();
    }
    if ($('#birthdate_error').val() == '') {
        $('#birthdate_error').hide();
    }
    if ($('#cell_no_error').val() == '') {
        $('#cell_no_error').hide();
    }
    if ($('#password_error').val() == '') {
        $('#password_error').hide();
    }
    if ($('#confpass_error').val() == '') {
        $('#confpass_error').hide();
    }
    if ($('#email_error').val() == '') {
        $('#email_error').hide();
    }
});