<?php global $wp_query; ?>
<?php get_header(); ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
   <img src="<?php echo get_template_directory_uri(); ?>/images/about_us_banner.png" alt="..." class="img-responsive">
</div>
<div class="container-fluid inner_page">
    <div class="container inner_section">
        <div class="col-md-12">
            <h1><span><?php echo $wp_query->queried_object->post_title; ?></span></h1>
            <p class="text-justify m_t2"><?php echo $wp_query->queried_object->post_content; ?></p>
        </div>
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
            <h2><span><?php the_title(); ?></span></h2>
           <span class="border_bottom2"></span>
           <p class="text-justify m_t2"><?php echo mb_strimwidth(get_the_content(get_the_ID()), 0, 300, '<a href="'.  get_the_permalink(get_the_ID()) .'">Read more</a>'); ?></p>
        </div>
        <div class="clearfix"></div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
        <?php endif; ?>
    </div>
 </div>
<?php get_footer(); ?>