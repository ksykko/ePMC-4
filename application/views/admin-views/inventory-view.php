<div class="container-fluid inventory-container">
    <div class="d-flex">
        <div><br>
            <h1 class="d-none d-sm-block inventory-label">Inventory</h3>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p">
            <button id="btn-add-product" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product-modal" type="button">
                <i class="icon ion-android-add-circle ms-1"></i>
                <span class="d-none d-xl-inline-block">Add a Product</span>
            </button>
            <?= form_open_multipart('Admin_inventory/add_product_validation'); ?>
            <div id="product-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3 fw-bolder">Add a Product</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body mx-5">
                            <h5 class="heading-modal fw-semibold">Product Information</h5>
                            <hr size="5" />
                            <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                            <div class="row mt-4 mb-2">
                                <div class="col"><label class="col-form-label">Product Name:</label></div>
                                <div class="col">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- full_name -->
                                            <input class="form-control" type="text" id="prod_name" name="prod_name" value="<?= set_value('prod_name'); ?>" />
                                        </div>
                                        <small class="text-danger"><?= form_error('prod_name') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col"><label class="col-form-label">Product Dosage:</label></div>
                                <div class="col">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="text" id="prod_dosage" name="prod_dosage" value="<?= set_value('prod_dosage'); ?>" />
                                        </div>
                                        <small class="text-danger"><?= form_error('prod_dosage') ?></small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col"><label class="col-form-label">Stock in:</label></div>
                                <div class="col-6 col-sm-6">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="text" id="stock_in" name="stock_in" value="<?= set_value('stock_in'); ?>" />
                                        </div>
                                        <small class="text-danger"><?= form_error('stock_in') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col"><label class="col-form-label">Stock out:</label></div>
                                <div class="col-6 col-sm-6">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="text" id="stock_out" name="stock_out" value="<?= set_value('stock_out'); ?>" />
                                        </div>
                                        <small class="text-danger"><?= form_error('stock_out') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col"><label class="col-form-label">Product Description:</label></div>
                                <div class="col-6 col-sm-6">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <textarea class="form-control" type="text" id="prod_desc" rows="1" name="prod_desc" value="<?= set_value('prod_desc'); ?>"></textarea>
                                        </div>
                                        <small class="text-danger"><?= form_error('prod_desc') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" type="submit" name="addProduct" style="background: #3269bf;">Save</button></div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
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
                                <th class="inv-td" style='text-align: center;'>Quantity</th>
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
                                    <td class='inv-td-desc' style='text-align: center;'><?= ($product->stock_in)+($product->stock_out) ?></td>
                                    <td class='inv-td-desc' style='text-align: center;'> <?= $product->stock_in ?> <br>
                                        <?php if ($product->stock_in <= 10) {
                                            echo "<i class='fas fa-exclamation-triangle critical-level'></i><strong id='critical-desc'>Low on Stocks</strong>";
                                        } 
                                        ?>    
                                    </td>
                                        <td class='inv-td-desc' style='text-align: center;'><?= $product->stock_out ?></td>
                                        <td class='text-center inv-td-desc justify-content-xxl-end align-items-xxl-center'>
                                            <button class='btn btn-light mx-2 product-view-modal-btn' data-bs-toggle="modal" data-bs-target="#product-view-modal" type='button' data-id="<?= $product->item_id ?>" data-prod_name="<?= $product->prod_name ?>" 
                                            data-prod_dosage="<?= $product->prod_dosage ?>" data-prod_desc="<?= $product->prod_desc ?>" data-quantity="<?= ($product->stock_in)+($product->stock_out) ?>" data-stock_in=" <?= $product->stock_in ?> "
                                            data-stock_out=" <?= $product->stock_out ?> " data-prod_name_title="<?= $product->prod_name ?>">View</button>
                                            
                                            <!-- Edit btn change all from view modal btn -->
                                            <button class='btn btn-light mx-2 product-edit-modal-btn' data-bs-toggle="modal" data-bs-target="#product-edit-modal" type='button' data-id="<?= $product->item_id ?>" data-prod_name="<?= $product->prod_name ?>" 
                                            data-prod_dosage="<?= $product->prod_dosage ?>" data-prod_desc="<?= $product->prod_desc ?>" data-quantity="<?= ($product->stock_in)+($product->stock_out) ?>" data-stock_in=" <?= $product->stock_in ?> "
                                            data-stock_out=" <?= $product->stock_out ?> " data-prod_name_title="<?= $product->prod_name ?>">Edit</button>

                                            <a class='btn btn-link btn-sm btn-delete' href="<?= base_url('Admin_inventory/delete_product/') . $product->item_id ?>"><i class='far fa-trash-alt'></i></a>
                                        </td>
                                </tr>
                            <?php endforeach; ?>    
                        </tbody>
                    </table>
                    <!-- View product modal -->
                    <?= form_open_multipart('Admin_inventory/view_product'); ?>
                        <div id="product-view-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title ms-3 fw-bolder" id="title-prod-name"></h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body mx-5">
                                        <h5 class="heading-modal fw-semibold">Product Information</h5>
                                        <hr size="5" />
                                        <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Product ID:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- full_name -->
                                                        <input class="form-control item_id" type="text" id="item_id" name="item_id" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4 mb-2">
                                            <div class="col-3"><label class="col-form-label">Product Name:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- full_name -->
                                                        <input class="form-control prod_name" type="text" id="prod_name" name="prod_name" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Product Dosage:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control prod_dosage" type="text" id="prod_dosage" name="prod_dosage" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Quantity:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control quantity" type="text" id="quantity" name="quantity" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Stock in:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control stock_in" type="text" id="stock_in" name="stock_in" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Stock out:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control stock_out" type="text" id="stock_out" name="stock_out" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Product Description:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <textarea class="form-control prod_desc" type="text" id="prod_desc" rows="4" name="prod_desc" disabled></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <div class="modal-footer"></div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    <?= form_close(); ?>

                    <!-- Edit product modal -->
                    <?= form_open_multipart('Admin_inventory/update_product'); ?>
                        <div id="product-edit-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title ms-3 fw-bolder" id="title-prod-name-edit"></h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body mx-5">
                                        <h5 class="heading-modal fw-semibold">Product Information</h5>
                                        <hr size="5" />
                                        <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Product ID:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- full_name -->
                                                        <input class="form-control item_id" type="text" id="item_id" name="item_id" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4 mb-2">
                                            <div class="col-3"><label class="col-form-label">Product Name:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- full_name -->
                                                        <input class="form-control prod_name" type="text" id="prod_name" name="prod_name" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('prod_name') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Product Dosage:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control prod_dosage" type="text" id="prod_dosage" name="prod_dosage" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('prod_dosage') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Quantity:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control quantity" type="text" id="quantity" name="quantity" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Stock in:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control stock_in" type="text" id="stock_in" name="stock_in" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('stock_in') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Stock out:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control stock_out" type="text" id="stock_out" name="stock_out" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('stock_out') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Product Description:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <textarea class="form-control prod_desc" type="text" id="prod_desc" rows="4" name="prod_desc" ></textarea>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('prod_desc') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <input type="hidden" name="item_id" class="item_id">
                                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" name="updateProduct" type="submit" style="background: #3269bf;">Save</button></div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    <?= form_close(); ?>

                    <?= $this->pagination->create_links() ?>
                </div>
            </div>
        </div>
    </div>
</div>