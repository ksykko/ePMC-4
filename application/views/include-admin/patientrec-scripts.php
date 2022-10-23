<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>


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
                "targets": [3], //first column / numbering column
                "orderable": false, //set not orderable
                "className": "text-center",
                "targets": [3]
            }]
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>


</body>

</html>