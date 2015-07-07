 <?php get_header();?>

 <!--body container part -->
        <div class="body_container_part">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
            <h2>Services</h2>
           <div class="service_details">
                <!--services details left part -->
                    <div class="connected-carousels">
                        <div class="stage">
                            <div class="carousel carousel-stage">
                             <ul>

                    <?php  if (get_field('services_gallery_image')):  ?>
         
              <?php  while( has_sub_field('services_gallery_image') ) :  ?> 
               <?php  $serviceimage = get_sub_field('service_images');
                 $servicealt = get_sub_field('alt');
                                               ?>
                                                <li><img src="<?php echo $serviceimage; ?>" width="600" height="400" alt="<?php echo $servicealt; ?>"></li>

                        
                       
                     <?php endwhile; ?>
           
        <?php endif; ?>
                    </ul>
                              
                            </div>
                            <a href="#" class="prev prev-stage"><span>&lsaquo;</span></a>
                            <a href="#" class="next next-stage"><span>&rsaquo;</span></a>
                        </div>
        
                        <div class="navigation">
                            <a href="#" class="prev prev-navigation">&lsaquo;</a>
                            <a href="#" class="next next-navigation">&rsaquo;</a>
                            <div class="carousel carousel-navigation">
                            <ul>

                    <?php  if (get_field('services_gallery_image')):  ?>
         
              <?php  while( has_sub_field('services_gallery_image') ) :  ?> 
               <?php  $serviceimage = get_sub_field('service_images');
                 $servicealt = get_sub_field('alt');
                                               ?>
                                                <li><img src="<?php echo $serviceimage; ?>" width="50" height="50" alt="<?php echo $servicealt; ?>"></li>

                       
                       
                     <?php endwhile; ?>
           
        <?php endif; ?>
                    </ul>
                            </div>
                        </div>
                    </div>
                <!--services details left part end -->
                <!--details text right part -->
                    <div class="details_text_right_part">
                        <h4><?php the_title();?></h4>
                         <?php the_content();?>
                        
                        
                      
                    </div>
                    <br class="spacer">
                <!--details text right part end -->
            </div>
             <?php endwhile; endif; ?>
        </div>
    <!--body container part end -->
 
         <?php get_footer();?>

         