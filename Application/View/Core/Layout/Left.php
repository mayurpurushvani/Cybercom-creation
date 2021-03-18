<aside class="menu-sidebar d-none d-lg-block">
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <?php
            $children = $this->getChildren();
            foreach ($children as $child) {
                echo $child->toHtml();
            }
            ?>
        </nav>
    </div>
</aside>