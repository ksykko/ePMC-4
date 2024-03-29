<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>

<script>
    const toastTrigger = document.getElementById('liveToastTrigger')
    const toastLiveExample = document.getElementById('liveToast')

    var $active_toast = "<?= $this->session->flashdata('message') ?>"

    if (toastTrigger) {
        if ($active_toast) {
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        }
        toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()
        })
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sched-list-tbl').DataTable({
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            responsive: true,
            "order": [], //Initial no order.
            "ajax": {
                url: "<?php echo site_url("Admin_appointment_reqs/datatable") ?>",
                type: 'POST'
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [4],
                    render: function(data, type, row) {
                        if (data == 'Confirmed') {
                            return '<span class="badge bg-success">Confirmed</span>';
                        } else if (data == 'Cancelled') {
                            return '<span class="badge bg-danger">Cancelled</span>';
                        }
                        else {
                            return '<span class="badge bg-warning">Pending</span>';
                        }
                    },
                    "targets": [4],
                    "className": "text-center"
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