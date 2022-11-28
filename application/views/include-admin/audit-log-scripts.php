<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>


<script type="text/javascript">
    var font = "font-family: 'Poppins', sans-serif;";

    $(document).ready(function() {
        $('#audit_log').DataTable({
            "processing": true,
            order: [
                [3, 'desc']
            ],
            responsive: true,
            "ajax": {
                url: "<?= site_url('Admin/audit_log_dt'); ?>",
                type: "POST"
            },
            // add print button to the table
            dom: 'Bfrtip',
            buttons: [
                // style the print button
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"><small style="' + font + '"> Print</small></i>',
                    className: 'btn btn-dark btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                }
            ],


            "columnDefs": [{
                    "targets": [2],
                    "orderable": false,
                },
                {
                    "targets": [0, 1, 2, 3],
                    "className": "align-middle"
                }

            ],
        });

    });

    $(document).ready(function() {
        $('#patient_audit_log').DataTable({
            "processing": true,
            order: [
                [3, 'desc']
            ],
            responsive: true,
            "ajax": {
                url: "<?= site_url('Admin/patient_audit_dt'); ?>",
                type: "POST"
            },
            // add print button to the table
            dom: 'Bfrtip',
            buttons: [
                // style the print button
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"><small style="' + font + '"> Print</small></i>',
                    className: 'btn btn-dark btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                }
            ],
            autoWidth: false,


            "columnDefs": [{
                    "targets": [2],
                    "orderable": false,
                },
                {
                    "targets": [0, 1, 2, 3],
                    "className": "align-middle"
                }

            ],
        });



    });
</script>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>


</body>

</html>