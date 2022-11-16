<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>


<script>
    // merge first, middle and last name
    $(function() {
        $('#first_name, #middle_name, #last_name').on('input', function() {
            $('#full_name').val(
                $('#first_name, #middle_name, #last_name').map(function() {
                    return $(this).val();
                }).get().join(' ') /* added space */
            );

        });
    });

    jQuery.ajax({
        url: "<?= site_url('Admin_patientrec') ?>",
        data: 'full_name=' + $("#full_name").val(),
        type: "POST",
        success: function(data) {
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#full_name").css("background", "#FFF");
        }
    });

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