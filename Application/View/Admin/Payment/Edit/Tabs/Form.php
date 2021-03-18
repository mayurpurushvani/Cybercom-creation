<?php
$payment = $this->getTableRow();
?>
<form method="post" id="paymentForm" action="<?php echo $this->getUrl()->getUrl('save', 'Payment'); ?>">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
            <strong><?php echo $this->getTitle(); ?></strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">payment id:</label>
                    <input type="text" name="payment[paymentId]" disabled="disabled" value="<?php if($payment->methodId) {echo $payment->methodId;} else { echo 'Auto';} ?>" class="form-control">

                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Name:</label>
                    <input type="text" name="payment[name]" class="form-control" value="<?php echo $payment->name ?>">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Code:</label>
                    <input type="text" name="payment[code]" class="form-control" value="<?php echo $payment->code ?>">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Description:</label>
                    <input type="text" name="payment[description]" class="form-control" value="<?php echo $payment->description ?>">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Status:</label>
                    <select name="payment[status]">
                        <?php foreach ($payment->getStatusOptions() as $key => $value) { ?>
                            <option value="<?php echo $key ?>" <?php if ($payment->status == $key) { ?> selected <?php } ?>><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                <button type="button" onclick="object.resetParams().setForm('#paymentForm').load();" name="update" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-plus"></i>&nbsp; Save</button>
                </div>
            </div>
        </div>
    </div>
</form>