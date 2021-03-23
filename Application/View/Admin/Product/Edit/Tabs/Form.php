<?php

$product = $this->getTableRow();
$options =$this->getBrandOptions();

?>
<form method="post" id="productForm" action="<?php echo $this->getUrl()->getUrl('save', 'Admin\Product'); ?>">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header" id="heading">
                <strong><?php echo $this->getTitle(); ?></strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Product id:</label>
                    <input type="text" name="product[productId]" disabled="disabled" value="<?php if ($product->productId) {
                                                                                                echo $product->productId;
                                                                                            } else {
                                                                                                echo 'Auto';
                                                                                            } ?>" class="form-control">
                </div>
            </div>

            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Brand:</label>
                    <select name="product[brandId]" class="form-control">
                        <option value="0">select</option>
                        <?php foreach ($options as $brandId => $name) : ?>
                            <option value="<?php echo $brandId; ?>" <?php if ($product->brandId == $brandId) : ?> selected <?php endif ?>>
                                <?php echo $name; ?></option>
                        <?php endforeach ?>
                    </select>

                </div>
            </div>

            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">SKU:</label>
                    <input type="text" name="product[sku]" value="<?php echo $product->sku ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Name:</label>
                    <input type="text" name="product[name]" value="<?php echo $product->name ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Price:</label>
                    <input type="number" name="product[price]" value="<?php echo $product->price ?>" class="form-control">
                </div>
            </div>

            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Discount:</label>
                    <input type="number" name="product[discount]" value="<?php echo $product->discount ?>" class="form-control">
                </div>
            </div>

            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Quantity:</label>
                    <input type="number" name="product[quantity]" value="<?php echo $product->quantity ?>" class="form-control">
                </div>
            </div>

            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Description:</label>
                    <input type="text" name="product[description]" value="<?php echo $product->description ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">status:</label>
                    <select name="product[status]">
                        <?php foreach ($product->getStatusOptions() as $key => $value) { ?>
                            <option value="<?php echo $key ?>" <?php if ($product->status == $key) { ?> selected <?php } ?>><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="card-body card-block">
                <div class="form-group">
                    <button type="button" onclick="object.resetParams().setForm('#productForm').load();" name="update" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-plus"></i>&nbsp; Save</button>
                </div>
            </div>
        </div>
    </div>
</form>