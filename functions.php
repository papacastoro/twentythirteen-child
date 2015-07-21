<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_parent_theme_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

	if (function_exists('register_sidebar')){
		register_sidebar( array(
			'name'          => ('Sidebar Sinistra'),
			'id'            => 'sidebar-3',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));}

		
		// secondary è dichiarato e serve ad aggiungere un ulteriore area
		
		if ( function_exists( 'register_nav_menus' ) ) {
			register_nav_menus(
					array(
							'secondary' => 'Menu secondario',
					)
			);
		}
?>
<?php 
class MioWidget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Mio widget' );
	}

	function widget( $args, $instance ) {
		// Widget output
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}

function myplugin_register_widgets() {
	register_widget( 'MioWidget' );
}

add_action( 'widgets_init', 'myplugin_register_widgets' );?>

<?php 
class Partner extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Partner' );
	}

	function widget( $args, $instance ) {
		// Widget output
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}

function partner_register_widgets() {
	register_widget( 'Partner' );
}


add_action( 'widgets_init', 'partner_register_widgets' );?>
