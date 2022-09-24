<div class="container-fluid inventory-container">
    <div class="d-flex">
        <div><br>
            <h1 class="d-none d-sm-block inventory-label">Inventory</h3>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p"><button id="btn-add-patient" class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#modal-1" type="button"><i class="fas fa-plus-circle" style="font-size: 12px;"></i>   Add a Product</button>
            <div id="modal-1" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add a Product</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex d-sm-flex d-md-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center">
            <div id="input-search" class="input-group"><input class="form-control search-input" type="search" /><button class="btn btn-primary d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center btn-search" type="button"><i class="fas fa-search" style="font-size: 12px;"></i></button></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4">
                <div id="inventory-table" class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="inv-td">ID</th>
                                <th class="inv-td">Product Name</th>
                                <th class="inv-td">Description</th>
                                <th class="inv-td" style="text-align: center";>Stock In</th>
                                <th class="inv-td" style="text-align: center";>Stock Out</th>
                                <th class="inv-td text-center">Action</th>
                            </tr>  
                        </thead>
                        <tbody>
                                <?php 
                                for ($x = 1; $x <= 10; $x++) {
                                    echo "
                                    <tr>
                                    <td class='inv-td-desc'>NZ943</td>
                                    <td class='inv-td-desc'><strong>Neozep 10s</strong><br>500 mg</td>
                                    <td class='inv-td-desc'>contains Phenelephrine HCI, Chlorphenamine Maleate and Paracetamol Phenylephrine HCI a nasal..</td>
                                    <td class='inv-td-desc' style='text-align: center;'>56</td>
                                    <td class='inv-td-desc' style='text-align: center;'>83</td>
                                        <td class='text-center inv-td-desc justify-content-xxl-end align-items-xxl-center'>
                                            <button class='btn btn-light mx-2' type='button'>View</button>
                                            <button class='btn btn-light mx-2' type='button'>Edit</button>
                                            <a class='btn btn-link btn-sm btn-delete' href='<?= base_url('Admin_patientrec/delete_patient/') ?><i class='far fa-trash-alt'></i></a>
                                        </td>
                                    </tr>
                                    ";
                                }
                                ?>
                        </tbody>
                    </table>

                    <?= $this->pagination->create_links() ?>
                </div>
            </div>
        </div>
    </div>
</div>