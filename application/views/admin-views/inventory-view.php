
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
                        <?= form_open_multipart('Admin_inventory/add_product_validation'); ?>
                        <div class="modal-body mx-5">
                            <h5 class="heading-modal fw-bold">Personal Information</h5>
                            <hr size="5" />
                            <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                                <div class="row mt-4 mb-2">
                                    <div class="col"><label class="col-form-label">Name:</label></div>
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- full_name -->
                                            <input class="form-control" type="text" id="full_name" name="full_name" value="<?= set_value('full_name'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Age:</label></div>
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="number" id="age" name="age" value="<?= set_value('age'); ?>" required min="1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Birth date:</label></div>
                                    <div class="col-6 col-sm-6">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="date" id="birthdate" name="birth_date" value="<?= set_value('birth_date'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Sex:</label></div>
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <select class="form-select" id="sex" name="sex" value="<?= set_value('sex'); ?>" required>
                                                <option value="select" selected>select...</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Occupation:</label></div>
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="text" id="occupation" name="occupation" value="<?= set_value('occupation'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Address:</label></div>
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="text" id="address" name="address" value="<?= set_value('address'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" type="button" style="background: #3269bf;" data-bs-target="#modal-2" data-bs-toggle="modal">Save</button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex d-sm-flex d-md-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center">
            <div id="input-search" class="input-group"><input class="form-control search-input" type="search" /><button class="btn btn-primary d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center btn-search h-100" type="button"><i class="fas fa-search" style="font-size: 12px;"></i></button></div>
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
                                    foreach ($products as $product) : ?>
                                        <tr>
                                            <td class='inv-td-desc'><?= $product->item_id ?></td>
                                            <td class='inv-td-desc'><strong><?= $product->prod_name ?></strong><br><?= $product->prod_dosage ?></td>
                                            <td class='inv-td-desc w-50'><?= $product->prod_desc ?></td>
                                            <td class='inv-td-desc' style='text-align: center;'> <?= $product->stock_in ?> <br>
                                                <?php if ($product->stock_in <= 15) {
                                                    echo "<i class='fas fa-exclamation-triangle critical-level'></i><strong id='critical-desc'>Low on Stocks</strong>";
                                                } 
                                                ?>    
                                            </td>
                                            <td class='inv-td-desc' style='text-align: center;'><?= $product->stock_out ?></td>
                                                <td class='text-center inv-td-desc justify-content-xxl-end align-items-xxl-center'>
                                                    <button class='btn btn-light mx-2' type='button'>View</button>
                                                    <button class='btn btn-light mx-2' type='button'>Edit</button>
                                                    <a class='btn btn-link btn-sm btn-delete' href="<?= base_url('Admin_inventory/delete_product/') . $product->item_id ?>"><i class='far fa-trash-alt'></i></a>
                                                </td>
                                        </tr>
        
                                <?php endforeach; ?>    
                        </tbody>
                    </table>

                    <?= $this->pagination->create_links() ?>
                </div>
            </div>
        </div>
    </div>
</div>