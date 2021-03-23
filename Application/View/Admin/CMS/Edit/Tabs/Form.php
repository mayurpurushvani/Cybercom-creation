<?php
$CMS = $this->getTableRow();
?>
<form method="post" id="CMSForm" action="<?php echo $this->getUrl()->getUrl('save', 'Admin\CMS',null, false); ?>">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong><?php echo $this->getTitle(); ?></strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">CMS id:</label>
                    <input type="text" name="CMS[pageId]" value="<?php if ($CMS->pageId) {
                                                                        echo $CMS->pageId;
                                                                    } else {
                                                                        echo 'Auto';
                                                                    } ?>" disabled="disabled" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Title :</label>
                    <input type="text" name="CMS[title]" value="<?php echo $CMS->title; ?>" class="form-control">
                </div>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Identifier:</label>
                    <input type="text" id="identifier" name="CMS[identifier]" value="<?php echo $CMS->identifier; ?>" class="form-control">
                </div>
            </div>

            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Content :</label>
                    <input type="hidden" id="myContent" name="CMS[content]">
                    <input type="hidden" id="setContent" value="<?php echo htmlentities($CMS->content); ?>">

                    <div class="adjoined-bottom">
                        <div class="grid-container">
                            <div class="grid-width-100">
                                <div id="editor">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-control-label">Status:</label>
                    <select name="CMS[status]">
                        <?php foreach ($CMS->getStatusOptions() as $key => $value) { ?>
                            <option value="<?php echo $key ?>" <?php if ($CMS->status == $key) { ?> selected <?php } ?>><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="card-body card-block">
                <div class="form-group">
                    <button type="button" onclick="getContent(); object.resetParams().setForm('#CMSForm').load();" name="update" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-plus"></i>&nbsp; Save</button>
                </div>
            </div>
        </div>
    </div>
</form>



<script>
    initSample();
    function getContent() {
        var data = CKEDITOR.instances.editor.getData();
        document.getElementById("myContent").value = data;
    }
    var setdata = document.getElementById("setContent").value;
    CKEDITOR.instances['editor'].setData(setdata);
</script>