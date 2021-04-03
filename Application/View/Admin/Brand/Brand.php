<div class="section__content section__content--p30">
    <div class="container-fluid">

        <?php $brand = $this->getBrand(); ?>
        <h3 class='title-5 m-b-35'>Manage Brand</h3>

        <button type="button" class="btn btn-outline-primary btn-sm" onclick="object.resetParams().setForm('#brandImage').load();" id="btn_delete">Remove</button>

        <form method="post" id="brandImage" action="<?php echo $this->getUrl()->getUrl('update', 'Admin\Brand'); ?>">

            <button style="margin-top: 20px;" type="button" onclick="object.resetParams().setForm('#brandImage').load();" name="btn_update" class="btn btn-outline-primary btn-sm">Update</button>

            <div class="table-responsive table-responsive-data2">
                <div class="row">
                    <table class="table table-striped table-data2 ">
                        <thead id="tableHeading">
                            <tr>
                                <th>Brand Id </th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>SortOrder</th>
                                <th>status</th>
                                <th>Created Date</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (!$this->getBrand()) {
                                echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                                echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                            } else {

                                foreach ($brand->data as $key => $value) :
                                    echo '<tr id="' . $value->brandId . '">'; ?>
                                    

                                    <td><label name="brandId"><?php echo $value->brandId; ?></label></td>

                                    <?php echo '<td><img src="' . $value->image . '" style="height:200px; width : 250px;"></img></td>'; ?>

                                    <td><input class="form-control" type="text" name="img[data][<?php echo $value->brandId; ?>][brandName]" value="<?php echo $value->brandName; ?>"></td>

                                    <td><input class="form-control" type="text" name="img[data][<?php echo $value->brandId; ?>][sortOrder]" value="<?php echo $value->sortOrder; ?>"></td>

                                    <?php if ($value->status != 1) : ?>
                                        <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Admin\Brand', ['editId' => $value->brandId, 'selectId' => $value->status]) ?>').resetParams().load(); " title="Active" id="activeBtn" style="color: white;" class="btn btn-success btn-sm">Active</a></td>
                                    <?php else : ?>
                                        <td><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Admin\Brand', ['editId' => $value->brandId, 'selectId' => $value->status]) ?>').resetParams().load(); " title="In active" id="inactiveBtn" style="color: white;" class="btn btn-danger btn-sm">Inactive</a> </td>
                                    <?php endif; ?>

                                    <td><?php echo $value->createdDate; ?></td>

                                    <td><input type='checkbox' name="remove" value="<?php echo $value->brandId; ?>"></td>


                                    </td>
                                    </tr>
                            <?php
                                endforeach;
                            }
                            ?>
        </form>
        </tbody>
        </table>

    </div>
</div>

<form method="post" id="imageUploadForm" action="<?php echo $this->getUrl()->getUrl('add', 'Admin\Brand'); ?>" enctype="multipart/form-data">

    <input type="file" style="margin-top: 50px;" name="image" id="file" required>

    <button type="button" id="btn_upload" class="btn btn-primary">Upload</button>

</form>



<script>
    $(document).ready(function() {

        $("#btn_upload").click(function() {
            object.setUrl('<?php echo $this->getUrl()->getUrl("add", "Admin\Brand"); ?>');
            var fd = new FormData();
            var files = $('#file')[0].files;

            // Check file selected or not
            if (files.length > 0) {
                fd.append('file', files[0]);

                $.ajax({
                    url: object.getUrl(),
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $.each(response.element, function(i, element) {
                            $(element.selector).html(element.html);
                        });
                    },
                });
            } else {
                alert("Please select a file.");
            }
        });
    });


    $(document).ready(function() {
        $('#btn_delete').click(function() {
            if (confirm("Are you sure you want to delete this?")) {
                var id = [];
                $(':checkbox:checked').each(function(i) {
                    id[i] = $(this).val();
                });
                if (id.length === 0) {
                    alert("Please Select atleast one checkbox");
                } else {
                    $.ajax({
                        url: 'http://localhost/cybercom-creation/Advance%20PHP%20&%20MVC/Application/index.php?c=Admin\\Brand&a=delete',
                        method: 'POST',
                        data: {
                            id: id
                        },
                        success: function() {
                            for (var i = 0; i < id.length; i++) {
                                $('tr#' + id[i] + '').css('background-color', '#ccc');
                                $('tr#' + id[i] + '').fadeOut('slow');
                            }
                        }
                    });
                }
            } else {
                return false;
            }
        });

    });
</script>