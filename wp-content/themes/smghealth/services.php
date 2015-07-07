<?php /*Template Name: Service Page */?>
 <?php get_header();?>

 <!--body container part -->
        <div class="body_container_part">
            <h2>Services</h2>
             <?php
                              
                              if ( have_posts() ) : while ( have_posts() ) : the_post();
                            ?>
                            <?php the_content(); ?> 
                            <?php endwhile; endif; ?>
           <div class="ourservices">
            <article>
            <h2><?php echo get_field('services'); ?></h2>
            <p><?php echo get_field('services_text'); ?></p>
             <ul>

             <?php
                              query_posts( array( 'post_type' => 'services' ) );
                              if ( have_posts() ) : while ( have_posts() ) : the_post();
                            ?>
           
                <li>
                  <?php $image = vt_resize( get_post_thumbnail_id( get_the_id() ),'', 249, 181);?>
                                  <img src="<?php echo $image ['url'];?>" width="210" height="237">
                    
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                    <a href="<?php the_permalink(); ?>" class="read">Read MOre</a>
                </li>
                 <?php endwhile; endif; wp_reset_query(); ?>

               
               
            </ul>
            <br class="spacer">

            </article>
        </div>
        </div>
    <!--body container part end -->

         <?php get_footer();?>

         