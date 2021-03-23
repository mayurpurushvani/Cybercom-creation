<div class="section__content section__content--p30">
    <div class="container-fluid">
        <h3 class='title-5 m-b-35'>CMS Page</h3>

        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin\CMS', [], true) ?>').resetParams().load(); " class="btn btn-outline-primary btn-sm">Add CMS Page</a>


        <div class="table-responsive table-responsive-data2">
            <div class="row">
                <table class="table table-striped table-data2 ">
                    <thead id="tableHeading">
                        <tr>
                            <th>Page Id</th>
                            <th>Title</th>
                            <th>Identifier</th>
                            <th>Content</th>
                            <th>createdDate</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $cms = $this->getCMS();
                        if (!$this->getCMS()) {
                            echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                            echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                        } else {
                            foreach ($cms->data as $key => $value) {
                                echo '<tr>';
                                echo '<td>' . $value->pageId . '</td>';
                                echo '<td>' . $value->title . '</td>';
                                echo '<td>' . $value->identifier . '</td>';
                                echo '<td>' . $value->content . '</td>';
                                echo '<td>' . $value->createdDate . '</td>';
                                if ($value->status != 1) {
                        ?>
                                    <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Admin\CMS', ['editId' => $value->pageId, 'selectId' => $value->status]) ?>').resetParams().load(); " title="Active" id="activeBtn" class="btn btn-success btn-sm">Active</a></td>
                                <?php } else { ?>
                                    <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Admin\CMS', ['editId' => $value->pageId, 'selectId' => $value->status]) ?>').resetParams().load(); " title="In active" id="inactiveBtn" class="btn btn-danger btn-sm">Inactive</a> </td>
                                <?php } ?>

                                <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin\CMS', ['editId' => $value->pageId]) ?>').resetParams().load(); " class="btn btn-success btn-sm">Edit</a>&nbsp
                                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Admin\CMS', ['deleteId' => $value->pageId]) ?>').resetParams().load(); " class="btn btn-danger btn-sm">Delete</a>
                                </td>

                        <?php echo '</tr>';
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>