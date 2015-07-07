 <?php get_header(); ?>
 <!--body container part -->
    	<div class="body_container_part">
           <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
        	<h2><?php the_title();?></h2>
             <?php the_content();?>
              <?php endwhile; endif; ?>
        </div>
    <!--body container part end -->

    <?php get_footer();?>