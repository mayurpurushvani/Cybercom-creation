<?php

$address = $this->getBillingAddress();

$shipping = $this->getShippingAddress();


?>

<form method="post" id="customerAddressForm" action="<?php echo $this->getUrl()->getUrl('save', 'Customer\CustomerAddress'); ?>">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong><?php echo $this->getTitle(); ?></strong>
            </div>
            <h4 style="color: gray; padding-left: 20px; padding-top: 40px;">Billing ADDRESS</h4>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Address id:</label>
                    <?php if ($address->addressId) { ?>
                        <input type="hidden" name="billing[addressId]" value=" <?php   if ($address) { echo $address->addressId; } ?>">
                    <?php } ?>
                    <input type="text" name="billing[addressId]" disabled="disabled" value="<?php if ($address) {
                                                                                                echo $address->addressId;
                                                                                            } else {
                                                                                                echo 'Auto';
                                                                                            } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Address:</label>
                    <input type="text" name="billing[address]" value="<?php if ($address) { echo $address->address; } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">City:</label>
                    <input type="text" name="billing[city]" value="<?php if ($address) { echo $address->city; } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">State:</label>
                    <input type="text" name="billing[state]" value="<?php if ($address) { echo $address->state; } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Zip Code:</label>
                    <input type="tel" name="billing[zipCode]" value="<?php  if ($address) { echo $address->zipCode; } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Country:</label>
                    <input type="text" name="billing[country]" value="<?php if ($address) { echo $address->country; } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Address Type:</label>
                    <input type="text" name="billing[addressType]" value="Billing" disabled="disabled" class="form-control">
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card">
      

            <!--SHIPING-->
            <h4 style="color: gray; padding-left: 20px; margin-top: 40px;">SHIPPING ADDRESS</h4>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Address id:</label>
                    <?php if ($shipping) { ?>
                        <input type="hidden" name="shipping[addressId]" value=" <?php  if ($shipping) { echo $shipping->addressId;  }?>">
                    <?php } ?>
                    <input type="text" name="shipping[addressId]" disabled="disabled" value="<?php if ($shipping) {
                                                                                                    echo $shipping->addressId;
                                                                                                } else {
                                                                                                    echo 'Auto';
                                                                                                } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Address:</label>
                    <input type="text" name="shipping[address]" value="<?php if ($shipping) {  echo $shipping->address; } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">City:</label>
                    <input type="text" name="shipping[city]" value="<?php if ($shipping) {  echo $shipping->city; } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">State:</label>
                    <input type="text" name="shipping[state]" value="<?php if ($shipping) {  echo $shipping->state; } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Zip Code:</label>
                    <input type="tel" name="shipping[zipCode]" value="<?php if ($shipping) {  echo $shipping->zipCode; } ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Country:</label>
                    <input type="text" name="shipping[country]" value="<?php if ($shipping) {  echo $shipping->country; } ?>" class="form-control">
                </div>
            </div>

            <!--Button-->

            <!-- <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Address Type:</label>
                    <select name="address[addressType]">
                        <?php //foreach ($address->getAddressTypeOptions() as $key => $value) { 
                        ?>
                            <option value="<?php //echo $key 
                                            ?>" <?php //if ($address->status == $key) { 
                                                                    ?> selected <?php// } ?>><?php// echo $value; ?></option>
                        <?php// } ?>
                    </select>
                </div>
            </div> -->
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Address Type:</label>
                    <input type="text" name="shipping[addressType]" value="Shipping" disabled="disabled" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <button type="button" onclick="object.resetParams().setForm('#customerAddressForm').load();" name="update" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-plus"></i>&nbsp; Save</button>
                </div>
            </div>
        </div>
    </div>
</form>