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
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$text = $instance['text'];
		echo $before_widget;
	
	?>
			                    <div class="textwidget">
		                        <p><?php echo esc_attr($text); ?></p>
		                    </div>
		
		echo $after_widget;
		        <?php 
 		// Widget output
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = strip_tags($new_instance['text']);
		// Save widget options
	}

	function form( $instance ) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Titolo</label>
			<input class="widefat"  id="<?php echo $this->get_field_id('title'); ?>" 
			name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		 <p>
                <label for="<?php echo $this->get_field_id('text'); ?>">Inserisci Testo</label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" rows="10" cols="10" name="<?php echo $this->get_field_name('text'); ?>">
                <?php echo esc_attr($instance['text']); ?>
                </textarea>
         </p>
         
		<!-- Output con titolo e testo modificabile
		<?php 
	}
}

function partner_register_widgets() {
	register_widget( 'Partner' );
}


add_action( 'widgets_init', 'partner_register_widgets' );?>
