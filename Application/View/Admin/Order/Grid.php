<center><strong>Your order is placed successfully!!</strong></center>
<?php

$customer = $this->getCustomer();
$customerName = $customer->firstName;

$orderItemDetails = $this->getOrderItemDetails();
$orderDetails = $this->getOrderDetails();

?>
<div class="table-responsive table-responsive-data2">
    <div class="row">
        <table class="table table-striped table-data2 ">
            <thead id="tableHeading">
                <tr>
                    <td colspan="3"><h2>Customer Name :  <?= $customerName ?></h2></td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price (₹)</th>
                    <th>Discount (₹)</th>
                    <th>Total Price (₹)</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($orderItemDetails) :
                    foreach ($orderItemDetails->getData() as $key => $orderItem) : ?>
                        <tr>
                            <td><?= $orderItem->name ?></td>
                            <td><?= $orderItem->quantity ?></td>
                            <td><?= $orderItem->price ?></td>
                            <td><?= $orderItem->discount ?></td>
                            <td><?= ($orderItem->price * $orderItem->quantity) - ($orderItem->quantity * $orderItem->discount) ?></td>
                        </tr>
                <?php endforeach;
                endif ?>
            </tbody>
        </table>
    </div>
</div>

<div class="table-responsive table-responsive-data2">
    <div class="row">
        <table class="table table-striped table-data2 ">
            <thead id="tableHeading">
                <tr>
                    <th>Shipment Method</th>
                    <th>Amount Payable</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $orderDetails->name; ?>
                    <td><?= $orderDetails->price ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>