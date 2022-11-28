<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>

<script>
    const toastTrigger = document.getElementById('liveToastTrigger')
    const toastLiveExample = document.getElementById('liveToast')

    var succToast = "<?= $this->session->flashdata('message') ?>";
    var editFailed = "<?= $this->session->flashdata('edit_failed') ?>";
    const modal_no = "user-edit-modal-" + editFailed;
    console.log(modal_no);

    if (toastTrigger) {
        if (succToast || editFailed) {


            if (succToast == 'add_failed') {
                $(document).ready(function() {
                    $("#modal-1").modal('show');
                });
            }
            if (editFailed) {
                $(document).ready(function() {
                    $("#" + modal_no).modal('show');
                });
            }

            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()

        }
    }
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#useracc-table').DataTable({
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            responsive: true,
            "ajax": {
                url: "<?php echo site_url("Admin_useracc/datatable") ?>",
                type: 'POST'
            },
            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [6], //first column / numbering column
                    "orderable": false, //set not orderable
                    "className": "text-center",
                    "targets": [6]
                },
                {
                    "targets": [0, 1, 2, 3, 4, 5, 6],
                    "className": "align-middle"
                },
            ]
        });

    });
</script>
<script src="<?= base_url('/assets/js/validations/user_add.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>


</body>

</html>