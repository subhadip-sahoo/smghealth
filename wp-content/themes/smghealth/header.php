<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
         <link rel="icon" href="<?php echo get_template_directory_uri();?>/images/favicon.png" type="image/png">
        <!-- Bootstrap -->
        <link href="<?php echo get_template_directory_uri();?>/css/bootstrap.css" rel="stylesheet">
       <!--  <link href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="<?php echo get_template_directory_uri();?>/css/bootstrap-theme.css" rel="stylesheet">
        <!-- <link href="<?php echo get_template_directory_uri();?>/css/bootstrap-theme.min.css" rel="stylesheet"> -->
        <link href="<?php echo get_template_directory_uri();?>/css/style.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/font-awesome.css"> -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/responsive.css">
		

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/moderniz.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body>
        <!--Header_start-->
        <header  class="container-fluid header_bg">
        <div class="container">
            <div class="row">
                <ul class="list-inline pull-right m_t1 header_nav">
                    <li><i class="fa fa-phone"></i>  &ensp;<a href="tel:<?php echo get_field('header_phone', 'options'); ?>"><?php echo get_field('header_phone', 'options'); ?></a></li>
                    <li><span><img src="<?php echo get_template_directory_uri();?>/images/phone_icon.png" alt="" title=""></span> &ensp;<a href="tel:<?php echo get_field('header_mobile', 'options'); ?>"><?php echo get_field('header_mobile', 'options'); ?></a></li>
                </ul>
            </div>
            <nav role="navigation" class="navbar navbar-default"> 
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle"> 
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                    </button>
                     <?php $logo = get_field('logo', 'options'); ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo $logo; ?>" alt="SMG Health" class="img-responsive logo" title="SMG Health">
                    </a> 
                </div>
                <!-- Collection of nav links and other content for toggling -->
                
               <div id="navbarCollapse" class="collapse navbar-collapse pull-right">
               <?php wp_nav_menu( array( 'theme_location' => 'header','menu_class' => 'headermenu', 'walker' => new wp_bootstrap_navwalker(), 'items_wrap' => '<ul id="menu-top-nav1" class="menu nav navbar-nav">%3$s</ul>' ) ); ?>
                  <ul class="seach_box navbar-right">
                      <i class="fa fa-search pull-left fa-lg"></i>
                      <form action="<?php echo home_url( '/' ); ?>">
                          <input type="text" class="search-query form-control pull-left" placeholder="Enter your keyword" id="search" name="s" />
                          <input type="submit" value="Search" class="btn btn-search seach_icon">
                      </form>
                  </ul>         
                </div>
            </nav>

        </div>
    </header>
  <!--Header_end-->