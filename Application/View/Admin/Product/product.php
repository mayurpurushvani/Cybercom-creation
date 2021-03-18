<div class="section__content section__content--p30">
    <div class="container-fluid">
        <h3 class='title-5 m-b-35'>Product</h3>

        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Product', [], true) ?>').resetParams().load(); " class="btn btn-outline-primary btn-sm">Add Product</a>
        
        <div class="table-responsive table-responsive-data2">
            <div class="row">
                <table class="table table-striped table-data2 ">
                    <thead id="tableHeading">
                        <tr>
                            <th>product Id</th>
                            <th>sku</th>
                            <th>name</th>
                            <th>price</th>
                            <th>discount</th>
                            <th>quantity</th>
                            <th>description</th>
                            <th>createdDate</th>
                            <th>updatedDate</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $product = $this->getProducts();
                        if (!$this->getproducts()) {
                            echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                            echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                        } else {
                            foreach ($product->data as $key => $value) {
                                echo '<tr>';
                                echo '<td>' . $value->productId . '</td>';
                                echo '<td>' . $value->sku . '</td>';
                                echo '<td>' . $value->name . '</td>';
                                echo '<td>' . $value->price . '</td>';
                                echo '<td>' . $value->discount . '</td>';
                                echo '<td>' . $value->quantity . '</td>';
                                echo '<td>' . $value->description . '</td>';
                                echo '<td>' . $value->createdDate . '</td>';
                                echo '<td>' . $value->updatedDate . '</td>';
                                if ($value->status != 1) {
                        ?>
                                    <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Product', ['editId' => $value->productId, 'selectId'=>$value->status]) ?>').resetParams().load(); " title="Active" id="activeBtn" class="btn btn-success btn-sm">Active</a></td>
                                <?php } else { ?>
                                    <td><a onclick = "object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Product', ['editId' => $value->productId, 'selectId'=>$value->status]) ?>').resetParams().load(); " title="In active" id="inactiveBtn" class="btn btn-danger btn-sm">Inactive</a> </td>
                                <?php } ?>

                                <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Product', ['editId' => $value->productId]) ?>').resetParams().load(); " class="btn btn-success btn-sm">Edit</a>&nbsp
                                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Product', ['deleteId' => $value->productId]) ?>').resetParams().load(); " class="btn btn-danger btn-sm">Delete</a>
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