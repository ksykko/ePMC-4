<style>
    body {
        overflow-y: scroll;
    }
</style>
<div class="container-fluid inventory-container">
    <div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
        <?php if ($this->session->flashdata('message') == 'success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You successfully added a new product.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'dlt_success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You successfully deleted a product.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'edit_prod_success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You successfully updated the product.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'add_failed') : ?>
            <div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-error">
                    <strong class="me-auto">Error!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You have failed in adding a new product.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('edit_failed')) : ?>
            <div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-error">
                    <strong class="me-auto">Error!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You have failed in editing the product.</span>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-sm-inline-block patientrec-label">Inventory</h3>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p">
            <button id="btn-add-product" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#product-modal" type="button">
                <i class="icon ion-android-add-circle ms-xl-1"></i>
                <span class="d-none d-xl-inline-block">Add a Product</span>
            </button>
            <?= form_open_multipart('Admin_inventory/add_product_validation'); ?>
            <div id="product-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3 fw-bolder">Add a Product</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body mx-5">
                            <h5 class="heading-modal fw-semibold">Product Information</h5>
                            <hr size="5" />
                            <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                            <div class="row mt-4 mb-2">
                                <div class="col-3"><label class="col-form-label">Product Name:</label></div>
                                <div class="col-9">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- full_name -->
                                            <input class="form-control" type="text" id="prod_name" name="prod_name" value="<?= set_value('prod_name'); ?>" placeholder="Atorvastatin Calcium" />
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
                                            <?php if (form_error('prod_dosage')) : ?>
                                                <input class="form-control" type="text" id="prod_dosage" name="prod_dosage" value="" placeholder="40" /><span class="input-group-text" id="basic-addon2">mg</span>
                                            <?php else : ?>
                                                <input class="form-control" type="text" id="prod_dosage" name="prod_dosage" value="<?= set_value('prod_dosage'); ?>" placeholder="40" /><span class="input-group-text" id="basic-addon2">mg</span>
                                            <?php endif; ?>
                                        </div>
                                        <small class="text-danger"><?= form_error('prod_dosage') ?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-3"><label class="col-form-label">Stock in:</label></div>
                                <div class="col-9 col-sm-9">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <?php if (form_error('stock_in')) : ?>
                                                <input class="form-control" type="text" id="stock_in" name="stock_in" placeholder="0" />
                                            <?php else : ?>
                                                <input class="form-control" type="text" id="stock_in" name="stock_in" value="<?= set_value('stock_in'); ?>" placeholder="0" />
                                            <?php endif; ?>
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
                                            <?php if (form_error('stock_in')) : ?>
                                                <input class="form-control" type="text" id="stock_out" name="stock_out" placeholder="0" />
                                            <?php else : ?>
                                                <input class="form-control" type="text" id="stock_out" name="stock_out" value="<?= set_value('stock_out'); ?>" placeholder="0" />
                                            <?php endif; ?>
                                        </div>
                                        <small class="text-danger"><?= form_error('stock_out') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3"><label class="col-form-label">Generic Name:</label></div>
                                <div class="col-9 col-sm-9">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <textarea class="form-control" type="text" id="prod_desc" rows="1" name="prod_desc" value="<?= set_value('prod_desc'); ?>" placeholder="Lorem ipsum dolor sit amet..... "></textarea>
                                        </div>
                                    </div>
                                    <small class="text-danger"><?= form_error('prod_desc') ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-sm btn-primary btn-modal" type="submit" name="addProduct" style="background: #3269bf;">Save</button></div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4 p-5 pt-4 pb-5">
                <div>
                    <table id="inventory-table" class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="inv-td fw-bold">ID</th>
                                <th class="inv-td fw-bold">Brand Name</th>
                                <th class="inv-td fw-bold">Generic Name</th>
                                <th class="inv-td fw-bold" style="text-align: center;">Quantity</th>
                                <th class="inv-td fw-bold" style="text-align: center;">Stock In</th>
                                <th class="inv-td fw-bold" style="text-align: center;">Stock Out</th>
                                <th class="inv-td fw-bold text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <div id="delete-dialog-<?= $product->item_id ?>" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title modal-title ms-3 fw-bolder">Delete a Product</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this product?</p>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_inventory/delete_product/') . $product->item_id ?>" type="button">Confirm</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- View product modal -->
                    <?php foreach ($products as $product) : ?>
                        <?= form_open_multipart('Admin_inventory/view_product'); ?>
                        <div id="product-view-modal-<?= $product->item_id  ?>" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title ms-3 fw-bolder">View Product</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body mx-5">
                                        <h5 class="heading-modal fw-semibold">Product Information</h5>
                                        <hr size="5" />
                                        <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                                        <div class="row mt-4 mb-2">
                                            <div class="col-3"><label class="col-form-label">Product Name:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- full_name -->
                                                        <input class="form-control prod_name" type="text" id="prod_name" name="prod_name" value="<?= $product->prod_name ?>" disabled />
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
                                                        <input class="form-control prod_dosage" type="text" id="prod_dosage" name="prod_dosage" value="<?= $product->prod_dosage ?>" disabled /><span class="input-group-text" id="basic-addon2">mg</span>
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
                                                        <input class="form-control quantity" type="text" id="quantity" name="quantity" value="<?= ($product->stock_in) + ($product->stock_out) ?>" disabled />
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
                                                        <input class="form-control stock_in" type="text" id="stock_in" name="stock_in" value="<?= $product->stock_in ?>" disabled />
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
                                                        <input class="form-control stock_out" type="text" id="stock_out" name="stock_out" value="<?= $product->stock_out ?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Generic Name:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <textarea class="form-control prod_desc" type="text" id="prod_desc" rows="4" name="prod_desc" disabled><?= $product->prod_desc ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>
                                    </div>
                                    <div class="modal-footer"></div>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>

                        <!-- Edit product modal -->
                        <?php $updateProductInfoPath = 'Admin_inventory/update_product/' . $product->item_id; ?>
                        <?= form_open_multipart($updateProductInfoPath, array('id' => 'updateProduct')); ?>
                        <div id="product-edit-modal-<?= $product->item_id  ?>" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title ms-3 fw-bolder">Edit Product</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <input type="hidden" name="modal_no" value="<?= $product->item_id ?>">
                                    <div class="modal-body mx-5">
                                        <h5 class="heading-modal fw-semibold">Product Information</h5>
                                        <hr size="5" />
                                        <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                                        <div class="row mt-4 mb-2">
                                            <div class="col-3"><label class="col-form-label">Product Name:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- full_name -->
                                                        <input class="form-control prod_name" type="text" id="v_prod_name" name="v_prod_name" value="<?= $product->prod_name ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('v_prod_name') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Product Dosage:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control prod_dosage" type="text" id="v_prod_dosage" name="v_prod_dosage" value="<?= $product->prod_dosage ?>" /><span class="input-group-text" id="basic-addon2">mg</span>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('v_prod_dosage') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Quantity:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control quantity" type="text" id="quantity" name="quantity" value="<?= ($product->stock_in) + ($product->stock_out) ?>" disabled />
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
                                                        <input class="form-control stock_in" type="text" id="v_stock_in" name="v_stock_in" value="<?= $product->stock_in ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('v_stock_in') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Stock out:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control stock_out" type="text" id="v_stock_out" name="v_stock_out" value="<?= $product->stock_out ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('v_stock_out') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Generic Name:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <textarea class="form-control prod_desc" type="text" id="v_prod_desc" rows="4" name="v_prod_desc"><?= $product->prod_desc ?></textarea>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('v_prod_desc') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <input type="hidden" name="item_id" class="item_id">
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-sm btn-primary btn-modal" id="updateProduct" name="updateProduct" type="submit" style="background: #3269bf;">Save</button></div>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>