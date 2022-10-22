<style>
    body {
        overflow-y: scroll;
    }
</style>
<div class="container-fluid inventory-container">
    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-sm-inline-block patientrec-label">Inventory</h3>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p">
            <button id="btn-add-product" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product-modal" type="button">
                <i class="icon ion-android-add-circle ms-1"></i>
                <span class="d-none d-xl-inline-block">Add a Product</span>
            </button>
            <?= form_open_multipart('Admin_inventory/add_product_validation'); ?>
            <div id="product-modal" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal" >Close</button><button class="btn btn-primary btn-modal"  type="submit" name="addProduct" style="background: #3269bf;">Save</button></div>
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
                    <?php if ($this->session->flashdata('message') == 'success') : ?>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <div class="alert alert-success alert-dismissible mt-3 mx-5 mb-3 w-50" role="alert">
                                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span>
                                        <strong>Success!</strong> You successfully added a new product.</span>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($this->session->flashdata('message') == 'dlt_success') : ?>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <div class="alert alert-success alert-dismissible mt-3 mx-5 mb-3 w-50" role="alert">
                                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span>
                                        <strong>Success!</strong> You successfully deleted a product.</span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <table id="inventory-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="inv-td">ID</th>
                                <th class="inv-td">Product Name</th>
                                <th class="inv-td">Description</th>
                                <th class="inv-td" style="text-align: center;">Quantity</th>
                                <th class="inv-td" style="text-align: center;">Stock In</th>
                                <th class="inv-td" style="text-align: center;">Stock Out</th>
                                <th class="inv-td text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <div id="delete-dialog-<?= $product->item_id ?>" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete a Product</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this product?</p>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-danger" href="<?= base_url('Admin_inventory/delete_product/') . $product->item_id ?>" type="button">Confirm</a></div>
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
                                                        <input class="form-control item_id" type="text" id="item_id" name="item_id" value="<?= $product->item_id ?>" disabled />
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
                                                        <input class="form-control prod_dosage" type="text" id="prod_dosage" name="prod_dosage" value="<?= $product->prod_dosage ?>" disabled />
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
                                                        <input class="form-control quantity" type="text" id="quantity" name="quantity" value="<?= ($product->stock_in)+($product->stock_out) ?>" disabled />
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
                                            <div class="col-3"><label class="col-form-label">Product Description:</label></div>
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
                                        <div class="modal-footer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>

                        <!-- Edit product modal -->
                        <?= form_open_multipart('Admin_inventory/update_product'); ?>
                        <div id="product-edit-modal-<?= $product->item_id  ?>" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
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
                                            <div class="col-3"><label class="col-form-label">Product ID: <?= $product->item_id ?></label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- full_name -->
                                                        <input class="form-control item_id" type="text" id="item_id" name="item_id" value="<?= $product->item_id ?>" disabled />
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
                                                        <input class="form-control prod_name" type="text" id="prod_name" name="prod_name" value="<?= $product->prod_name ?>" />
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
                                                        <input class="form-control prod_dosage" type="text" id="prod_dosage" name="prod_dosage" value="<?= $product->prod_dosage ?>" />
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
                                                        <input class="form-control quantity" type="text" id="quantity" name="quantity" value="<?= ($product->stock_in)+($product->stock_out) ?>" disabled />
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
                                                        <input class="form-control stock_in" type="text" id="stock_in" name="stock_in" value="<?= $product->stock_in ?>" />
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
                                                        <input class="form-control stock_out" type="text" id="stock_out" name="stock_out" value="<?= $product->stock_out ?>" />
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
                                                        <textarea class="form-control prod_desc" type="text" id="prod_desc" rows="4" name="prod_desc"><?= $product->prod_desc ?></textarea>
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
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>