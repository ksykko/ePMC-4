<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>




<script type="text/javascript">
    var options = {
        series: [{
            name: "Activities",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
        chart: {
            height: '290px',
            type: 'line',
            zoom: {
                enabled: false
            },
            fontFamily: 'Poppins, sans-serif',
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientToColors: ['#5d61c0'],
                shadeIntensity: 1,
                type: 'horizontal',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            },
        }
    };

    var chart = new ApexCharts(document.querySelector("#activity_chart"), options);
    chart.render();


    var options = {
        series: [14, 23, 21, 17, 15],
        chart: {
            type: 'polarArea',
            toolbar: {
                show: true
            },
            fontFamily: 'Poppins, sans-serif',
            height: 400,

        },
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            fontSize: '14px',
            fontFamily: 'Poppins, sans-serif',
            markers: {
                width: 10,
                height: 10,
            },
            itemMargin: {
                horizontal: 5,
                vertical: 5
            }
        },
        plotOptions: {
            polarArea: {
                rings: {
                    strokeWidth: 1,
                    //strokeColor: '#000000'
                },
                spokes: {
                    strokeWidth: 0,
                    //connectorColors: '#000000'
                },
            }
        },
        labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied'],
        fill: {
            opacity: 0.8,
            color: ['#F72585', '#7209B7', '#3A0CA3', '#4361EE', '#4CC9F0'],
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
        colors: ['#F72585', '#7209B7', '#3A0CA3', '#4361EE', '#4CC9F0'],
    };

    var satisChart = new ApexCharts(document.querySelector("#satis_chart"), options);
    satisChart.render();

    var options = {
        series: [{
                name: 'Admin',
                data: [{
                        x: 'General Manager',
                        y: 2
                    },
                    {
                        x: 'Pharmacy Assistant',
                        y: 3
                    },
                    {
                        x: 'Secretary',
                        y: 3
                    },
                    {
                        x: 'Nurse',
                        y: 3
                    }
                ]
            },
            {
                name: 'Doctor',
                data: [{
                        x: 'Internal Medicine',
                        y: 2
                    },
                    {
                        x: 'Family Medicine',
                        y: 2
                    },
                    {
                        x: 'Ob & Gyn',
                        y: 1
                    },
                    {
                        x: 'Orthopedic',
                        y: 1
                    }
                ]
            }
        ],
        legend: {
            show: false
        },
        chart: {
            height: 350,
            type: 'treemap',
            fontFamily: 'Poppins, sans-serif',

        },
    };

    var chart = new ApexCharts(document.querySelector("#tree_chart"), options);
    chart.render();


    $(document).ready(function() {
        $('#recent_activity_table').DataTable({
            // remove search box and show entries with pagination
            "dom": "tip",
            "pageLength": 5,
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "ajax": {
                url: "<?php echo site_url("Admin/datatable") ?>",
                type: 'POST'
            },


        });

    });


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

        // if it leaves modal, reset values
        $('#view-pers-info').on('hidden.bs.modal', function() {
            $('#firstName_error').hide();
            $('#lastName_error').hide();
            $('#username_error').hide();
            $('#birthdate_error').hide();
            $('#cell_no_error').hide();
            $('#email_error').hide();
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
        });
        
    }


    function validateForm() {
        var first_name = $('#first_name').val(),
            middle_name = $('#middle_name').val(),
            last_name = $('#last_name').val(),
            username = $('#username').val(),
            birthdate = $('#birth_date').val(),
            cell_no = $('#cell_no').val(),
            email = $('#email').val();
        
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



        const areTrue = Object.values(validation).every(
            value => value === true
        );

        if (areTrue) {
            $('#edit_info').submit();
        }
    }


    // * validation
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
        if ($('#email_error').val() == '') {
            $('#email_error').hide();
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


</body>

</html>