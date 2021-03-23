<?php

$attribute = $this->getAttribute();

?>

<div class="section__content section__content--p30">
    <div class="container-fluid">

        <form method="post" id="attributeOptionForm" action="<?php echo $this->getUrl()->getUrl('update', 'Admin\Attribute\Option'); ?>">

            <h3 class='title-5 m-b-35'>Attribute Option</h3>

            <button type="button" onclick="object.resetParams().setForm('#attributeOptionForm').load();" id="update" class="btn btn-outline-primary btn-sm" name="update" style="margin-bottom: 40px;">Update</button>
            <button type="button" class="btn btn-outline-primary btn-sm" name="addOption" style="margin-bottom: 40px;" onclick="addRow();">Add Option</button>

            <table id="existingOption">
                <tbody>
                    <?php if (!$attribute->getOptions()) : ?>
                        <strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>
                    <?php else :  ?>

                        <?php foreach ($attribute->getOptions()->getData() as $key => $option) : ?>
                            <tr>
                                <?php if ($option->optionId) : ?>
                                    <input type="hidden" name="option[<?php echo $key; ?>][optionId]" value="<?php echo $option->optionId; ?>">
                                <?php endif ?>

                                <td><input class="form-control" type="text" name="option[<?php echo $option->optionId; ?>][name]" value="<?php echo $option->name ?>"></td>
                                <td><input class="form-control" type="text" name="option[<?php echo $option->optionId; ?>][sortOrder]" value="<?php echo $option->sortOrder ?>"></td>
                                <td><button style="margin-left: 20px;" name="removeOption" type="button" class="btn btn-outline-primary btn-sm" onclick="removeOptions(this)">Remove Option</button></td>
                            </tr>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>


            </table>

        </form>
        <div style="display:none;">
            <table id="newOption">
                <tr>
                    <td><input class="form-control" type="text" name="new[]"></td>
                    <td><input class="form-control" type="text" name="new[]"></td>
                    <td><button style="margin-left: 20px;" type="submit" name="removeOption" class="btn btn-outline-primary btn-sm" onclick="removeOptions(this);">Remove Option</button></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>
    function removeOptions(button) {
        var objectTr = $(button).closest('tr');
        objectTr.remove();

    }

    function addRow() {

        var newOptionTable = document.getElementById('newOption');
        var existingOptionTable = document.getElementById('existingOption').children[0];
        existingOptionTable.prepend(newOptionTable.children[0].children[0].cloneNode(true));

    }
</script>