<?php
get_header(); ?>
    <article>
        <?php
        if (0 !== atlantis_panel_count() || is_customize_preview()) {
            $num_sections = apply_filters('atlantis_front_page_sections', 5);
            global $atlantiscounter;
            for ($i = 1; $i < (1 + $num_sections); $i++) {
                $atlantiscounter = $i;
                ?>
                <div class="col-xs-12 no_padding" id="panel<?php echo $atlantiscounter; ?>" <?php post_class('atlantis-panel '); ?> >
                    <div class="clearfix"></div>
                    <?php atlantis_front_page_section(null, $i); ?>
                </div>
                <?php
            }
        };
        ?>
    </article>
<?php get_footer();
