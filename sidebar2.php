<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Display on left screen
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @package WordPress
 */

if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div id="tertiary" class="sidebar-container" role="complementary">
		<div class="sidebar-inner">
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-inner -->
	</div><!-- #tertiary -->
<?php endif; ?>

<?php 
if ( !function_exists('dynamic_sidebar') || ! dynamic_sidebar() ) :
endif;?>