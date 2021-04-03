<div class="section__content section__content--p30">
    <div class="container-fluid">

        <?php $media = $this->getMedia(); ?>
        <h3 class='title-5 m-b-35'>Media</h3>

        <button type="button" class="btn btn-outline-primary btn-sm" onclick="object.resetParams().setForm('#mediaUpdateForm').load();" id="btn_delete">Remove</button>

        <form method="post" id="mediaUpdateForm" action="<?php echo $this->getUrl()->getUrl('update', 'Admin\Product\Media'); ?>">

            <button style="margin-top: 20px;" type="button" onclick="object.resetParams().setForm('#mediaUpdateForm').load();" name="btn_update" class="btn btn-outline-primary btn-sm">Update</button>

            <div class="table-responsive table-responsive-data2">
                <div class="row">
                    <table class="table table-striped table-data2 ">
                        <thead id="tableHeading">
                            <tr>
                                <th>Media Id </th>
                                <th>Image</th>
                                <th>Label</th>
                                <th>Small</th>
                                <th>Thumb</th>
                                <th>Base</th>
                                <th>Gallary</th>
                                <th>remove</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php

                            if (!$this->getMedia()) {
                                echo "<script>document.getElementById('tableHeading').style.display = 'none';</script>";
                                echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
                            } else {

                                foreach ($media->data as $key => $value) {
                                    if ($value->productId == $this->getRequest()->getGet('editId')) {
                                        echo '<tr id="' . $value->mediaId . '">';
                            ?>
                                        <td><label name="img[mediaId]"><?php echo $value->mediaId; ?></label></td>
                                        <?php echo '<td><img src="' . $value->image . '" style="height:200px; width : 250px;"></img></td>';

                                        ?>
                                        <td><input type="text" class="form-control" name="img[data][<?php echo $value->mediaId; ?>][label]" value="<?php echo $value->label; ?>"></td>

                                        <td><input type="radio" name="img[thumb]" value="<?php echo $value->mediaId; ?>" <?php if ($value->thumb == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>></td>
                                        <td><input type="radio" name="img[small]" value="<?php echo $value->mediaId; ?>" <?php if ($value->small == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>></td>
                                        <td><input type="radio" name="img[base]" value="<?php echo $value->mediaId; ?>" <?php if ($value->base == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>></td>
                                        <td><input type="checkbox" name="img[data][<?php echo $value->mediaId; ?>][gallary]" <?php if ($value->gallary == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>></td>
                                        <td><input type='checkbox' name="remove" value="<?php echo $value->mediaId ?>"></td>

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

<form method="post" id="imageUploadForm" action="<?php echo $this->getUrl()->getUrl('add', 'Admin\Product\Media'); ?>" enctype="multipart/form-data">

    <input type="file" name="image" id="file" style="margin-top: 20px;" required>

    <button type="button" id="btn_upload" class="btn btn-primary">Upload</button>

</form>



<script>

    $(document).ready(function() {

        $("#btn_upload").click(function() {
            object.setUrl('<?php echo $this->getUrl()->getUrl("add", "Admin\Product\Media"); ?>');
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
                        url: 'http://localhost/cybercom-creation/Advance%20PHP%20&%20MVC/Application/index.php?c=Admin\\Product\\Media&a=delete',
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