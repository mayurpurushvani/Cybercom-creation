<?php
$customerGroup = $this->getTableRow();

?>

<form method="post" id="customerGroupForm" action="<?php echo $this->getUrl()->getUrl('save', 'Admin\customerGroup'); ?>">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong><?php echo $this->getTitle(); ?></strong>
            </div>
            <div class="card-body card-block">
                <div class="form-row">
                    <div class="col">
                        <label class="form-control-label">customerGroup id:</label>
                        <input type="text" name="customerGroup[groupId]" disabled="disabled" value="<?php if ($customerGroup->groupId) {
                                                                                                        echo $customerGroup->groupId;
                                                                                                    } else {
                                                                                                        echo 'Auto';
                                                                                                    } ?>" class="form-control">
                    </div>
                    <div class="col"> <label class="form-control-label">Name:</label>
                        <input type="text" name="customerGroup[name]" value="<?php echo $customerGroup->name; ?>" class="form-control">
                    </div>
                </div>


                <div class="form-row">
                    <div class="col">
                        <label class="form-control-label">Status:</label>
                        <select name="customerGroup[status]" class="form-control">
                            <?php foreach ($customerGroup->getStatusOptions() as $key => $value) { ?>
                                <option value="<?php echo $key ?>" <?php if ($customerGroup->status == $key) { ?> selected <?php } ?>><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <button type="button" onclick="object.resetParams().setForm('#customerGroupForm').load();" name="update" class="btn btn-primary btn-lg">
                            <i class="fa fa-plus"></i>&nbsp; Save</button>
                    </div>
                </div>
            </div>
        </div>
</form>