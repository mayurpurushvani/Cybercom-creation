<div class="section__content section__content--p30" id="categoryGrid">
    <div class="container-fluid">
        <h3 class='title-5 m-b-35'>Category</h3>
        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin\Category', [], true) ?>').resetParams().load(); " class="btn btn-outline-primary btn-sm">Add Category</a>
       

        <div class="table-responsive table-responsive-data2">
            <div class="row">
                <table class="table table-striped table-data2 ">
                    <thead id="tableHeading">
                        <tr>
                            <th>category Id</th>
                            <th>Name</th>
                            <th>description</th>
                            <!-- <th>Featured</th> -->
                            <th>Created Date</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $categories = $this->getCategories();
                        
                        if (!$this->getCategories()) {
                            echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                            echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                        } else {
                            foreach ($categories->data as $key => $value) {
                                echo '<tr>';
                                echo '<td>' . $value->categoryId . '</td>';
                                echo '<td>' . $this->getName($value). '</td>';
                                echo '<td>' . $value->description . '</td>';
                                // echo '<td>' . $value->featured . '</td>';
                                echo '<td>' . $value->createdDate . '</td>';
                                if ($value->status != 1) {
                        ?>
                                <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Admin\Category', ['editId' => $value->categoryId, 'selectId'=>$value->status]) ?>').resetParams().load(); " title="Active" id="activeBtn" class="btn btn-success btn-sm">Active</a></td>
                                <?php } else { ?>
                                    <td><a onclick = "object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Admin\Category', ['editId' => $value->categoryId, 'selectId'=>$value->status]) ?>').resetParams().load(); " title="In active" id="inactiveBtn" class="btn btn-danger btn-sm">Inactive</a> </td>
                                <?php } ?>

                                <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin\Category', ['editId' => $value->categoryId]) ?>').resetParams().load(); " class="btn btn-success btn-sm">Edit</a>&nbsp
                                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Admin\Category', ['deleteId' => $value->categoryId]) ?>').resetParams().load(); " class="btn btn-danger btn-sm">Delete</a>
                                </td>

                        <?php echo '</tr>';
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>