<div class="section__content section__content--p30">
    <div class="container-fluid">
        <h3 class='title-5 m-b-35'>Customer Group</h3>
        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin\CustomerGroup', [], true) ?>').resetParams().load(); " class="btn btn-outline-primary btn-sm">Add customer Group</a>

        <div class="table-responsive table-responsive-data2">
            <div class="row">
                <table class="table table-striped table-data2 ">
                    <thead id="tableHeading">
                        <tr>
                            <th>customer Group Id</th>
                            <th>Name</th>
                            <th>Default</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $customers = $this->getCustomerGroups();
                            if (!$this->getCustomerGroups()) {
                                echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                                echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                            } else {
                                foreach ($customers->data as $key => $value) {
                                    echo '<tr>';
                                    echo '<td>' . $value->groupId . '</td>';
                                    echo '<td>' . $value->name . '</td>';
                                    echo '<td>' . $value->default . '</td>';
                                    echo '<td>' . $value->createdDate . '</td>';
                            ?>
                                    <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin\CustomerGroup', ['editId' => $value->groupId]) ?>').resetParams().load(); " class="btn btn-success btn-sm">Edit</a>&nbsp
                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Admin\CustomerGroup', ['deleteId' => $value->groupId]) ?>').resetParams().load(); " class="btn btn-danger btn-sm">Delete</a>
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