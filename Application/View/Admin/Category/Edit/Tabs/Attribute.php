<div class="section__content section__content--p30">
    <div class="container-fluid">

        <?php $attribute = $this->getAttributes(); ?>
        <?php $attributeData = $this->getAttribute(); ?>



        <h2 style="margin-bottom: 20px;">Attribute</h2>


        <form method="post" id="attributeCategoryForm" action="<?php echo $this->getUrl()->getUrl('save', 'Admin\Category\Attribute'); ?>">

            <?php
            if (!$attribute) :
                echo '<strong style="padding-left:20px;padding-top:20px;">No Record Found!</strong>';
            else :
                foreach ($attribute->getData() as $key => $value) :
                    $options = $value->getOptions();
                    if ($value->entityTypeId == 'category') : ?>
                        <div class="card-body card-block">
                            <div class="form-group">


                                <!-- SELECT MULTIPLE -->
                                <?php if ($options) : ?>
                                    <strong><label><?php echo $value->name; ?></label> </strong>
                                    <?php if ($value->inputType == 'select-multiple') : ?>
                                        <<?php echo str_replace('-', ' ', $value->inputType); ?> name="<?php echo $value->name; ?>[]"  class="form-control">
                                            <?php foreach ($options->getData() as $key => $option) : ?>
                                                <option value="<?php echo $option->name; ?>" <?php $attributeData1 = explode(',', $attributeData->{$value->name}); ?> <?php foreach ($attributeData1 as $key => $row) : ?> <?php if ($row == $option->name) : ?> selected <?php endif; ?> <?php endforeach; ?>>
                                                    <?php echo $option->name; ?></option>
                                            <?php endforeach; ?>
                                        </<?php echo str_replace('-', ' ', $value->inputType); ?>>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <!-- TEXT -->

                                <?php if ($value->inputType == 'text') : ?>
                                    <strong><label><?php echo $value->name; ?></label> </strong>
                                    <input type="<?php echo $value->inputType; ?>" name="<?php echo $value->code ?>" value="<?php echo $attributeData->{$value->name}; ?>"  class="form-control">
                                <?php endif; ?>

                                <!-- TEXTAREA -->
                                <?php if ($value->inputType == 'textarea') : ?>
                                    <strong><label class="form-control-label"><?php echo $value->name; ?></label> </strong>
                                    <<?php echo $value->inputType; ?> name="<?php echo $value->code ?>"  class="form-control">
                                        <?php echo $attributeData->{$value->name}; ?>
                                    </<?php echo $value->inputType; ?>>
                                <?php endif; ?>

                                <!--SELECT -->
                                <?php if ($options) : ?>
                                    <?php if ($value->inputType == 'select') : ?>
                                        <<?php echo $value->inputType; ?> name="<?php echo $value->name; ?>"  class="form-control">
                                            <?php foreach ($options->getData() as $key => $option) : ?>
                                                <option value="<?php echo $option->name; ?>" <?php if ($attributeData->{$value->name} == $option->name) : ?> selected <?php endif; ?>>
                                                <?php echo $option->name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </<?php echo $value->inputType; ?>>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <!--CHECKBOX-->
                                <?php if ($options) : ?>
                                    <?php if ($value->inputType == 'checkbox') : ?>
                                        <?php foreach ($options->getData() as $key => $option) : ?>
                                            <input type="<?php echo $value->inputType; ?>" style="width: 25px; height: 25px; " value="<?php echo $option->name; ?>" name="<?php echo $value->name; ?>[]" <?php $attributeData1 = explode(',', $attributeData->{$value->name}); ?> <?php foreach ($attributeData1 as $key => $row) : ?> <?php if ($row == $option->name) : ?> checked>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <label  style="font-size: 25px;"><?php echo $option->name; ?></label>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!--RADIO-->
                        <?php if ($options) : ?>
                            <?php if ($value->inputType == 'radio') : ?>
                                <?php foreach ($options->getData() as $key => $option) : ?>
                                    <input  type="<?php echo $value->inputType; ?>" style="width: 25px; height: 25px; " value="<?php echo $option->name; ?>" name="<?php echo $value->code ?>" <?php if ($attributeData->{$value->name} == $option->name) : ?> checked <?php endif; ?>>
                                    <label style="font-size: 25px;"><?php echo $option->name; ?></label>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        <?php endif; ?>
                            </div>
                        </div>
            <?php
                    endif;
                endforeach;
            endif;
            ?>
            <div class="card-body card-block">
                <div class="form-group">
                    <button type="button" onclick="object.resetParams().setForm('#attributeCategoryForm').load();" name="save" class="btn btn-primary btn-lg">
                        <i class="fa fa-plus"></i>&nbsp; Save</button>
                </div>
            </div>
        </form>

    </div>
</div>