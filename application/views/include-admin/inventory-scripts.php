<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#inventory-table').DataTable({
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "ajax": {
                url: "<?php echo site_url("Admin_inventory/datatable") ?>",
                type: 'POST'
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                { "targets": [ 6 ], "orderable": false }, //set not orderable
                { "className": "inv-td-desc" , targets: [0,1,2,3,4,5,6] },
                { "className": "w-50", "targets": [2] },
                { "className": "text-center", targets: [3,4,5,6] },
                { "className": "justify-content-xxl-end align-items-xxl-center", "targets": [6] },
                { "targets": [4], 
                    render :function(data,type,row){
                        if (data <= 10) {
                            return '<span class="badge bg-danger">'+data+'</span>';
                        } else if (data <= 20) {
                            return '<span class="badge bg-warning">'+data+'</span>';
                        } else {
                            return '<span class="badge bg-success">'+data+'</span>';
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


</body>

</html>