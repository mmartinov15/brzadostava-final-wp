<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Brza_Dostava
 */

?>



<footer class="py-5">
    
    <?php if (!is_home()): ?>
    <!--<button type="button" class="btn toggle-basket openmodal" data-toggle="modal" data-target="#basket">-->
    <!--    <i class="fas fa-shopping-cart"></i>-->
    <!--</button>-->
<?php endif; ?>
   

    <div class="container footer">
        <div class="row d-flex align-items-center">
            <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                <div class="footer__left">
                    <!-- logo  -->
                    <div class="img" height="55">
                        <?php
			            the_custom_logo();
			            
				        ?></div>
                    <!-- <img src="http://test.makos.top/1.png" alt="Brza dostava logo" height="55" /> -->

                    <!--second menu -->
                    <?php  /* menu */
                    		wp_nav_menu( array(
                                'menu'              => 'footer_menu',
                                'theme_location'    => 'footer_menu',
                                'depth'             => 1,
                                'container'         => 'ul',
                                // 'container_class'   => 'footer__menu',
								'menu_class'        => 'footer__menu',
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
    							'walker'          => new WP_Bootstrap_Navwalker(),
                           )
                    ); 
                 ?>

                    <?php include 'radio.php' ; ?>
                </div>
            </div>

            <div class="col-lg-5 col-md-3 col-sm-3 col-6">
                <div class="footer__input">
                    <div class="input-group input-group-sm mb-2">
                        <!-- new -->
                        <!-- Begin Mailchimp Signup Form -->

                        <form
                            action="https://gmail.us17.list-manage.com/subscribe/post?u=ae8b1d7dd191cfe2f6aefa019&amp;id=51552b21a1"
                            method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                            class="validate" target="_blank" novalidate>


                            <input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL"
                                placeholder="Vaš e-mail" required>

                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                                    name="b_ae8b1d7dd191cfe2f6aefa019_51552b21a1" tabindex="-1" value=""></div>

                            <button class="btn footer__input--btn" type="submit" id="button-addon2">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            </button>

                        </form><br />
                        <p>budite u toku sa nama</p>

                        <!--End mc_embed_signup-->

                    </div>

                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-6">
                <div class="container-sm footer__social">
                    <ul class="row d-flex align-items-center footer__social--list pb-4">

                        
                        <li class="col px-0"><a href="/kontakt"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                        </li>
                        
                        <li class="col px-0"><a href="https://www.facebook.com/brza.dostava/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li class="col px-0">
                            <a href="https://play.google.com/store/apps/details?id=com.tester.tester.poruci&hl=en">
                                <img
                                    src="https://lh3.googleusercontent.com/fLv57-EWIno16OTWhzJc9R8B2dBHEfedNWOenQx3MUigyxialbMD4dAGXIu_CP-6nNOY=s180-rw" />
                            </a></li>
                    </ul>

                
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="container">
        
    
    <div class="row">
        <div class="col">

            <p class="m-0 footer__copy">Copyright &copy; Brza Dostava 2010 - <? echo date(Y);?></p>
        </div>
        <div class="col text-right mr-5 pr-5">
            <span>created by</span>
            <a href="https://purpleby.me/en/">
				<img src="http://media2.brzadostavanaklik.com/2020/08/logo.jpg" alt="purplebyme-logo" height="20"/>
					 
               </a>
        </div>
    </div>
    </div>



    <!-- /.container -->
</footer>
</div>
<!-- #page -->








<script type="text/javascript">
// 

$('body').scrollspy({
    target: '#myNavbar'
})

// 
var modals = document.getElementsByClassName('catNav__basket');
// Get the button that opens the modal
var btns = document.getElementsByClassName("openmodal");
var spans = document.getElementsByClassName("continue");
for (let i = 0; i < btns.length; i++) {
    btns[i].onclick = function() {
        modals[i].style.display = "block";
    }
}
for (let i = 0; i < spans.length; i++) {
    spans[i].onclick = function() {
        modals[i].style.display = "none";
    }
}
// 

/// off canvas
// jQuery.noConflict();
$(function() {
    'use strict'

    $("[data-trigger]").on("click", function() {
        var trigger_id = $(this).attr('data-trigger');
        $(trigger_id).toggleClass("show");
        $('body').toggleClass("offcanvas-active");
    });

    // close if press ESC button 
    $(document).on('keydown', function(event) {
        if (event.keyCode === 27) {
            $(".navbar-collapse").removeClass("show");
            $("body").removeClass("overlay-active");       }
    })

    // close button 
    $(".btn-close").click(function(e) {
        $(".navbar-collapse").removeClass("show");
        $("body").removeClass("offcanvas-active");
    });


})


// radio
var orbp_w = orbp_w || {
    lang: "en-us"
};
orbp_w.cmd = orbp_w.cmd || [];
orbp_w.cmd.push(function() {
    orbp_w.init("orb_player_4f072fc4fa16fbe3");
});
var s, t;
s = document.createElement('script');
s.type = 'text/javascript';
s.src =
    "//ecdn.onlineradiobox.com/js/pwidget2.min.235ca64e.js";
t = document.getElementsByTagName('script')[
    0];
t.parentNode.insertBefore(s, t);
</script>


<?php wp_footer(); ?>
</body>

</html>