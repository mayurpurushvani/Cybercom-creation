<?php $cartItems = $this->getCart()->getItems(); ?>
<?php $customers = $this->getCustomers(); ?>
<?php $cart = $this->getCart(); ?>

<div class="section__content section__content--p30">
    <div class="container-fluid">
       

    <h2 style="margin-bottom: 20px;">Manage Cart</h2>
        <button class="btn btn-primary btn-lg" style="margin-top: 20px;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin\Product', ['page' => 1], true); ?>').resetParams().load();">Back To Item</button>

        <form id="customerFormSelect" action="<?php echo $this->getUrl()->getUrl('selectCustomer', 'Admin\Cart', [], true); ?>" method="POST">

            <label for="customer" class="form-control-label">Select Customer</label>
            <select name="customer" class="form-control" style="width: 10%; margin-bottom: 10px;">
                <?php foreach ($customers->getData() as $customerId => $customer) : ?>
                    <option value="<?= $customer->customerId ?>" <?php if ($customer->customerId == $cart->customerId) : ?> selected <?php endif ?>><?= $customer->firstName ?></option>
                <?php endforeach ?>
            </select>
            <button type="button" class="btn btn-primary btn-lg" onclick="object.resetParams().setForm('#customerFormSelect').load();">Go</button>

        </form>

        <?php if ($cartItems) : ?>

            <form id="customerForm" action="<?php echo $this->getUrl()->getUrl('update', 'Admin\Cart'); ?>" method="POST">

                <button style="margin-top: 20px;" class="btn btn-success btn-lg" type="button" onclick="object.resetParams().setForm('#customerForm').load();">Update</button> <br>


                <div class="table-responsive table-responsive-data3">
                    <div class="row">
                        <table class="table table-striped table-data3 ">
                            <thead id="tableHeading">
                                <tr>
                                    <th>Item Id</th>
                                    <th>Product Id</th>
                                    <th>Quantity</th>
                                    <th>Price (₹)</th>
                                    <th>Row Total (₹)</th>
                                    <th>Total Discount (₹)</th>
                                    <th>Total Price (₹)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($cartItems) : ?>
                                    <?php foreach ($cartItems->getData() as $key => $item) : ?>
                                        <tr>

                                            <td><?php echo $item->cartItemId; ?></td>
                                            <td><?php echo $item->productId; ?></td>
                                            <td><input type="number" name="quantity[<?php echo $item->cartItemId ?>]" value="<?php echo $item->quantity; ?>" class="form-control"></td>
                                            <td><?php echo $item->price; ?></td>
                                            <td><?php echo $item->price * $item->quantity; ?></td>
                                            <td><?php echo $item->discount * $item->quantity; ?></td>
                                            <td><?php echo ($item->price * $item->quantity) - ($item->discount * $item->quantity); ?></td>

                                            <td>
                                                <button type="button" class="btn btn-danger btn-lg" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', null, ['deleteId' => $item->cartItemId]); ?>').resetParams().load();">Delete
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>
</div>
</form>

<input type="button" class="btn btn-success btn-lg" style="margin-top: 20px; float:right; margin-right: 40px;" name="Checkout" value="Processed to checkOut" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin\Checkout', ['id' => $customer->customerId]); ?>').resetParams().load();">
<?php else : ?>
    <strong>No Product Available!</strong>
<?php endif; ?>