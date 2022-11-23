<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>



<script type="text/javascript">
    // * Toasts
    const toastTrigger = document.getElementById('liveToastTrigger')
    const toastLiveExample = document.getElementById('liveToast')
    
    var msgToast = "<?= $this->session->flashdata('message') ?>"
    var errToast = "<?= $this->session->flashdata('error-upload') ?>"

    if (toastTrigger) {
        if (msgToast || errToast) {

            if (errToast) {
                $(document).ready(function() {
                    $("#mdl-uploadpic").modal('show');
                });
            }

            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        }
    }
    
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

    

    var staff_data = JSON.parse('<?= $staff_data ?>');
    console.log(staff_data);

</script>
<script src="<?= base_url('/assets/js/Charts/user_activity_chart.js') ?>"></script>
<script src="<?= base_url('/assets/js/Charts/satisfaction_chart.js') ?>"></script>
<script src="<?= base_url('/assets/js/Charts/staff_chart.js') ?>"></script>
<script src="<?= base_url('/assets/js/admin-dashboard.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


</body>

</html>