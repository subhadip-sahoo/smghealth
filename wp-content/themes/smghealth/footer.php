    <footer class="container-fluid footer_bg">
        <div class="container">
            <div class="col-md-2 blog_con_left">
                <h2>Services</h2>
                <?php

                    $args = array(
                            'theme_location'  => 'services',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="list-unstyled">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                    );

                    wp_nav_menu( $args );

                ?>
            </div>
            <div class="col-md-2 blog_con_left">
                <h2>Need Help?</h2>
                <?php

                    $args = array(
                            'theme_location'  => 'need_help',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="list-unstyled">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                    );

                    wp_nav_menu( $args );

                ?>
            </div>
            <div class="col-md-2 blog_con_left">
                <h2>Company Info</h2>
                <?php

                    $args = array(
                            'theme_location'  => 'company_info',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="list-unstyled">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                    );

                    wp_nav_menu( $args );

                ?>
            </div>
            <div class="col-md-3 blog_con_right">
                <h2>Follow Us On</h2>
                <ul class="list-inline socl_meia">
                    <li><a href="<?php echo (get_field('facebook_url', 'options') <> '') ? get_field('facebook_url', 'options') : '#'; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/fac_icon.png" class="img-responsive" alt=""/></a></li>
                    <li><a href="<?php echo (get_field('linkedin_url', 'options') <> '') ? get_field('facebook_url', 'options') : '#'; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/ink_icon.png" class="img-responsive" alt=""/></a></li>
                    <li><a href="<?php echo (get_field('twitter_url', 'options') <> '') ? get_field('facebook_url', 'options') : '#'; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/tutt_icon.png" class="img-responsive" alt=""/></a></li>
                    <li><a href="<?php echo (get_field('google_plus_url', 'options') <> '') ? get_field('facebook_url', 'options') : '#'; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/goo_icon.png" class="img-responsive" alt=""/></a></li>
                </ul>
                <?php if(get_field('email_address', 'options') <> '') : ?>
                <p><i class="fa fa-envelope-o"></i>&emsp;<a href="mailto:<?php echo get_field('email_address', 'options');?>"><?php echo get_field('email_address', 'options'); ?></a></p>
                <?php endif; ?>
            </div>
            <div class="col-md-3 blog_con_right">
                <?php echo do_shortcode('[xyz_em_subscription_html_code]'); ?>
            </div>
            <div class="col-md-12 last_footer">
                <?php

                    $footer_args = array(
                            'theme_location'  => 'footer',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="list-inline">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                    );

                    wp_nav_menu( $footer_args );

                ?>
                <?php if(get_field('copyright', 'options') <> '') : ?>
                <p><small><i class="fa fa-copyright"></i> <?php echo get_field('copyright', 'options');?></small></p>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
     
    <script type="text/javascript">
        jQuery('.carousel').carousel();
        jQuery(function(){
            jQuery(".navbar .dropdown").hover(            
                function() {
                    jQuery(this).next('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                    jQuery(this).toggleClass('open');
                    jQuery('b', this).toggleClass("caret caret-up");
                    // jQuery(this).next('a').click(function(event) {
                    //     event.stopPropagation();
                    // });                
                },
                function() {
                    jQuery(this).next('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                    jQuery(this).toggleClass('open');
                    jQuery('b', this).toggleClass("caret caret-up");
                    // jQuery(this).next('a').click(function(event) {
                    //     event.stopPropagation();
                    // });                
            });
        });
    </script>
    <?php wp_footer(); ?>
  </body>
</html>