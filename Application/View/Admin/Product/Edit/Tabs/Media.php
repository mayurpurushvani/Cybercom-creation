<div class="section__content section__content--p30">
    <div class="container-fluid">

        <?php $media = $this->getMedia(); ?>
      

        <h2 style="margin-bottom: 20px;">Media</h2>

        <button type="button" class="btn btn-danger btn-lg" onclick="object.resetParams().setForm('#mediaUpdateForm').load();" id="btn_delete">Remove</button>

        <form method="post" id="mediaUpdateForm" action="<?php echo $this->getUrl()->getUrl('update', 'Admin\Product\Media'); ?>">

            <button style="margin-bottom: 20px;margin-top : 20px;" type="button" onclick="object.resetParams().setForm('#mediaUpdateForm').load();" name="btn_update" class="btn btn-success btn-lg">Update</button>

            <div class="table-responsive table-responsive-data3">
                <div class="row">
                    <table class="table table-striped table-data3 ">
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
                                        <?php echo '<td><img src="' . $value->image . '" style="height:200px; width : 200px;"></img></td>';

                                        ?>
                                        <td><input type="text" class="form-control margin70" name="img[data][<?php echo $value->mediaId; ?>][label]" value="<?php echo $value->label; ?>"></td>

                                        <td><input type="radio" style="width: 20px; height: 20px; " name="img[thumb]" class="margin70" value="<?php echo $value->mediaId; ?>" <?php if ($value->thumb == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>></td>
                                        <td><input type="radio" style="width: 20px; height: 20px; " class="margin70" name="img[small]" value="<?php echo $value->mediaId; ?>" <?php if ($value->small == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>></td>
                                        <td><input type="radio"  style="width: 20px; height: 20px; " class="margin70" name="img[base]" value="<?php echo $value->mediaId; ?>" <?php if ($value->base == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>></td>
                                        <td><input type="checkbox"  style="width: 20px; height: 20px; " class="margin70" name="img[data][<?php echo $value->mediaId; ?>][gallary]" <?php if ($value->gallary == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>></td>
                                        <td><input type='checkbox' style="margin-right: 40px;width: 20px; height: 20px; " name="remove" class="margin70" value="<?php echo $value->mediaId ?>"></td>

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

    <button type="button" id="btn_upload" class="btn btn-primary btn-lg">Upload</button>

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