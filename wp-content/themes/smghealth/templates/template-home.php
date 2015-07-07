<?php
    /* Template Name: Home */
    global $post;
    get_header();
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <?php query_posts(array('post_type' =>'slider', 'posts_per_page' => -1)); ?>
        <?php if(have_posts()) : $count = 0;?>
        <?php while(have_posts()) : the_post(); $count++;?>
        <?php if(has_post_thumbnail()) : ?>
        <div class="item <?php echo ($count == 1) ? 'active':''; ?>">
            <?php the_post_thumbnail('full'); ?>
            <h3><?php the_title(); ?></h3>
        </div>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
        <?php endif; ?>
    </div>
</div>
<?php if(have_posts()) :?>
<?php while(have_posts()) : the_post(); ?>
<div class="container">
    <section class="section top_section row ">
        <?php $associate_pages = get_field('associate_pages'); ?>
        <?php //DBUG($associate_pages); ?>
        <?php foreach ($associate_pages as $page) : ?>
        <?php $col = 0; ?>
        <?php $pageid = url_to_postid( $page['pages'] ); ?>
        <?php $pg = get_post($pageid); ?>
        <?php if(has_post_thumbnail($pageid)) : $col = 3;?>
        <?php $home_image = wp_get_attachment_image_src(get_post_thumbnail_id($pageid), 'home_box_image'); ?>
        <div class="col-md-<?php echo $col; ?> pull-left">    
            <img src="<?php echo $home_image[0]; ?>" alt="" class="img-thumbnail pull-left img-responsive" width="248" height="195">
        </div>
        <?php endif; ?> 
        <div class="col-md-<?php echo (6 - $col); ?> pull-left">    
            <h2><?php echo ($page['custom_page_title'] <> '') ? $page['custom_page_title'] : the_title();?></h2>
            <p><?php echo mb_strimwidth(wp_strip_all_tags($pg->post_content), 0, 170, '&nbsp;...') ?></p>
            <a class="button_deffalt" href="<?php echo $page['pages'];?>" role="button">Read More</a>
        </div>
        <?php endforeach; ?>
    </section>
    <!--middle_section-->
    <section class="section2 middle_section row">
        <div class="col-md-12">
            <h1 class="text-center m_b2"><?php echo get_field('welcome_title'); ?></h1>
            <p class="text-center"><?php echo $post->post_content;?></p>
        </div>
    </section>
</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
<?php endif; ?>
<div class="container-fluid buttom_section_bg section">
    <section class="container buttom_section">
        <?php query_posts(array('post_type' => 'post', 'posts_per_page' => 1)); ?>
        <?php if(have_posts()): ?>
        <?php while(have_posts()) : the_post(); ?>
        <div class="col-md-6">
            <h1>Our Latest Blog</h1>
            <?php if(has_post_thumbnail()) : ?>
            <?php $blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'home_box_image'); ?>
            <article class="pull-left">
                <img src="<?php echo $blog_image[0]; ?>" alt="" width="242" height="195" class="img_blog img-responsive" />
            </article>
            <?php endif; ?>
            <aside class="pull-left"> 
                <h2><?php the_title(); ?></h2>
                <p><i><?php echo get_the_date(DATETIME_DISPLAY_FORMAT, get_the_ID()); ?> by <?php echo get_the_author(get_the_ID()); ?></i></p>
                <p><?php echo mb_strimwidth(get_the_content(get_the_ID()), 0, 325, '&nbsp;&nbsp;...&nbsp<a href="'.get_the_permalink(get_the_ID()) .'">Read more</a>') ?></p>
            </aside> 
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
        <?php endif; ?>
        <div class="col-md-6">
            <h1>Enquiry Form</h1>
            <?php echo do_shortcode('[contact-form-7 id="4" title="Enquiry Form"]'); ?>
        </div>
    </section>
</div>
<?php get_footer(); ?>


