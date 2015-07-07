<?php
/* Template Name: Events */
$events = event_sorting_by_date();
get_header();
global $post;
?>
<div class="container-fluid inner_page">
    <div class="container inner_section">
        <div class="col-md-12">
            <h1><span><?php the_title(); ?></span></h1>
            <p class="text-justify m_t2"><?php echo wp_strip_all_tags($post->post_content); ?></p>
        </div>
        <?php 
            if($events <> 0) :
                foreach($events as $evt) : 
                    if(strtotime(date('Y-m-d')) > strtotime($evt['end_date'])) : continue; endif; 
                    $event = get_post($evt['post_id']);
                   $event_image = wp_get_attachment_image_src(get_post_thumbnail_id($evt['post_id']), 'blog_listing_image');
        ?>
        <?php $col = 0; ?>
        <?php if(!empty($event_image[0])) : $col = 3;?>
        <div class="col-md-<?php echo $col; ?> m_t2">
            <img src="<?php echo $event_image[0]; ?>" class="img-thumbnail img-responsive" alt="" title="" width="248" height="195"/>
        </div>
         <?php endif; ?>
        <div class="col-md-<?php echo (12 - $col); ?> m_t2">
            <h2><span><?php echo $event->post_title; ?></span></h2>
            <span class="border_bottom2"></span>
            <p>Start date: <?php echo date(DATETIME_DISPLAY_FORMAT, strtotime(get_field('start_date', $evt['post_id'], TRUE))); ?></p>
            <p>End date: <?php echo date(DATETIME_DISPLAY_FORMAT, strtotime(get_field('end_date', $evt['post_id'], TRUE))); ?></p>
            <p>Location: <?php echo get_field('location', $evt['post_id'], TRUE); ?></p>
            <p class="text-justify m_t2"><?php echo mb_strimwidth(wp_strip_all_tags($event->post_content), 0, 300, '&nbsp<a href="'.  get_the_permalink($evt['post_id']) .'">Read more</a>'); ?></p>
        </div>
        <div class="clearfix"></div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
 </div>
<?php get_footer();?>
