<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Brza_Dostava
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <meta name="description" content="Brza Dostava Web">
        <meta name="author" content="Marina Martinov">
        <link rel="profile" href="https://gmpg.org/xfn/11">

			<?php
   // $url=$_SERVER['REQUEST_URI'];
   // $url= $_SERVER['HTTP_HOST'];
    //header("Refresh: 10; URL=\"" . $url . "\""); // redirect in 5 seconds
    ?> 
		
        <title>Brza Dostava home page</title>
        
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

            <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div id="page" class="site container homeContainer">
            <!-- <a class="skip-link screen-reader-text"
				href="#primary"><?php esc_html_e( 'Skip to content', 'brzadostava' ); ?></a> -->

            <div class="row nav">
                <div class="col-lg-3">



         <nav class="navbar navbar-expand-md homeNav pt-2" id="sidebar">
                 

                

            
  <div class="container-md">
    <!-- Brand and toggle get grouped for better mobile display -->
	<button class="navbar-toggler btn-success btn" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-controls="bs-example-navbar-collapse-2" aria-expanded="false" aria-label="Toggle navigation">
		<span style="color:white;">MENI</span>
	</button>
	
            
    <div class="navbar-collapse" id="myNav"">
            <div class="offcanvas-header mt-3">
                    <button class="btn btn-outline-danger btn-close float-right"> &times Close </button>
                    <h5 class="py-2 text-white">Main navbar</h5>
            </div>
            
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'special',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-2',
            // 'menu_class'        => 'nav navbar-nav',
            'menu_class'        => 'navbar-nav homeNav__nav ',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker()
		) );
        ?>
        </div>
    </div>
   
   <?php the_custom_logo();?>
   
   <p class="mb-1 mt-3 mr-5" style="color:forestgreen;font-size:1.5rem">+381 62 246 000</p>
   
</nav>






                </div>
                <!--ne diraj-->




                <!-- end nav -->
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 banner">
                    <div class="container-md banner2__container">
                        <div class="row">
                            <div class="col offset-9">
                            
                            <?php if(is_user_logged_in()){?>
                            
                            <a class="btn banner__btn" href="/my-account/" target="_self">Zdravo <?php global $current_user; echo $current_user->first_name; ?></a>

                        
                            <?php }else{ ?>
                                <a class="btn banner__btn" href="/my-account/" target="_self">Log In</a>
                            
                                <?php } ?>
                            </div>
                        </div>
                        <div class=" container-md rw-wrapper">

                            <h1 class="rw-sentence ">Treba vam </h1>


                            <div class="rw-words rw-words-1">
                                <span></span>
                                <span>Pivo?</span>
                                <span>Kafa?</span>
                                <span>Pizza?</span>
                                <span>Punjač?</span>
                                <span>Telefon?</span>
                            </div>

                        </div>
                        <p class="ml-4 text-white">Hrana, piće, potreštine, i šta god vam treba doneti.</p>


                    </div>

                </div>
            </div>
            <!-- end banner -->
            <!-- carousel -->