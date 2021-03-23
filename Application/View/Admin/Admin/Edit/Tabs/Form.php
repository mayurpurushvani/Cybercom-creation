<?php
$admin = $this->getTableRow();
?>
<form method="post" id="adminForm" action="<?php echo $this->getUrl()->getUrl('save', 'Admin\Admin' ,null, false); ?>">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
            <strong><?php echo $this->getTitle(); ?></strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Admin id:</label>
                    <input type="text" name="admin[adminId]" value="<?php if($admin->adminId) {echo $admin->adminId;} else { echo 'Auto';} ?>" disabled="disabled" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">User Name:</label>
                    <input type="text" name="admin[userName]" value="<?php echo $admin->userName; ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Password:</label>
                    <input type="password" id="password" name="admin[password]" value="<?php echo $admin->password; ?>" class="form-control">
                </div>
            </div>

            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Status:</label>
                    <select name="admin[status]">
                        <?php foreach ($admin->getStatusOptions() as $key => $value) { ?>
                            <option value="<?php echo $key ?>" <?php if ($admin->status == $key) { ?> selected <?php } ?>><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="card-body card-block">
                <div class="form-group">
                <button type="button" onclick="object.resetParams().setForm('#adminForm').load();" name="update" class="btn btn-outline-primary btn-sm">
                            <i class="fa fa-plus"></i>&nbsp; Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
if ($admin->adminId) {
    echo "<script>document.getElementById('password').disabled = true;</script>";
}
?>