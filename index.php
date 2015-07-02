<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : ?>
        
        <?php while (have_posts()) : the_post(); ?>
                
            <div class="post">
                <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" 
                title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
                
                <div class="entry">
                    <?php the_content(); ?>
                </div>
    <?php echo ('ciao');?>    
                <p class="postmetadata">Posted in <?php the_category(', ') ?> <strong>|</strong>  
                	<?php comments_popup_link('1 Comment »', '% Comments »'); ?>
                </p>
                	<!--
                	<?php trackback_rdf(); ?>
                	-->
            </div>
    
        <?php endwhile; ?>
        
        <!-- navigare avanti e indietro -->

        <div class="navigation">
            <div class="alignleft"><?php posts_nav_link('','','« Previous Entries') ?></div>
            <div class="alignright"><?php posts_nav_link('','Next Entries »','') ?></div>
        </div>
        
    <?php else : ?>

        <h2 class="center">Non trovato</h2>
        <p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>

    <?php endif; ?>

</div>
<?php get_sidebar()?>
<?php get_footer(); ?>

