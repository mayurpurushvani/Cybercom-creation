
<body class="animsition">
    <div class="page-wrapper">

        <!--HEADER-->
        <?php echo $this->getChild('header')->toHtml(); ?>

        <!--NAV BAR -->
        <?php echo $this->getChild('left')->toHtml(); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container-1">
        
            <!-- HEADER DESKTOP-->
            <div class="main-content">

                <?php echo $this->createBlock('Block\Core\Layout\Message')->toHtml(); ?>
                <?php echo $this->getChild('content')->toHtml(); ?>

            </div>
        </div>
    </div>

    <!--FOOTER-->
    <?php echo $this->getChild('footer')->toHtml(); ?>

    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</body>

</html>
<!-- end document-->