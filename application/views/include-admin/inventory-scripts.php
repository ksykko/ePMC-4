<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>


<script>
    const toastTrigger = document.getElementById('liveToastTrigger')
    const toastLiveExample = document.getElementById('liveToast')

    var succToast = "<?= $this->session->flashdata('message') ?>";
    var editFailed = "<?= $this->session->flashdata('edit_failed') ?>";
    const modal_no = "product-edit-modal-" + editFailed;
    console.log(modal_no);

    if (toastTrigger) {
        if (succToast || editFailed) {
            
           
            if (succToast == 'add_failed') {
                $(document).ready(function() {
                    $("#product-modal").modal('show');
                });
            }
            if (editFailed) {
                $(document).ready(function() {
                    $("#"+modal_no).modal('show');
                });
            }

            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()

        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#inventory-table').DataTable({
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            responsive: true,
            "ajax": {
                url: "<?php echo site_url("Admin_inventory/datatable") ?>",
                type: 'POST'
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [6],
                    "className": "align-middle",
                    "orderable": false
                }, //set not orderable
                {
                    "className": "inv-td-desc",
                    targets: [0, 1, 2, 3, 4, 5, 6]
                },
                {
                    "className": "w-25",
                    "targets": [2]
                },
                {
                    "className": "text-center",
                    targets: [3, 4, 5, 6]
                },
                {
                    "className": "justify-content-xxl-end align-items-xxl-center",
                    "targets": [6]
                },
                {
                    "targets": [2], // font size: 0.8rem
                    "render": function(data, type, row, meta) {
                        return data.replace(/<p>/g, '<p style="font-size: 5px">');
                    }
                },
                {
                    "targets": [4],
                    render: function(data, type, row) {
                        if (data <= 300) {
                            return '<span class="badge bg-danger align-align-middle" style="width:fit-content;">' + data + '</span><br><strong style="color: #dc3545;"><i class="typcn typcn-warning text-danger me-1"></i> Low on Stocks</strong>';
                        } else if (data <= 500) {
                            return '<span class="badge bg-warning align-middle" style="width:fit-content;">' + data + '</span>';
                        } else {
                            return '<span class="badge bg-success align-middle" style="width:fit-content;">' + data + '</span>';
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