<?php

$paymentMethods = $this->getPaymentMethods()->getData();
$shipmentMethods = $this->getShipmentMethods()->getData();
$cart = $this->getCart();
$customers = $cart->getCustomer();
$billingAddress = $this->getBillingAddress();
$shippingAddress = $this->getShippingAddress();
$orderDetails = $cart->getItems()->getData();

?>
<form method="POST" id="form" action="<?php echo $this->getUrl()->getUrl('save', 'Admin\Checkout'); ?>">

    <!-- <div class="form-group">
        <label for="customer">Customer</label>
        <strong><label for="customerName" name="customer" id="<?php echo $customers->customerId; ?>"><?php echo $customers->firstName; ?></label></strong>
    </div> -->

    <div class="form-group">
        <label for="customer" class="form-control-label">Customer</label>
        <select name="customer" class="form-control" style="width: 10%;">
            <option value="<?php echo $customers->customerId ?>"><?php echo $customers->firstName; ?></option>
        </select>
    </div>
    <h2>Billing Address Form</h2>
    <hr>
    <div class="font-weight-bold form-row">
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="billing[address]" id="address" placeholder="Address" <?php if ($billingAddress) : ?> value="<?= $billingAddress->address ?>" <?php endif; ?>>
        </div>
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="billing[city]" id="city" placeholder="City" <?php if ($billingAddress) : ?> value="<?= $billingAddress->city ?>" <?php endif; ?>>
        </div>
    </div>
    <div class="font-weight-bold form-row">

        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="billing[state]" id="state" placeholder="State" <?php if ($billingAddress) : ?> value="<?= $billingAddress->state ?>" <?php endif; ?>>
        </div>
        <div class="form-group col-md-3">
            <input type="number" class="form-control" name="billing[zipCode]" id="city" placeholder="Zipcode" <?php if ($billingAddress) : ?> value="<?= $billingAddress->zipCode ?>" <?php endif; ?>>
        </div>

    </div>
    <div class="font-weight-bold form-row">

        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="billing[country]" id="country" placeholder="Country" <?php if ($billingAddress) : ?> value="<?= $billingAddress->country ?>" <?php endif; ?>>
        </div>

        <div class="checkbox">
            <input type="checkbox" style="height: 20px; width: 20px;" name="saveBillingAddress">
            <label style="font-size:22px ;">Save to Address book</label>
        </div>

    </div>


    <h2>Shipping Address Form</h2>

    <hr>
    <div class="checkbox">
        <input type="checkbox" style="height: 20px; width: 20px;" name="sameAsBilling">
        <label style="font-size:22px ;">Same As Billing</label>
    </div>
    <div class="font-weight-bold form-row">
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="shipping[address]" id="address" placeholder="Address" <?php if ($shippingAddress) : ?> value="<?= $shippingAddress->address ?>" <?php endif; ?>>
        </div>
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="shipping[city]" id="city" placeholder="City" <?php if ($shippingAddress) : ?> value="<?= $shippingAddress->city ?>" <?php endif ?>>
        </div>
    </div>
    <div class="font-weight-bold form-row">

        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="shipping[state]" id="state" placeholder="State" <?php if ($shippingAddress) : ?> value="<?= $shippingAddress->state ?>" <?php endif; ?>>
        </div>
        <div class="form-group col-md-3">
            <input type="number" class="form-control" name="shipping[zipCode]" id="city" placeholder="Zipcode" <?php if ($shippingAddress) : ?> value="<?= $shippingAddress->zipCode ?>" <?php endif; ?>>
        </div>

    </div>
    <div class="font-weight-bold form-row">

        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="shipping[country]" id="country" placeholder="Country" <?php if ($shippingAddress) : ?> value="<?= $shippingAddress->country ?>" <?php endif; ?>>
        </div>
        <div class="checkbox">
            <input type="checkbox" style="height: 20px; width: 20px;" name="saveShippingAddress">
            <label style="font-size:22px ;"> Save to Address book</label>
        </div>
    </div>

    <h2>Payment Methods</h2>
    <?php foreach ($paymentMethods as $id => $paymentMethod) : ?>
        <div class="radio">
            <input type="radio" style="height: 20px; width: 20px;" name="paymentMethod" value="<?php echo $paymentMethod->methodId ?>">
            <label style="font-size:22px ;"><?= $paymentMethod->name ?></label>
        <?php endforeach; ?>
        </div>
        <h2>Shipment Methods</h2>
        <?php foreach ($shipmentMethods as $id => $shipmentMethod) : ?>
            <div class="radio">
                <input type="radio" style="height: 20px; width: 20px;" name="shipmentMethod" value="<?php echo $shipmentMethod->methodId ?>">
                <label style="font-size:22px ;"><?= $shipmentMethod->name ?></label>

            <?php endforeach; ?>

            <h2>Order Details</h2>
            <div class="table-responsive table-responsive-data3">
                <div class="row">
                    <table class="table table-striped table-data3 ">
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Price (₹)</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Total (₹)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $subtotal = 0;
                            $discount = 0; ?>
                            <?php foreach ($orderDetails as $id => $product) : ?>
                                <tr>
                                    <?php $subtotal += ($product->price * $product->quantity) - ($product->quantity * $product->discount);
                                    $discount += $product->quantity * $product->discount; ?>
                                    <input type="hidden" name="cartId" value="<?php echo $product->cartId; ?>">
                                    <td><?= $product->productId; ?></td>
                                    <td><?= $product->price; ?></td>
                                    <td><?= $product->quantity; ?></td>
                                    <td><?= $product->quantity * $product->discount; ?></td>
                                    <td><?= ($product->price * $product->quantity) - ($product->quantity * $product->discount) ?></td>

                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4">Sub Total</td>
                                <td><?= $subtotal ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <input type="hidden" name="discount" value="<?= $discount; ?>">
            <input type="hidden" name="total" value="<?= $subtotal; ?>">
            <input type="hidden" name="shippingId" <?php if ($shippingAddress) : ?> value="<?php echo $shippingAddress->addressId;
                                                                                        endif ?>">
            <input type="hidden" name="billingId" <?php if ($billingAddress) : ?> value="<?php echo $billingAddress->addressId;
                                                                                        endif ?>">
            <button class="btn btn-success btn-lg" type="button" style="margin-top: 20px;" onclick="object.resetParams().setForm('#form').load(); ">Place Order</button>
</form>