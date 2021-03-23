<div class="section__content section__content--p30">
<div class="container-fluid">
<h3 class='title-5 m-b-35'>Payment</h3>
<a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin\Payment', [], true) ?>').resetParams().load(); " class="btn btn-outline-primary btn-sm">Add Payment</a>
       
<div class="table-responsive table-responsive-data2">
    <div class="row">
        <table class="table table-striped table-data2 ">
            <thead id='tableHeading'>
                <tr>
                    <th>Method Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $payments = $this->getPayments();
                    if (!$this->getPayments()) {
                        echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                        echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                    } else {
                        foreach ($payments->data as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value->methodId . '</td>';
                            echo '<td>' . $value->name . '</td>';
                            echo '<td>' . $value->code . '</td>';
                            echo '<td>' . $value->description . '</td>';
                            echo '<td>' . $value->createdDate . '</td>';
                            if ($value->status != 1) {
                                ?>
                                <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Admin\Payment', ['editId' => $value->methodId, 'selectId'=>$value->status]) ?>').resetParams().load(); " title="Active" id="activeBtn" class="btn btn-success btn-sm">Active</a></td>
                                <?php } else { ?>
                                    <td><a onclick = "object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Admin\Payment', ['editId' => $value->methodId, 'selectId'=>$value->status]) ?>').resetParams().load(); " title="In active" id="inactiveBtn" class="btn btn-danger btn-sm">Inactive</a> </td>
                                <?php } ?>

                                <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin\Payment', ['editId' => $value->methodId]) ?>').resetParams().load(); " class="btn btn-success btn-sm">Edit</a>&nbsp
                                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Admin\Payment', ['deleteId' => $value->methodId]) ?>').resetParams().load(); " class="btn btn-danger btn-sm">Delete</a>
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
