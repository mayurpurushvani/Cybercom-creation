<aside class="menu-sidebar d-none d-lg-block">
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">

            <?php

            echo $this->getTabHtml();
            ?>

        </nav>
    </div>
</aside>
<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <?php
                echo $this->getTabContent();
                ?>
            </div>
        </div>
    </div>
</div>