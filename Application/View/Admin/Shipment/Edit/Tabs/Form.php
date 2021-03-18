<?php
$shipment = $this->getTableRow();
?>
<form method="post" id="shipmentForm" action="<?php echo $this->getUrl()->getUrl('save', 'Shipment'); ?>">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
            <strong><?php echo $this->getTitle(); ?></strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Method id:</label>
                    <input type="text" name="shipment[methodId]" disabled="disabled" value="<?php if($shipment->methodId) {echo $shipment->methodId;} else { echo 'Auto';} ?>" class="form-control">

                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Name:</label>
                    <input type="text" name="shipment[name]" value="<?php echo $shipment->name ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Code:</label>
                    <input type="text" name="shipment[code]" value="<?php echo $shipment->code ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Amount:</label>
                    <input type="text" name="shipment[amount]" value="<?php echo $shipment->amount ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Description:</label>
                    <input type="text" name="shipment[description]" value="<?php echo $shipment->description ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Status:</label>
                    <select name="shipment[status]">
                        <?php foreach ($shipment->getStatusOptions() as $key => $value) { ?>
                            <option value="<?php echo $key ?>" <?php if ($shipment->status == $key) { ?> selected <?php } ?>><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                <button type="button" onclick="object.resetParams().setForm('#shipmentForm').load();" name="update" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-plus"></i>&nbsp; Save</button>
                </div>
            </div>
        </div>
    </div>
</form>