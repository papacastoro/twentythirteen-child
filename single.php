<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
<?php endwhile; ?>
</div>

	<!--	 restituisce un numero definito di prodotti (immagine+titolo) in una parte del sito -->
	
	<?php
		$args = array( 'post_type' => 'product', 'posts_per_page' => 1);
		$loop = new WP_Query( $args );
		
		
		while ( $loop->have_posts() ) : $loop->the_post();
		global $product;
		
		echo '<a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.the_title().'</a>';
		endwhile;
		
		
		wp_reset_query();
		
		?>
	 	
</div><!-- #secondary -->

<!-- autore a fine articolo -->

<div id="post-author">
  <h3>Scritto da <?php the_author_posts_link() ?></h3>
  <p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '80' );} ?>
  <?php the_author_meta('description') ?> 
  </p>
  <p>Leggi tutti i post scritti da <?php the_author_posts_link() ?></p>
</div>


<!-- prodotti per pagina -->

	<div id="primary" <ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'per_page' => 3
					);
		
		/*$args = array(
				'columns' => '2',
				'orderby' => 'title',
				'order' => 'asc'
		);*/
		
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				woocommerce_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'Nessun prodotto' );
		}
		wp_reset_postdata();
	?>
</ul>


<!-- richiamo sidebar -->
<?php get_sidebar(); ?>

<!-- richiamo footer -->

<?php get_footer(); ?>

