<?php $collection = $this->getCollection();  ?>
<?php $actions = $this->getActions(); ?>
<?php $buttons = $this->getButtons(); ?>
<?php $columns = $this->getColumns(); ?>
<?php $status = $this->getStatus(); ?>
<?php $filters = $this->getFilter(); ?>


<div class="section__content section__content--p30">
    <div class="container-fluid">
        <h3 class='title-5 m-b-35'><?= $this->getTitle(); ?></h3>

        <?php if ($buttons) : ?>
            <?php foreach ($buttons as $key => $button) : ?>
                <?php if ($button['ajax']) : ?>
                    <a href="javascript:void(0)" onclick="<?= $this->getAddNewUrl($button['method']); ?>" class="<?= $button['class'] ?>"><?= $button['label'] ?></a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="clearFilter(); object.resetParams().setForm('#form').load();">Clear Filter</a>
                <?php else : ?>
                    <a href="<?= $this->getAddNewUrl($button['method']); ?>" class="<?= $button['class'] ?> "><?= $button['label'] ?></a>

                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <form method="post" id="form" action="<?php echo $this->getUrl()->getUrl('filter', 'Admin\Filter', null, false); ?>">

            <div class="table-responsive table-responsive-data2">
                <div class="row">
                    <table class="table table-striped table-data2">
                        <thead id="tableHeading">
                            <tr>
                                <?php if ($columns) : ?>
                                    <?php foreach ($columns as $key => $column) : ?>
                                        <th><?= $column['label'] ?>
                                            <input type='text' value="<?= $column['value'] ?>" class='form-control clear' name=<?= $column['name'] ?>>
                                        </th>
                                    <?php endforeach; ?>

                                    <?php if ($status) : ?>
                                        <th>Status</th>
                                    <?php endif; ?>

                                <?php endif; ?>
                                <?php if ($actions) : ?>
                                    <th>Action</th>
                                <?php endif; ?>

                                <?php if ($filters) : ?>
                                    <?php foreach ($filters as $key => $filter) : ?>
                                        <?php if ($filter['ajax']) : ?>
                                            <a href="javascript:void(0)" onclick="object.resetParams().setForm('#form').load();" class="<?= $filter['class'] ?> class" style="margin-top: 20px; margin-left: 10px;"><?= $filter['label'] ?></a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$collection) : ?>
                                <tr>
                                    <?php //echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>"; 
                                    ?>
                                    <?php echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>'; ?>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($collection->getdata() as $row) : ?>
                                    <tr>
                                        <?php if ($columns) : ?>
                                            <?php foreach ($columns as $key => $column) : ?>
                                                <td>
                                                    <?php if ($column['field'] == 'categoryName') : echo $this->getName($row); ?>
                                                        <?php else : echo $this->getFieldValue($row, $column['field']) ?><?php endif; ?>
                                                </td>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                        <?php if ($status) : ?>
                                            <?php if ($row->status != 1) : ?>
                                                <td><a href="javascript:void(0)" title="Inactive" onclick="<?= $this->getMethodUrl($row, $status[0]['method']); ?>" class="<?= $status[0]['class'] ?>"><?= $status[0]['label'] ?></a></td>
                                            <?php else : ?>
                                                <td><a href="javascript:void(0)" title="Active" onclick="<?= $this->getMethodUrl($row, $status[1]['method']); ?>" class="<?= $status[1]['class'] ?>"><?= $status[1]['label'] ?></a></td>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if ($actions) : ?>
                                            <td>
                                                <?php foreach ($actions as $key => $action) : ?>
                                                    <?php if ($action['ajax']) : ?>
                                                        <a href="javascript:void(0)" onclick="<?= $this->getMethodUrl($row, $action['method']); ?>" class="<?= $action['class'] ?>"><?= $action['label'] ?></a>
                                                    <?php else : ?>
                                                        <a href="<?= $this->getMethodUrl($row, $action['method']); ?>" class="<?= $action['label'] ?> "><?= $action['label'] ?></a>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>

<!--PAGER CLASS -->
<center>
    <div class="pagination">

        <?php if ($this->getPager()->getPrevious()) : ?>
            <a href="javascript:void(0);" onclick="object.resetParams().setUrl('<?php echo $this->getUrl()->getUrl(null, null, ['page' => $this->getPager()->getPrevious()]) ?>').load(); ">&laquo;</a>
        <?php endif; ?>


        <a href="#" class="active"> <?php echo $this->getPager()->getCurrentPage(); ?></a>


        <?php if ($this->getPager()->getNext()) : ?>
            <a href="javascript:void(0);" onclick="object.resetParams().setUrl('<?php echo $this->getUrl()->getUrl(null, null, ['page' => $this->getPager()->getNext()]) ?>').load(); ">&raquo;</a>
        <?php endif; ?>

    </div>
</center>
<!--PAGER CLASS OVER-->
<script>
    function clearFilter() {
        $(".clear").each(function() {
            $(this).val('')
        });
    }
</script>