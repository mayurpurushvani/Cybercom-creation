<div class="section__content section__content--p30">
<div class="container-fluid">
<h3 class='title-5 m-b-35'>Shipment</h3>
<a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Shipment', [], true) ?>').resetParams().load(); " class="btn btn-outline-primary btn-sm">Add Shipment</a>
       
<div class="table-responsive table-responsive-data2">
    <div class="row">
        <table class="table table-striped table-data2 ">
            <thead id="tableHeading">
                <tr>
                    <th>Method Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $shipment = $this->getShipments();
                    if (!$this->getShipments()) {
                        echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                        echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                    } else {
                        foreach ($shipment->data as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value->methodId . '</td>';
                            echo '<td>' . $value->name . '</td>';
                            echo '<td>' . $value->code . '</td>';
                            echo '<td>' . $value->amount . '</td>';
                            echo '<td>' . $value->description . '</td>';
                            echo '<td>' . $value->createdDate . '</td>';
                            if ($value->status != 1) {
                    ?>
                                <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Shipment', ['editId' => $value->methodId, 'selectId'=>$value->status]) ?>').resetParams().load(); " title="Active" id="activeBtn" class="btn btn-success btn-sm">Active</a></td>
                                <?php } else { ?>
                                    <td><a onclick = "object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Shipment', ['editId' => $value->methodId, 'selectId'=>$value->status]) ?>').resetParams().load(); " title="In active" id="inactiveBtn" class="btn btn-danger btn-sm">Inactive</a> </td>
                                <?php } ?>

                                <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Shipment', ['editId' => $value->methodId]) ?>').resetParams().load(); " class="btn btn-success btn-sm">Edit</a>&nbsp
                                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Shipment', ['deleteId' => $value->methodId]) ?>').resetParams().load(); " class="btn btn-danger btn-sm">Delete</a>
                                </td>


                    <?php
                            echo '</tr>';
                        }
                    }

                    ?>
            </tbody>
        </table>
    </div>
</div>