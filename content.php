<?php
/**
 * @package chefs
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php chefs_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				'Continue reading %s <span class="meta-nav">&rarr;</span>', 
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . 'Pages:',
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="entry-footer">
		<?php chefs_entry_footer(); ?>
	</footer>
</article>
