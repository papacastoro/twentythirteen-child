<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_parent_theme_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

	if (function_exists('register_sidebar')){
		register_sidebar( array(
			'name'          => ('Sidebar2'),
			'id'            => 'sidebar2',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));}

		if ( function_exists( 'register_nav_menus' ) ) {
			register_nav_menus(
					array(
							'secondary' => 'Social',
					)
			);
		}
		register_nav_menu( 'primary', __( 'Navigation Menu', 'twentythirteen' ) );
?>