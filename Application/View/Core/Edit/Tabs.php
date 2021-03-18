<?php

$tabs = $this->getTabs();
foreach ($tabs as $key => $tab) { ?>
    <div class="topnav">
        <a class='btn btn-block' style="color: gray; padding-top: 20px; padding-bottom: 20px;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl(null, null, ['tab' => $key]);?>').resetParams().load();"><?php echo $tab['label'] ?></a>
    </div>
<?php
}

?>