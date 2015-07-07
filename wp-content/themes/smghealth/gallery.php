<?php /*Template Name: Gallery Page */?>

 <?php get_header();?>

  <!--body container part -->
      <div class="body_container_part">
      
          <h2><?php the_title();?></h2>
            <div class="service">
             
                <ul>
                 <?php
                              query_posts( array( 'post_type' => 'gallery' ) );
                              if ( have_posts() ) : while ( have_posts() ) : the_post();
                            ?>
                            <?php $image = vt_resize( get_post_thumbnail_id( get_the_id() ),'', 227, 222);?>
                 <li><a href="<?php the_permalink();?>" title=""><img src="<?php echo $image ['url'];?>" width="227" height="222" alt=""></a><span><?php the_title();?></span></li>
                   <?php endwhile; endif; ?>
                   
                </ul>
          </div>
          
        </div>
    <!--body container part end -->
 
         <?php get_footer();?>

         