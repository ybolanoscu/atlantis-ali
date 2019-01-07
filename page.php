<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>
    <div class="bg_gray">
		<?php if ( have_posts() ):
			the_post(); ?>
			<?php if ( ! is_front_page() ) : ?>
            <header class="entry-header">
                <div class="container">
                    <div class="col-xs-12 col-sm-7 no_padding_left no_padding_xs">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </div>
                    <div class="col-xs-12 col-sm-5 no_padding">
                        <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
							<?php $home = is_home() || is_front_page(); ?>
                            <li class="<?php echo $home ? 'active' : ''; ?>" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a href="<?php echo get_home_url(); ?>">Home</a></li>
							<?php $format = '<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a href="%s" title="%s">%s</a></li>';
							$anc          = array_map( 'get_post', array_reverse( (array) get_post_ancestors( $post ) ) );
							$links        = array_map( 'get_permalink', $anc );
							$breadcrumbs  = '';
							foreach ( $anc as $i => $apost ) {
								$title = apply_filters( 'the_title', $apost->post_title );
								printf( $format, $links[ $i ], esc_attr( $title ), esc_html( $title ) );
							} ?>
                            <li class="active" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a href="<?php echo wp_guess_url(); ?>"><?php echo the_title( '', '', false ); ?></a></li>
                        </ol>
                    </div>
                </div>
            </header>
		<?php endif; ?>
            <div class="col-xs-12 <?php echo is_active_sidebar( 'sidebar-1' ) ? 'col-sm-8 col-md-9 no_padding_left no_padding_xs' : 'no_padding'; ?>">
				<?php atlantis_edit_link(); ?>
                <div class="clearfix"></div>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
						<?php if ( $image = the_post_thumbnail_url() ) : ?>
                            <div style="padding-right: 30px;" class="col-xs-12 col-sm-4 pull-left no_padding_left no_padding_xs">
                                <img style="max-width: 381px;width: 100%;" src="<?php echo $image; ?>" alt=""/>
                            </div>
						<?php endif; ?>
						<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'atlantis' ),
							'after'  => '</div>',
						) );
						?>
                    </div>
                </article>
            </div>
            <div class="container">
	            <?php if ( comments_open() || get_comments_number() ) :
		            comments_template();
	            endif; ?>
				<?php while ( have_posts() ):
					the_post(); ?>
                    <div class="col-xs-12 no_padding_xs">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        the_content();
                    </div>
				<?php endwhile; ?>
				<?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
                    <div class="col-xs-12 col-sm-4 col-md-3 no_padding_right no_padding_xs">
						<?php get_sidebar( 'sidebar-1' ); ?>
                    </div>
				<?php endif; ?>
            </div>
		<?php endif; ?>
    </div>
<?php get_footer();
