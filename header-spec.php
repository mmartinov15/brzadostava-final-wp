<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <meta name="description" content="Brza Dostava Web">
        <meta name="author" content="Marina Martinov">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <title>Brza Dostava</title>
        
 <?php 
  // $url = home_url();
    //header("Refresh: 10; $url "); // redirect in 10 seconds
    ?>  
		
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

            <?php wp_head(); ?>
    </head>

    <body data-spy="scroll" data-target="#myNavbar" data-offset="0">
        
<nav class="navbar navbar-expand-md fixed-top main_menu" role="navigation" >
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
	<button class="navbar-toggler btn-success btn" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
		<span style="color:white;">MENI</span>
	</button>
	<a class="navbar-brand" href="/">
                <?php the_custom_logo();?>

            </a>
            
    <div class="navbar-collapse" id="main_nav">
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
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker()
		) );
        ?>
        </div>
        
        <ul class="login ml-auto pt-3">
			<?php if(is_user_logged_in()){?>
                            
                            <a class="btn banner__btn text-white" href="/my-account/" target="_self">Zdravo <?php global $current_user; echo $current_user->first_name; ?></a>

                        
                            <?php }else{ ?>
                                <a class="btn rest__btn text-white" href="/my-account/" target="_self">Log In</a>
                            
                                <?php } ?>
			
			
			
<!--                 <a class="btn rest__btn text-white" href="/my-account/" target="_self" >LOGIN -->
<!--                     <i class="fas fa-user-alt"></i> -->
<!--                 </a> -->
        </ul>
    </div>
    
</nav>