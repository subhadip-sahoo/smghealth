<?php get_header(); ?>
<div class="container-fluid inner_page">
    <div class="container inner_section">
        <div class="col-md-12">
            <h1><span>Search result for: <?php echo get_search_query(); ?></span></h1>
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
            <h2><span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h2>
            <span class="border_bottom2"></span>
            <p class="text-justify m_t2"><?php echo mb_strimwidth(wp_strip_all_tags(get_the_content(get_the_ID())), 0, 500, '&nbsp;<a href="'.  get_the_permalink(get_the_ID()) .'">Read more</a>'); ?></p>
        </div>
        <div class="clearfix"></div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
        <?php else: ?>
        <div class="col-md-12 m_t2">
           <p class="text-justify m_t2">No results found!</p>
        </div>
        <?php endif; ?>
    </div>
 </div>
<?php get_footer(); ?>