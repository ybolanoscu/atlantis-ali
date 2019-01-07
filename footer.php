<footer>
    <div class="container">
        <?php add_filter('nav_menu_css_class', function ($class, $ref, $menu) {
            if ($menu->theme_location === 'top-right-menu')
                $class = array('dropdown');
            $menu->link_after = '';
            return $class;
        }, 10, 3); ?>
        <?php if (has_nav_menu('footer-menu-1')) { ?>
            <div class="col-xs-12 col-sm-3">
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer-menu-1',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => 'footer-menu-1',
                    'menu_class' => 'footer-menu no_padding_left no_padding_xs nav navbar-nav',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                )); ?>
            </div>
        <?php } ?>
        <?php if (has_nav_menu('footer-menu-2')) { ?>
            <div class="col-xs-12 col-sm-3">
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer-menu-2',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => 'footer-menu-2',
                    'menu_class' => 'footer-menu no_padding_left no_padding_xs nav navbar-nav',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                )); ?>
            </div>
        <?php } ?>
        <?php if (has_nav_menu('footer-menu-3')) { ?>
            <div class="col-xs-12 col-sm-3">
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer-menu-3',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => 'bs-footer-menu-3',
                    'menu_class' => 'footer-menu no_padding_left no_padding_xs nav navbar-nav',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                )); ?>
            </div>
        <?php } ?>
        <?php if (has_nav_menu('footer-menu-4')) { ?>
            <div class="col-xs-12 col-sm-3">
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer-menu-4',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => 'bs-footer-menu-3',
                    'menu_class' => 'footer-menu no_padding_left no_padding_xs nav navbar-nav',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                )); ?>
            </div>
        <?php } ?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-12 no_padding footer_copy">
        <div class="container">
            <div class="col-sm-9">
	            <?php echo str_replace('{year}', date('Y'), atlantis_get_theme_option('atlantis_bottom_slogan')); ?>
            </div>
            <div class="col-sm-3">
	            <?php if (has_nav_menu('social-links'))
		            wp_nav_menu(array(
			            'theme_location' => 'social-links',
			            'menu_class' => 'social_menu',
			            'depth' => 1,
			            'container' => null,
		            )); ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>