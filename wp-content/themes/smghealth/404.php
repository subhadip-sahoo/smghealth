<?php get_header();?>
<?php global $post; ?>
    <?php echo common_banner_for_pages($post->ID); ?>
    <div class="container-fluid inner_page">
        <div class="container inner_section">
            <row>
                <div class="col-md-12">
                    <h1>Not found</h1>
                </div>
            </row> 
            <p>Page not found</p>
            <div class="clearfix"></div>
        </div>
    </div>
 <?php get_footer(); ?>