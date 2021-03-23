<!DOCTYPE html>

<html lang="en">


<head>

    <title>Admin Site</title>
    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/Admin/JS/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/Admin/JS/mage.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/Admin/ckeditor.js'); ?> "></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/Admin/sample.js'); ?>"></script>
</head>



<link rel="icon" href="images/ab12.png">
<header class="header-desktop">


    <div class="logo">
        <a href="http://localhost/cybercom-creation/Advance%20PHP%20&%20MVC/Application/index.php?c=dashboard&a=index">
            <img src="images/icon/questecom.png" width="250px" />
        </a>
    </div>

    <div class="section__content section__content--p0">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                </form>
                <!-- admin profile -->
                <div class="header-button">
                    <div class="noti-wrap">
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="topnav">
                                <a href="http://localhost/cybercom-creation/Advance%20PHP%20&%20MVC/Application/index.php?c=admin\dashboard&a=index">Dashboard</a>

                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'admin\admin', ['page' => 1]) ?>').resetParams().load(); ">Admin</a>

                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'admin\attribute', ['page' => 1]) ?>').resetParams().load(); ">Attribute</a>

                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'admin\brand', ['page' => 1]) ?>').resetParams().load(); ">Brand</a>

                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'admin\CMS', ['page' => 1]) ?>').resetParams().load(); ">CMS Page</a>

                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'admin\customer', ['page' => 1]) ?>').resetParams().load(); ">Customer</a>

                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'admin\customerGroup', ['page' => 1]) ?>').resetParams().load(); ">Customer Group</a>

                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'admin\Category', ['page' => 1]) ?>').resetParams().load(); ">Category</a>

                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'admin\Product', ['page' => 1]) ?>').resetParams().load(); ">Product</a>

                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'admin\Payment', ['page' => 1]) ?>').resetParams().load(); ">Payment</a>

                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'admin\Shipment', ['page' => 1]) ?>').resetParams().load(); ">Shipment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<script>
    var object = new Base();
</script>