<div class="section__content section__content--p30">
    <div class="container-fluid">

        <?php $image = $this->getImage();
        if ($this->getTableRow()) {
            $categoryId = $this->getTableRow()->categoryId;
        }


        ?>
        <h3 class='title-5 m-b-35'>Manage Category Image</h3>

        <button type="button" class="btn btn-outline-primary btn-sm" onclick="object.resetParams().setForm('#categoryImage').load();" id="btn_delete">Remove</button>

        <form method="post" id="categoryImage" action="<?php echo $this->getUrl()->getUrl('update', 'Admin\Category\Image'); ?>">

            <button style="margin-top: 20px;" type="button" onclick="object.resetParams().setForm('#categoryImage').load();" name="btn_update" class="btn btn-outline-primary btn-sm">Update</button>

            <div class="table-responsive table-responsive-data2">
                <div class="row">
                    <table class="table table-striped table-data2 ">
                        <thead id="tableHeading">
                            <tr>
                                <th>Image Id</th>
                                <th>Image</th>
                                <th>Icon</th>
                                <th>Base</th>
                                <th>Banner</th>
                                <th>Status</th>
                                <th>remove</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (!$this->getImage()) {
                                echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                                echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                            } else {
                                foreach ($image->data as $key => $value) {
                                    if ($value->categoryId == $this->getRequest()->getGet('editId')) {

                                        echo '<tr id="' . $value->imageId . '">'; ?>

                                        <td><label name="img[imageId]"><?php echo $value->imageId; ?></label></td>

                                        <?php echo '<td><img src="' . $value->image . '"></img></td>'; ?>

                                        <td><input type="radio" name="img[icon]" value="<?php echo $value->imageId; ?>" <?php if ($value->icon == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>></td>
                                        <td><input type="radio" name="img[base]" value="<?php echo $value->imageId; ?>" <?php if ($value->base == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>></td>
                                        <td><input type="checkbox" name="img[data][<?php echo $value->imageId; ?>][banner]" <?php if ($value->banner == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>></td>

                                        <?php
                                        if ($value->status != 1) {
                                        ?>
                                            <td><a style="color: white;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Admin\Category\Image', ['editId' => $value->imageId, 'selectId' => $value->status, 'categoryId' => $categoryId]) ?>').resetParams().load(); " title="Active" id="activeBtn" class="btn btn-success btn-sm">Active</a></td>
                                        <?php } else { ?>
                                            <td><a style="color: white;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('select', 'Admin\Category\Image', ['editId' => $value->imageId, 'selectId' => $value->status, 'categoryId' => $categoryId]) ?>').resetParams().load(); " title="In active" id="inactiveBtn" class="btn btn-danger btn-sm">Inactive</a> </td>
                                        <?php } ?>

                                        <input type="hidden" name="categoryId" value=<?php echo $value->categoryId ?>>

                                        <td><input type='checkbox' name="remove" value="<?php echo $value->imageId ?>"></td>

                                        </td>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
        </form>
        </tbody>
        </table>

    </div>
</div>
</div>
</div>

<form method="post" id="imageUploadForm" enctype="multipart/form-data">

    <input type="file" style="margin-top: 50px;" name="image" id="file" required>

    <button type="button" id="btn_upload" class="btn btn-primary">Upload</button>

</form>



<script>
    $(document).ready(function() {

        $("#btn_upload").click(function() {
            object.setUrl('<?php echo $this->getUrl()->getUrl("add", "Admin\Category\Image"); ?>');
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
                        url: 'http://localhost/cybercom-creation/Advance%20PHP%20&%20MVC/Application/index.php?c=Admin\\Category\\Image&a=delete',
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