<?php
get_header(); ?>
    <article>
        <?php
        if (0 !== atlantis_panel_count() || is_customize_preview()) {
            $num_sections = apply_filters('atlantis_front_page_sections', 7);
            global $atlantiscounter;
            for ($i = 1; $i < (1 + $num_sections); $i++) {
                $atlantiscounter = $i; ?>
                <div class="col-xs-12 no_padding" id="panel<?php echo $atlantiscounter; ?>" <?php post_class('atlantis-panel '); ?> >
                    <?php if ($i === 1) {
                        set_query_var('panel', $id);
                        get_template_part('template-parts/content', 'section-1');
                    } else
                        atlantis_front_page_section(null, $i); ?>
                </div>
                <div class="clearfix"></div>
                <?php
            }
        };
        ?>
    </article>
<?php get_footer();