<?php

$customer = $this->getTableRow();

$customerGroup = $this->getGroupOptions();

?>

<form method="post" id="customerForm" action="<?php echo $this->getUrl()->getUrl('save', 'Admin\Customer'); ?>">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong><?php echo $this->getTitle(); ?></strong>
            </div>
            <div class="card-body card-block">
                <div class="form-row">
                    <div class="col">
                        <label class="form-control-label">Customer id:</label>
                        <input type="text" name="customer[customerId]" disabled="disabled" value="<?php if ($customer->customerId) {
                                                                                                        echo $customer->customerId;
                                                                                                    } else {
                                                                                                        echo 'Auto';
                                                                                                    } ?>" class="form-control">
                    </div>
                    <div class="col"> <label class="form-control-label">Customer group:</label>
                        <select name="customer[groupId]" class="form-control">
                            <option value=0>select</option>
                            <?php if ($customerGroup) : ?>
                                <?php foreach ($customerGroup as $groupId => $name) : ?>
                                    <option value="<?php echo $groupId; ?>" selected><?php echo $name; ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                </div>



                <div class="form-row">
                    <div class="col">
                        <label class="form-control-label">First Name:</label>
                        <input type="text" name="customer[firstName]" value="<?php echo $customer->firstName; ?>" class="form-control">
                    </div>
                    <div class="col"> <label class="form-control-label">Last Name:</label>
                        <input type="text" name="customer[lastName]" value="<?php echo $customer->lastName; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label class="form-control-label">Email:</label>
                        <input type="email" name="customer[email]" value="<?php echo $customer->email; ?>" class="form-control">
                    </div>
                    <div class="col"> <label class="form-control-label">Mobile:</label>
                        <input type="tel" name="customer[mobile]" value="<?php echo $customer->mobile; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label class="form-control-label">Password:</label>
                        <input id="password" type="password" name="customer[password]" value="<?php echo $customer->password; ?>" class="form-control">
                    </div>
                    <div class="col"> <label class="form-control-label">Status:</label>
                        <select name="customer[status]" class="form-control">
                            <?php foreach ($customer->getStatusOptions() as $key => $value) { ?>
                                <option value="<?php echo $key ?>" <?php if ($customer->status == $key) { ?> selected <?php } ?>><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="card-body card-block">
                    <div class="form-group">
                        <button type="button" onclick="object.resetParams().setForm('#customerForm').load();" name="update" class="btn btn-primary btn-lg">
                            <i class="fa fa-plus"></i>&nbsp; Save</button>
                    </div>
                </div>
            </div>
        </div>
</form>
<?php
if ($customer->customerId) {
    echo "<script>document.getElementById('password').disabled = true;</script>";
}
?>