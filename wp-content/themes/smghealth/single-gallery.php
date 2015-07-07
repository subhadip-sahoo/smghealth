 <?php get_header();?>
  <!--body container part -->
        <div class="body_container_part">
            <h2>Gallery</h2>
            <div class="service">
            <ul>

                    <?php  if (get_field('gallery')):  ?>
         
              <?php  while( has_sub_field('gallery') ) :  ?> 
               <?php  $galleryimage = get_sub_field('gallery_image');
                 $galleryalt = get_sub_field('alt_text');
                                               ?>

                       
                         <li><a class="fancybox" href="<?php echo $galleryimage; ?>" data-fancybox-group="gallery" title="<?php echo $galleryalt; ?>"><img src="<?php echo $galleryimage; ?>" width="250" height="180" alt="<?php echo $galleryalt; ?>"></a></li>
                       
                     <?php endwhile; ?>
           
        <?php endif; ?>
                    </ul>
              
           </div>
        </div>
    <!--body container part end -->
  
         <?php get_footer();?>

         