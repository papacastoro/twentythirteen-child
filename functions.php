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
<<<<<<< HEAD
					<?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' );?>

				<input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Invia" />

=======
					<?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
					<input class="upload_image_button" type="button" value="Invia" />
					
					
			
>>>>>>> origin/master
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

<?php
/*
* Plugin Name: Media Upload Widget
* Plugin URI: http://www.paulund.co.uk
* Description: A widget that allows you to upload media from a widget
* Version: 1.0
* Author: Paul Underwood
* Author URI: http://www.paulund.co.uk
* License: GPL2

Copyright 2012  Paul Underwood

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License,
version 2, as published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/
/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("pu_media_upload_widget");' ) );

class pu_media_upload_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'pu_media_upload',
            'description' => 'Widget that uses the built in Media library.'
        );

        parent::__construct( 'pu_media_upload', 'Media Upload Widget', $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }

    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__) . 'upload-media.js', array('jquery'));

        wp_enqueue_style('thickbox');
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )
    {
        // Add any html to output the image in the $instance array
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {
        $title = __('Widget Image');
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }

        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button" type="button" value="Upload Image" />
        </p>
    <?php
    }
}
?>
