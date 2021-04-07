<?php

$customerGroups = $this->getCustomerGroup();

?>
<form method="post" id="groupPriceForm" action="<?php echo $this->getUrl()->getUrl('groupPrice', 'Admin\Product\GroupPrice'); ?>">

    <div class="section__content section__content--p30">
        <div class="container-fluid">
        

        <h2 style="margin-bottom: 20px;">Group Price</h2>

            <button type="button" style="margin-bottom: 20px;" onclick="object.resetParams().setForm('#groupPriceForm').load();" name="btn_update" class="btn btn-primary btn-lg">Update</button>

            <div class="table-responsive table-responsive-data3">
                <div class="row">
                    <table class="table table-striped table-data3 ">
                        <thead id="tableHeading">
                            <tr>
                                <th>Group Id</th>
                                <th>Group Name</th>
                                <th>price</th>
                                <th>Group Price</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            if (!$this->getCustomerGroup()) {
                                echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                                echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                            } else {
                                foreach ($customerGroups->getData() as $key => $value) {
                                    echo '<tr>';
                                    $rowStatus = ($value->entityId) ? 'exists' : 'new';
                                    echo '<td>' . $value->groupId . '</td>';
                                    echo '<td>' . $value->name . '</td>';
                                    echo '<td>' . $value->price . '</td>';
                            ?>
                                    <td><input type="text" class="form-control" name="groupPrice[<?php echo $rowStatus; ?>][<?php echo $value->groupId; ?>]" value="<?php echo $value->groupPrice; ?>"></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

</form>
</tbody>

</table>
</div>
</div>