<?php get_header();?>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
       <img src="<?php echo get_template_directory_uri();?>/images/about_us_banner.png" alt="..." class="img-responsive">
    </div>
    <div class="container-fluid inner_page">
        <div class="container inner_section">
            <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post();?>
            <?php $col = 0; ?>
            <?php if(has_post_thumbnail()) : $col = 3;?>
            <?php $blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'blog_listing_image'); ?>
            <div class="col-md-<?php echo $col; ?> m_t2">
                <img src="<?php echo $blog_image[0]; ?>" class="img-thumbnail img-responsive" alt="" title="" width="248" height="195"/>
            </div>
             <?php endif; ?>
            <div class="col-md-<?php echo (12 - $col); ?> m_t2">
                <h1><?php the_title(); ?></h1>
                <span class="border_bottom2"></span>
                <p>Start date: <?php echo date(DATETIME_DISPLAY_FORMAT, strtotime(get_field('start_date'))); ?></p>
                <p>End date: <?php echo date(DATETIME_DISPLAY_FORMAT, strtotime(get_field('end_date'))); ?></p>
                <p>Location: <?php echo get_field('location'); ?></p>
                <p class="text-justify m_t2"><?php the_content(); ?></p>
            </div>
            <div class="clearfix"></div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>