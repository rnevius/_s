<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package chefs
 */

if ( ! is_activechefsidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamicchefsidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
