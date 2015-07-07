<?php get_header();?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> <img src="<?php echo get_template_directory_uri();?>/images/about_us_banner.png" alt="..." class="img-responsive"> </div>
<div class="container-fluid inner_page">
  <div class="container inner_section">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
    <h1><span>
      <?php the_title();?>
      </span></h1>
    <?php the_content(); ?>
    <div class="clearfix"></div>
    <?php endwhile; wp_reset_query(); endif;?>
  </div>
</div>
<?php get_footer(); ?>
