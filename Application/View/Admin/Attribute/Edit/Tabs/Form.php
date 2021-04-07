<?php

$attribute = $this->getTableRow();

?>
<form method="post" id="attributeForm" action="<?php echo $this->getUrl()->getUrl('save', 'Admin\Attribute'); ?>">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong><?php echo $this->getTitle(); ?></strong>
            </div>
            <div class="card-body card-block">
                <div class="form-row">
                    <div class="col">
                        <label class="form-control-label">Attribute id:</label>
                        <input type="text" name="attribute[attributeId]" value="<?php if ($attribute->attributeId) {
                                                                                    echo $attribute->attributeId;
                                                                                } else {
                                                                                    echo 'Auto';
                                                                                } ?>" disabled="disabled" class="form-control">
                    </div>
                    <div class="col"><label class="form-control-label">EntityType Id:</label>
                        <select name="attribute[entityTypeId]" class="form-control">
                            <?php foreach ($attribute->getEntityTypeOption() as $key => $value) : ?>
                                <option value="<?php echo $key; ?>"> <?php echo $value; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col">
                        <label class="form-control-label">Name:</label>
                        <input type="text" name="attribute[name]" value="<?php echo $attribute->name; ?>" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-control-label">Code:</label>
                        <input type="text" name="attribute[code]" value="<?php echo $attribute->code; ?>" class="form-control">
                    </div>
                </div>



                <div class="form-row">
                    <div class="col">
                        <label class="form-control-label">Input Type:</label>
                        <select name="attribute[inputType]" class="form-control">
                            <?php foreach ($attribute->getInputTypeOption() as $key => $value) : ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col">
                        <label class="form-control-label">Backend Type:</label>
                        <select name="attribute[backendType]" class="form-control">
                            <?php foreach ($attribute->getBackendTypeOption() as $key => $value) : ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col">
                        <label class="form-control-label">Sort Order:</label>
                        <input type="text" name="attribute[sortOrder]" value="<?php echo $attribute->sortOrder; ?>" class="form-control">
                    </div>
                    <div class="col"></div>
                </div>

                <div class="card-body card-block">
                    <div class="form-group">
                        <button type="button" onclick="object.resetParams().setForm('#attributeForm').load();" name="update" class="btn btn-primary btn-lg">
                            <i class="fa fa-plus"></i>&nbsp; Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>