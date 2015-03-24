<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package chefs
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php echo 'Oops! That page can&rsquo;t be found.'; ?></h1>
				</header>

				<div class="page-content">
					<p><?php echo 'It looks like nothing was found at this location. Maybe try one of the links below or a search?'; ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php
						$archive_content = '<p>' . sprintf( 'Try looking in the monthly archives. %1$s', convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div>
			</section>

		</main>
	</div>

<?php get_footer(); ?>
