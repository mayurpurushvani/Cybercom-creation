<div class="section__content section__content--p30">
    <div class="container-fluid">
        <h3 class='title-5 m-b-35'>Attribute</h3>

        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Attribute', [], true) ?>').resetParams().load(); " class="btn btn-outline-primary btn-sm">Add Attribute</a>


        <div class="table-responsive table-responsive-data2">
            <div class="row">
                <table class="table table-striped table-data2 ">
                    <thead id="tableHeading">
                        <tr>
                            <th>Attribute Id</th>
                            <th>Entity Type Id</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Input Type</th>
                            <th>Backend Type</th>
                            <th>Sort Order</th>
                            <th>Backend Model</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $attributes = $this->getAttributes();
                        if (!$this->getAttributes()) {
                            echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                            echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                        } else {
                            
                            foreach ($attributes->getdata() as $key => $attribute) {
                                echo '<tr>';
                                echo '<td>' . $attribute->attributeId . '</td>';
                                echo '<td>' . $attribute->entityTypeId . '</td>';
                                echo '<td>' . $attribute->name . '</td>';
                                echo '<td>' . $attribute->code . '</td>';
                                echo '<td>' . $attribute->inputType . '</td>';
                                echo '<td>' . $attribute->backendType . '</td>';
                                echo '<td>' . $attribute->sortOrder . '</td>';
                                echo '<td>' . $attribute->backendModel . '</td>';

                        ?>
                                <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Attribute', ['editId' =>  $attribute->attributeId]) ?>').resetParams().load(); " class="btn btn-success btn-sm">Edit</a>&nbsp
                                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Attribute', ['deleteId' =>  $attribute->attributeId]) ?>').resetParams().load(); " class="btn btn-danger btn-sm">Delete</a>
                                </td>

                        <?php
                         echo '</tr>';
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>