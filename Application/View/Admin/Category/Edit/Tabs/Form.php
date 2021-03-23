<?php

$category = $this->getTableRow();

$categoryOptions = $this->getCategoryOptions();

?>
<form method="post" id="categoryForm" action="<?php echo $this->getUrl()->getUrl('save', 'Admin\Category'); ?>">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="col-lg-6">
                    <strong><?php echo $this->getTitle(); ?></strong>
                </div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label class="form-control-label">Category id:</label>
                        <input type="text" name="category[categoryId]" value="<?php if ($category->categoryId) {
                                                                                    echo $category->categoryId;
                                                                                } else {
                                                                                    echo 'Auto';
                                                                                } ?>" disabled="disabled" class="form-control">
                    </div>
                </div>

                <div class="card-body card-block">
                    <div class="form-group">
                        <label class="form-control-label">Parent:</label>
                        <select name="category[parentId]" class="form-control">
                            <?php if ($categoryOptions) : ?>
                                <?php foreach ($categoryOptions as $categoryId => $name) : ?>
                                    <option value="<?php echo $categoryId; ?>" <?php if ($categoryId == $category->parentId) : ?> selected <?php endif; ?>><?php echo $name; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                    </div>
                </div>

                <div class="card-body card-block">
                    <div class="form-group">
                        <label class="form-control-label">Name:</label>
                        <input type="text" name="category[categoryName]" value="<?php echo $category->categoryName; ?>" class="form-control">
                    </div>
                </div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label class="form-control-label">Description:</label>
                        <input type="text" name="category[description]" value="<?php echo $category->description; ?>" class="form-control">
                    </div>
                </div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label class="form-control-label">Status:</label>
                        <select name="category[status]">
                            <?php foreach ($category->getStatusOptions() as $key => $value) { ?>
                                <option value="<?php echo $key ?>" <?php if ($category->status == $key) { ?> selected <?php } ?>><?php echo $value; ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>

                <div class="card-body card-block">
                    <div class="form-group">
                        <button type="button" onclick="object.resetParams().setForm('#categoryForm').load();" name="update" class="btn btn-outline-primary btn-sm">
                            <i class="fa fa-plus"></i>&nbsp; Save</button>
                    </div>
                </div>
            </div>
        </div>
</form>