<div class="col-xs-12 no_padding blue_banest_section bg_blue">
    <div class="container">
        <div class="blue_banest hidden-xs" style="<?php echo has_post_thumbnail() ? 'background: url(\'' . get_the_post_thumbnail_url(get_the_ID(), 'large') . '\') no-repeat center;' : ''; ?>"></div>
        <div class="col-xs-12 col-sm-6 col-sm-push-6 padding_bottom_20">
            <h1 class="fg_white"><?php the_title(); ?></h1>
            <div class="clearfix"></div>
            <?php the_content(); ?>
        </div>
    </div>
</div>