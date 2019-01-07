<div class="col-xs-12 no_padding bg_deg_gray">
    <div class="container">
        <?php if (has_post_thumbnail()): ?>
            <div class="col-xs-12 col-sm-4 no_padding_left no_padding_xs">
                <img class="padding_top_40" style="max-width: 381px;width: 100%;" src="<?php the_post_thumbnail_url(); ?>" alt=""/>
            </div>
        <?php endif; ?>
        <div class="col-xs-12 col-sm-<?php echo has_post_thumbnail() ? '8' : '12'; ?> no_paddig">
            <h1 style="color: #ed1c24;"><?php the_title(); ?></h1>
            <div class="clearfix"></div>
            <?php the_content(); ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 no_padding margin_top_50 margin_bottom_70 text-center">
            <?php if (has_nav_menu('section-2-menu')) {
                add_filter('nav_menu_css_class', function ($class, $ref, $menu, $level) {
                    if ($menu->theme_location === 'section-2-menu')
                        $class = array('col-xs-12 col-sm-2');
                    return $class;
                }, 10, 4);

                wp_nav_menu(array(
                    'theme_location' => 'section-2-menu',
                    'depth' => 1,
                    'container' => null,
                    'menu_class' => 'btn_big_red',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                ));
            } ?>
        </div>
    </div>
</div>