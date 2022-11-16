<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>


<script>
    // merge first, middle and last name
    // $(function() {
    //     $('#first_name, #middle_name, #last_name').on('input', function() {
    //         $('#full_name').val(
    //             $('#first_name, #middle_name, #last_name').map(function() {
    //                 return $(this).val();
    //             }).get().join(' ') /* added space */
    //         );

    //     });
    // });

    // change event on last_name field that checks if first_name, middle_name and last_name already exist
    // $(function() {
    //     $('#last_name').on('change', function() {
    //         var first_name = $('#first_name').val();
    //         var middle_name = $('#middle_name').val();
    //         var last_name = $('#last_name').val();
    //         var full_name = first_name + ' ' + middle_name + ' ' + last_name;
    //         var url = '<?= base_url('admin/patientrec/check_name') ?>';
    //         $.ajax({
    //             url: url,
    //             method: 'POST',
    //             data: {
    //                 full_name: full_name
    //             },
    //             success: function(data) {
    //                 if (data == 'true') {
    //                     $('#last_name').val('');
    //                     $('#last_name').focus();
    //                     alert('Patient already exists!');
    //                 }
    //             }
    //         });
    //     });
    // });

    // change event on last_name field that checks if first_name, middle_name and last_name already exist

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
    });

    function validateForm() {
        // This function deals with validation of the form fields
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
            ec_contact = $('#ec_contact').val();


        checkName().then((data) => {
            if (data != 'false') {
                return 'putangina';
            }

        });

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



        







        input_valid = false; // remove this
        // If all the fields are valid, return true. Otherwise, return false:
        if (input_valid && select_valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }

        //console.log(select_valid);
        // return the valid status
        return input_valid && select_valid;
    }

    async function checkName() {
        var first_name = $('#first_name').val();
        var middle_name = $('#middle_name').val();
        var last_name = $('#last_name').val();
        var full_name = first_name + ' ' + middle_name + ' ' + last_name;
        var url = '<?= site_url('Admin_patientrec/check_name') ?>';

        let result;

        try {
            if (full_name != '') {
                result = await $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        full_name: full_name
                    },
                    success: function(data) {
                        $('#fullName_result').html(data);
                    }
                });
                return result;
            }
        } catch (error) {
            console.error(error);
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




<?php $ext_data = $this->session->flashdata('success-import') ?>
<script type="text/javascript">
    var import_success = "<?= $ext_data['File'] ?>";
    console.log(import_success);
    if (import_success) {
        $(document).ready(function() {
            $("#modal-verify").modal('show');
        });
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
    const user_role = '<?= $user_role ?>';

    $(document).ready(function() {
        $('#example').DataTable({
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            responsive: true,

            // if user is doctor, change url to doctor's datatable
            "ajax": {
                url: user_role == 'Doctor' ? "<?= site_url('Doctor_patientrec/datatable') ?>" : "<?= site_url('Admin_patientrec/datatable') ?>",
                type: "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [4], //first column / numbering column
                    "orderable": false, //set not orderable
                    "className": "text-center",
                    "targets": [4]
                },
                {
                    "targets": [3],
                    render: function(data, type, row) {
                        if (data == 'added') {
                            return '<span class="badge bg-success">Added</span>';
                        } else {
                            return '<span class="badge bg-warning">Imported</span>';
                        }
                    },
                    "targets": [3],
                    "className": "text-center"
                }
            ]
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#diag_table').DataTable({
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            responsive: true,
            "ajax": {
                url: "<?php echo site_url("Admin_patientrec/diag_dt/") . $patient->patient_id  ?>",
                type: 'POST'
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [3], //first column / numbering column
                "orderable": false, //set not orderable
                "className": "text-center",
                "targets": [3],
            }]
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#treatment_plan_table').DataTable({
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            responsive: true,
            "ajax": {
                url: "<?php echo site_url("Admin_patientrec/treatment_dt/") . $patient->patient_id  ?>",
                type: 'POST'
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [3], //first column / numbering column
                    "orderable": false, //set not orderable
                    "className": "text-center",
                    "targets": [2],
                },
                {
                    // rowCallback: function(row, data, index) {
                    //     if (data.$treatment->p_treatment_plan === null) {
                    //         $(row).hide();
                    //     }
                    // }
                    // hide row if treatment plan is null
                    rowcallBack: function(row, data, index) {
                        if (data[0] === null) {
                            $(row).hide();
                        }
                    }
                }
            ]
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#consul_table').DataTable({
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            responsive: true,
            "ajax": {
                url: "<?php echo site_url("Admin_patientrec/consul_dt/") . $patient->patient_id  ?>",
                type: 'POST'
            },

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