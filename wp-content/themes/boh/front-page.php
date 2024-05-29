<?php
/**
 * The blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
?>
<div id="main-content">
<!-- Top Slideshow -->
    <?php while( the_repeater_field('slideshow') ): ?>
        <?php while(the_repeater_field('slideshow1')): ?>
            <div class="hero-set">
                <div class="owl-carousel owl-theme">
                        <div class="slide first">
                            <div class="set flex">
                            
                                <img src=<?php the_sub_field('slide_one'); ?> />
                            
                            </div>
                        </div>
                        <div class="slide second">
                            <div class="set flex slide2">
                            
                                <img src=<?php the_sub_field('slide_two'); ?> />
                                
                            
                            </div>
                        </div>
                        <div class="slide third">
                            <div class="set flex slide2">
                            
                                <img src=<?php the_sub_field('slide_three'); ?> />
                            
                                
                            </div>
                        </div>
                </div>
                <div class='cs-subtitle'>
                    <h1>
                    BOH Portable Storage & Mission Systems
                    </h1>
                    <h3>
                    When preparedness is non-negotiable
                    </h3>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endwhile; ?>

    <!-- Section One -->
    <section class='section-one' style="background-image: url('wp-content/themes/boh/assets/images/blue-pattern-bg-repeatable.jpg');">
        <div>
            <h1>WHY CHOOSE BOH?</h1>
        </div>

        <div class="section-lists">
            <div class="left">
                <ul>
                    <li>Increase Readiness</li>
                    <li>Enhance Property Accountability & Reduce Pilferage</li>
                    <li>Eliminate Blocking, Bracing and Flatrack Requirements</li>
                    <li>Reduce Inventory Time & Simplify</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li>Reduce Convoy Security and Maintenance</li>
                    <li>Reduce Damage to Containerized Materiel</li>
                    <li>Reduce Container and Material Repair & Replacement</li>
                    <li>No Cost or Obligation Survey</li>
                </ul>
            </div>
        
        </div>

        <div>
            <a class='cta-button parallelogram red' href="/quote"><span class='skew-fix'>Request A Quote</span></a>
        </div>
    </section>

    <!-- Section Two -->
<?php while( the_repeater_field('slideshow') ): ?>
    <section class="section-two">
    <div class="float">
        <div class="tile">
            <div class="hex">
            <img src=<?php the_field('tile_one'); ?> />
                <h1>BOH Storage</h1>
                <h3>Systems</h3>
            </div>
            <!-- Button -->
            <div class="btn">
                <a class='cta-button parallelogram red' href="/storage-systems"><span class='skew-fix'>View Storage Systems</span></a>
            </div>
        </div>

        <div class="tile">
            <div class="hex mission">
            <img src=<?php the_field('tile_two'); ?> />
                <h1>BOH Mission</h1>
                <h3>Systems</h3>
            </div>
            <!-- Button -->
            <div class="btn">
                <a class='cta-button parallelogram red' href="/mission-systems"><span class='skew-fix'>View Mission Systems</span></a>
            </div>
        
        </div>
        
        <div class="tile">
            <div class="hex">
            <img src=<?php the_field('tile_three'); ?> />
                <h1>BOH Parts</h1>
                <h3>& Accessories</h3>
            </div>
            <!-- Button -->
            <div class="btn">
                <a class='cta-button parallelogram red' href="/product-support"><span class='skew-fix'>Request parts & Accessories</span></a>
            </div>
        </div>
    </div>
    </section>
<?php endwhile; ?>

    <!-- Section three -->
<?php if( get_field('image') ): ?>
    <section class="section-three">

        <div class="left">
            <div class="hex-img" style="background-image: url('wp-content/themes/boh/assets/images/boh-hex.png'); background-repeat: no-repeat, no-repeat;">
                <img src=<?php the_field('image'); ?> />
            </div>
        </div>
    
        <div class="right">
        <div class="cs-subtitle">
                    <div>
                    <h1>PRODUCT SUPPORT</h1>
                    <p>
                    BOH is proud to serve those on a mission. Support for our products goes well beyond delivery to include customization consultations as well as on-the-ground training.
                    </p>
                    </div>
                    <div class="btn">
                        <a class='cta-button parallelogram blue' href="/product-support"><span class='skew-fix'>Learn More</span></a>
                    </div>
                
                </div>
        </div>
        
    </section>
<?php endif; ?>

<!-- Bottom Slideshow -->

<?php while( the_repeater_field('slideshow') ): ?>
        <?php while(the_repeater_field('slideshow2')): ?>
       
       <!-- Need to implement slideshow2 class -->
            <div class="slideshow2 owl-carousel owl-theme" id="case-studies">
                    <div class="slide first">
                        <div class="shade">
                            <div class="set flex">
                            
                                <img src=<?php the_sub_field('slide_one'); ?> />
                                <div class='subtitle'>
                                    <h2>Case Study:</h2>
                                    <h1>
                                    VEHICLE SUPPORT                                    </h1>
                                    <h3>
                                    BOH FPU® Sustainment Enabler: MRAP ASL Containerization 
                                    </h3>
                                    <div class="btn">
                                        <a class='cta-button parallelogram red' href="/case_studies/mrap-asl-containerization-the-case-study/"><span class='skew-fix'>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide second">
                        <div class="shade">
                            <div class="set flex">
                            
                                <img src=<?php the_sub_field('slide_two'); ?> />
                                <div class='subtitle'>
                                    <h2>Case Study:</h2>
                                    <h1>
                                    GENERAL WAREHOUSING
                                    </h1>
                                    <h3>
                                    Bins BOH Implementation RIE
                                    </h3>
                                    <div class="btn">
                                        <a class='cta-button parallelogram red' href="/case_studies/general-warehousing"><span class='skew-fix'>Read More</span></a>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="slide third">
                        <div class="shade">
                            <div class="set flex">
                            
                                <img src=<?php the_sub_field('slide_three'); ?> />
                                <div class='subtitle'>
                                    <h2>Case Study:</h2>
                                    <h1>
                                    Expeditionary Storage of Common Core ASL                                    </h1>
                                    <h3>
                                    BOH FPU® Solution Example: Brigade Combat Teams and Combat Aviation Brigades                                    </h3>
                                    <div class="btn">
                                        <a class='cta-button parallelogram red' href="/case-studies/expeditionary-storage-of-common-core-asl"><span class='skew-fix'>Read More</span></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
            </div>
        
        <?php endwhile; ?>
    <?php endwhile; ?>
</div>
<?php
get_footer();


