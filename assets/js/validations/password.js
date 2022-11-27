$(document).ready(function() {
    if ($('#new_password_error').val() == '') {
        $('#new_password_error').hide();
    }
    if ($('#conf_password_error').val() == '') {
        $('#conf_password_error').hide();
    }
});


// * ONBLUR FUNCTIONS

var new_password = document.getElementById('new_password'),
    conf_password = document.getElementById('conf_password');


new_password.onblur = function() {
    if (new_password.value == '') {
        $('#new_password').removeClass('valid');
        $('#new_password').addClass('invalid');

        $('#new_password_error').show();
        $('#new_password_error').html('New Password is required');

    } else if (new_password.value.length < 8) {
        $('#new_password').removeClass('valid');
        $('#new_password').addClass('invalid');

        $('#new_password_error').show();
        $('#new_password_error').html('New Password must be at least 8 characters');
    } else {
        $('#new_password').removeClass('invalid');
        $('#new_password').addClass('valid');

        $('#new_password_error').hide();
        $('#new_password_error').html('');
    }
}

conf_password.onblur = function() {
    if (conf_password.value == '') {
        $('#conf_password').removeClass('valid');
        $('#conf_password').addClass('invalid');

        $('#conf_password_error').show();
        $('#conf_password_error').html('Confirm Password is required');

    } else if (conf_password.value != new_password.value) {
        $('#conf_password').removeClass('valid');
        $('#conf_password').addClass('invalid');

        $('#conf_password_error').show();
        $('#conf_password_error').html('Password does not match');
    } else {
        $('#conf_password').removeClass('invalid');
        $('#conf_password').addClass('valid');

        $('#conf_password_error').hide();
        $('#conf_password_error').html('');
    }
}






// * ONCLICK FUNCTION

function changePassword() {
    var password = $('#password').val(),
        new_password = $('#new_password').val(),
        conf_password = $('#conf_password').val();

    var validations = [];

    if (password == '') {
        $('#password').removeClass('valid');
        $('#password').addClass('invalid');

        $('#password_error').show();
        $('#password_error').html('Old Password is required');

        validations['password'] = false;

    } else {
        $('#password').removeClass('invalid');
        $('#password').addClass('valid');

        $('#password_error').hide();
        $('#password_error').html('');

        validations['password'] = true;
    }

    if (new_password == '') {
        $('#new_password').removeClass('valid');
        $('#new_password').addClass('invalid');

        $('#new_password_error').show();
        $('#new_password_error').html('New Password is required');

        validations['new_password'] = false;

    } else if (new_password.length < 8) {
        $('#new_password').removeClass('valid');
        $('#new_password').addClass('invalid');

        $('#new_password_error').show();
        $('#new_password_error').html('New Password must be at least 8 characters');

        validations['new_password'] = false;

    } else {
        $('#new_password').removeClass('invalid');
        $('#new_password').addClass('valid');

        $('#new_password_error').hide();
        $('#new_password_error').html('');

        validations['new_password'] = true;
    }

    if (conf_password == '') {
        $('#conf_password').removeClass('valid');
        $('#conf_password').addClass('invalid');

        $('#conf_password_error').show();
        $('#conf_password_error').html('Confirm Password is required');

        validations['conf_password'] = false;

    } else if (conf_password != new_password) {
        $('#conf_password').removeClass('valid');
        $('#conf_password').addClass('invalid');

        $('#conf_password_error').show();
        $('#conf_password_error').html('Confirm Password does not match');

        validations['conf_password'] = false;

    } else {
        $('#conf_password').removeClass('invalid');
        $('#conf_password').addClass('valid');

        $('#conf_password_error').hide();
        $('#conf_password_error').html('');

        validations['conf_password'] = true;
    }

}