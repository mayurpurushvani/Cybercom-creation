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
        <label for="customer">Customer</label>
        <select name="customer">
            <option value="<?php echo $customers->customerId ?>"><?php echo $customers->firstName; ?></option>
        </select>
    </div>
    <h4>Billing Address Form</h4>
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
            <label class="small"><input type="checkbox" name="saveBillingAddress"> Save to Address book</label>

        </div>
    </div>


    <h4>Shipping Address Form</h4>

    <hr>
    <input type="checkbox" name="sameAsBilling">Same As Billing

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
            <label class="small"><input type="checkbox" name="saveShippingAddress"> Save to Address book</label>

        </div>
    </div>

    <h4>Payment Methods</h4>
    <?php foreach ($paymentMethods as $id => $paymentMethod) : ?>
        <div class="radio">
            <label class="small"><input type="radio" name="paymentMethod" value="<?php echo $paymentMethod->methodId ?>"><?= $paymentMethod->name ?></label>
        <?php endforeach; ?>

        <h4>Shipment Methods</h4>
        <?php foreach ($shipmentMethods as $id => $shipmentMethod) : ?>
            <div class="radio">
                <label class="small"><input type="radio" name="shipmentMethod" value="<?php echo $shipmentMethod->methodId ?>"><?= $shipmentMethod->name ?></label>
            <?php endforeach; ?>

            <h4>Order Details</h4>
            <table border="1">
                <tr>
                    <td>Product Id</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Discount</td>
                    <td>Total</td>
                </tr>
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
            </table>

            <input type="hidden" name="discount" value="<?= $discount; ?>">
            <input type="hidden" name="total" value="<?= $subtotal; ?>">
            <input type="hidden" name="shippingId" <?php if ($shippingAddress) : ?> value="<?php echo $shippingAddress->addressId;
                                                                                        endif ?>">
            <input type="hidden" name="billingId" <?php if ($billingAddress) : ?> value="<?php echo $billingAddress->addressId;
                                                                                        endif ?>">
            <button class="btn btn-success" type="button" style="margin-top: 20px;" onclick="object.resetParams().setForm('#form').load(); ">Place Order</button>
</form>