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
class miowidget extends WP_Widget {
    function __construct() {
        // Instantiate the parent object
        parent::__construct(
                'miowidget', // Base ID
            __( 'Mio Widget', 'text_domain' ), // Name
            array( 'description' => __( 'miowidget', 'text_domain' ), ) 
// Args
        );
    }
    function widget( $args, $instance ) {
        echo $args['before_widget'];
            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
            }
            echo __( 'Funzionaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');?>
            
            <!-- Inserimento form per inserimento immagine -->


            <form id="featured_upload" method="post" action="#" enctype="multipart/form-data">
				<input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" />
					<input type="hidden" name="post_id" id="post_id" value="55" />
					<?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' );?>

				<input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Invia" />

						<?php if ( ! function_exists( 'wp_handle_upload' ) ) {
    							require_once( ABSPATH . 'wp-admin/includes/file.php' );
								}

								$uploadedfile = $_FILES['file'];

								$upload_overrides = array( 'test_form' => false );

								$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

								if ( $movefile && !isset($movefile['error']) ) {
									echo "Upload riuscito.\n";
    								var_dump( $movefile);
								}
								else {
									/**
									 * errore generato da _wp_handle_upload()
									 * @see _wp_handle_upload() in wp-admin/includes/file.php
									 */
									echo $movefile['error'];
								}
						?>
			</form>
          
       <?php  echo $args['after_widget'];
        // Widget output
    }
    function update( $new_instance, $old_instance ) {
        $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
        // Save widget options
    }
    function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Titolo', 'text_domain' );
        ?>
                <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>
                     " name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                          value="<?php echo esc_attr( $title ); ?>">
                </p>
                <?php 
        // Output admin widget options form
    }
}
function myplugin_register_widgets() {
    register_widget( 'miowidget' );
}
add_action( 'widgets_init', 'myplugin_register_widgets' );?>

