<?php
/**
 * The template for displaying the footer.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<footer>
<!-- <a class='cta-button parallelogram blue' href="#"><span class='skew-fix'>Learn More</span></a>
<a class='cta-button parallelogram red' href="#"><span class='skew-fix'>Learn More</span></a> -->
    <div class="container flex">
    
        <div class="grid4 brand">
            <?php if (get_field('logo', 'option')) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo the_field('logo', 'option'); ?>" class="logo" alt="BOH Solutions logo" /></a>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_option( 'blogname' ); ?></a>
            <?php endif; ?>
        </div>
        <div class="grid6 links flex">
            <?php wp_nav_menu(array('theme_location' => 'footer_column_1', 'menu_class' => 'sitemap', 'container' => false, 'depth' => '1')); ?>
            <?php wp_nav_menu(array('theme_location' => 'footer_column_2', 'menu_class' => 'sitemap', 'container' => false, 'depth' => '1')); ?>
            <?php wp_nav_menu(array('theme_location' => 'footer_column_3', 'menu_class' => 'sitemap', 'container' => false, 'depth' => '1')); ?>
        </div>
    </div>
    <div class="bottom">
   
       
    
    
        <div class="container flex">
       
                <div class="center copyright">
                
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/patents.png" alt="Patents" />
                    <a href="/privacy">
                        © <?php echo date("Y"); ?> BOH Environmental, LLC
                    </a>
                </div>
            
        </div>
    </div>
</footer>

<div class="windowtop"></div>

<?php wp_footer(); ?>
<!-- Google Tag Manager (noscript) -->

<!-- End Google Tag Manager (noscript) -->
<script src="<?php echo get_template_directory_uri();?>/assets/js/aos.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/owl.carousel.min.js"></script>
<?php if ( is_front_page() ) : ?>
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                items:1,
                autoHeight:true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                loop: true,
            });
        });
    </script>
<?php elseif (is_singular('products')) : // condition for single-products.php ?>
    <script>
        $(document).ready(function(){
            var $owl = $('.owl-carousel.product').owlCarousel({
                items:1,
                autoHeight:true,
                autoplay:false,
                dots:true,
                // autoplayTimeout:5000,
                // autoplayHoverPause:true,
                mouseDrag: $('#tanPhotos .file-item img').length > 1 ? true : false,
                touchDrag: $('#tanPhotos .file-item img').length > 1 ? true : false,
                loop: $('#tanPhotos .file-item img').length > 1 ? true : false, // $('.file-item img').length > 1 ? true : false
                // loop: true,
            });
            var $owl2 = $('.owl-carousel.product-alt').owlCarousel({
                items:1,
                autoHeight:true,
                autoplay:false,
                dots:true,
                // autoplayTimeout:5000,
                // autoplayHoverPause:true,
                mouseDrag: $('#greenPhotos .file-item img').length > 1 ? true : false,
                touchDrag: $('#greenPhotos .file-item img').length > 1 ? true : false,
                loop: $('#greenPhotos .file-item img').length > 1 ? true : false,
                // loop: true,
            });
            var $owl3 = $('.owl-carousel.product-alt-v2').owlCarousel({
                items:1,
                autoHeight:true,
                autoplay:false,
                dots:true,
                // autoplayTimeout:5000,
                // autoplayHoverPause:true,
                mouseDrag: $('#grayPhotos .file-item img').length > 1 ? true : false,
                touchDrag: $('#grayPhotos .file-item img').length > 1 ? true : false,
                loop: $('#grayPhotos .file-item img').length > 1 ? true : false,
                // loop: true,
            });
            
            // Color button photo toggle on product details
            var $aDiv = $('#tanPhotos');
            var $bDiv = $('#greenPhotos');
            var $aBtn = $('#toggleTan');
            var $bBtn = $('#toggleGreen');

            // $aDiv.hide();
            $aBtn.prop("disabled",true);
            $bDiv.hide();

            $aBtn.click(function(){
                $aDiv.toggle(function(){
                    // window.dispatchEvent(new Event('resize'));
                    $owl.trigger('refresh.owl.carousel');
                    $owl2.trigger('refresh.owl.carousel');
                    if($aDiv.is(":visible")){
                        $aBtn.prop("disabled",true);
                        $bBtn.prop("disabled",false);
                    } else {
                        $aBtn.prop("disabled",false);
                        $bBtn.prop("disabled",true);	
                    }
                });
                $bDiv.toggle(function(){
                    // window.dispatchEvent(new Event('resize'));
                    $owl2.trigger('refresh.owl.carousel');
                    $owl.trigger('refresh.owl.carousel');
                    if($bDiv.is(":visible")){
                        $bBtn.prop("disabled",true);
                        $aBtn.prop("disabled",false);
                    } else {      
                        $bBtn.prop("disabled",false);
                        $aBtn.prop("disabled",true);
                    }
                });
            });

            $bBtn.click(function(){
                $bDiv.toggle(function(){
                    // window.dispatchEvent(new Event('resize'));
                    $owl.trigger('refresh.owl.carousel');
                    $owl2.trigger('refresh.owl.carousel');
                    if($bDiv.is(":visible")){
                        $bBtn.prop("disabled",true);
                        $aBtn.prop("disabled",false);
                    } else {      
                        $bBtn.prop("disabled",false);
                        $aBtn.prop("disabled",true);
                    }
                });
                $aDiv.toggle(function(){
                    // window.dispatchEvent(new Event('resize'));
                    $owl.trigger('refresh.owl.carousel');
                    $owl2.trigger('refresh.owl.carousel');
                    if($aDiv.is(":visible")){
                        $aBtn.prop("disabled",true);
                        $bBtn.prop("disabled",false);
                    } else {
                        $aBtn.prop("disabled",false);
                        $bBtn.prop("disabled",true);	
                    }
                });
            });
            // END color button photo toggle on product details
        });
    </script>
<?php endif; ?>
</body>
</html>