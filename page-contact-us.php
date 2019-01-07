<?php
get_header(); ?>
    <div class="col-xs-12 bg_dark_blue no_padding">
        <div class="container">
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <?php
                            the_content();

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . __('Pages:', 'atlantis'),
                                'after' => '</div>',
                            ));
                            ?>
                        </div>
                    </article>
                    <?php if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                endwhile;
                ?>
            </div>
        </div>
    </div>
<?php get_footer();