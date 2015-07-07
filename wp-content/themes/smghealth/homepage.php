 <?php get_header();?>
  <!--header banner part -->
        <header>
            <ul class="bxslider">
                <?php
                   query_posts( array( 'post_type' => 'slider' ) );
                       if ( have_posts() ) : while ( have_posts() ) : the_post();
                ?>
                       <li style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>');">
                           <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>" width="2000" height="614" alt="" />
                       </li>
               <?php endwhile; endif; wp_reset_query(); ?>
            </ul>
        </header>
    <!--header banner part end -->
    <!--Our Services -->
        <div class="ourservices">
            <article>
                <h2><?php echo get_field('services'); ?></h2>
                <p><?php echo get_field('services_text'); ?></p>
                 <ul>
                    <?php
                       query_posts( array( 'post_type' => 'services','posts_per_page'=> 5 ) );
                       if ( have_posts() ) : while ( have_posts() ) : the_post();
                     ?>
                       <li>
                         <?php $image = vt_resize( get_post_thumbnail_id( get_the_id() ),'', 210, 237, true);?>
                               <img src="<?php echo $image ['url'];?>" width="210" height="237">

                           <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                           <a href="<?php the_permalink(); ?>" class="read">Read MOre</a>
                       </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                </ul>
                <br class="spacer">

            </article>
        </div>
    <!--Our Services end -->
    <!--welcome part -->
        <section class="welcome">
            <article>
                <h2><?php echo get_field('welcpme'); ?></h2>
                <p><?php echo get_field('welcome_text'); ?></p>
            </article>
        </section>
    <!--welcome part end-->
     <!--Our Services -->
        <div class="gallery_part">
            <article>
                <h2><?php echo get_field('our_gallery'); ?></h2>
                <p><?php echo get_field('our_gallery_text'); ?></p>
                <div class="jcarousel-wrapper">
                    <div class="jcarousel">
                        <ul>
                            <?php
                                query_posts( array( 'post_type' => 'gallery' ) );
                                if ( have_posts() ) : while ( have_posts() ) : the_post();
                            ?>
                            <?php $gallimage = vt_resize( get_post_thumbnail_id( get_the_id() ),'', 236, 222);?>
                                  <li> <img src="<?php echo $gallimage ['url'];?>" width="236" height="222"></li>
                            <?php endwhile; endif; wp_reset_query(); ?> 
                        </ul>
                    </div>
                    <a href="#" class="jcarousel-control-prev"></a>
                    <a href="#" class="jcarousel-control-next"></a>
                </div>
            </article>
        </div>
    <!--Our Services end -->
    <!--Complete commercial refrigeration supply, installation and service for: -->
        <section class="complete_commercial">
            <article>
                <?php the_content(); ?>
                <br class="spacer">
                <!--brand -->
                    <div class="brand">
                        <div class="jcarousel-wrapper">
                            <div class="jcarousel">
                                <ul>
                                    <?php  if (get_field('footer_logo')):  ?>
                                    <?php  while( has_sub_field('footer_logo') ) :  ?> 
                                    <?php  $logoimage = get_sub_field('footer_logo_image');
                                            $logoalt = get_sub_field('logo_alt');
                                    ?>
                                        <li><img src="<?php echo $logoimage;?>" width="238" height="99" alt="<?php echo $logoalt;?>"></li>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <a href="#" class="jcarousel-control-prev"></a>
                            <a href="#" class="jcarousel-control-next"></a>
                        </div>
                    </div>
                <!--brand -->
            </article>
        </section>
    <!--Complete commercial refrigeration supply, installation and service for: end -->
    <?php get_footer();?>