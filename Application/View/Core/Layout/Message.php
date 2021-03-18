<div class="center mt-2">
    <div class="col-12" id="message">
    
        <?php if ($success = $this->getMessage()->getSuccess()) { ?>
            <div class="alert alert-success" role="alert">
                <?= $success; ?>
            </div>
        <?php
            $this->getMessage()->clearMessage();
        } 
        ?>
        <?php
        ?>
        <?php if ($failure = $this->getMessage()->getFailure()) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $failure; ?>

            </div>
        <?php
            $this->getMessage()->clearMessage();
        }
        ?>
    </div>
</div>