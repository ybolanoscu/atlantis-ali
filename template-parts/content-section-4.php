<div class="col-xs-12 no_padding langinstitute_miami" style="<?php echo has_post_thumbnail() ? 'background: #daecff url(\'' . get_the_post_thumbnail_url(get_the_ID(), 'large') . '\') no-repeat center;' : ''; ?>">
    <div class="container">
        <h1 class="text-center margin_top_40 margin_bottom_20">
            <?php echo atlantis_get_theme_option('atlantis_section_4_slogan'); ?><br>
            <strong><?php the_title(); ?></strong>
        </h1>
        <div class="col-xs-12 col-sm-6 col-sm-push-6 no_padding padding_top_20 padding_bottom_40">
            <?php the_content(); ?>
        </div>
    </div>
</div>