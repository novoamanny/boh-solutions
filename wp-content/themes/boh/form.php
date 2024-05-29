<?php
/**
 * The blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy/support
 *
 */
/*
* Template Name: support
*/
get_header();
?>
<div id="main-content">
<!-- Hero -->
    <?php if( get_field('hero') ): ?>
        <div class="hero">
            <img src=<?php the_field('hero'); ?> />
            <div class="cs-subtitle">
                <div>
                    <h1>Support for BOH Containers & Expeditionary Solutions</h1>
                    <!-- <h3>
                        BOH Containers. Modular Kits.
                    </h3>
                    <h3>
                        Tailored Solutions.
                    </h3> -->
                </div>
                <!-- <div class="btn">
                    <a class='cta-button parallelogram blue' href="#"><span class='skew-fix'>Learn More</span></a>
                </div>
             -->
            </div>
        </div>
    <?php endif; ?>



    <!-- <div class="support-section">
        <?php
            if( have_rows('tiles') ):
                
                // loop through the rows of data
                while ( have_rows('tiles') ) : the_row();
        ?>
       
            <div class='tile'>
                <div class="hex">
                <h2><?php echo the_sub_field("text"); ?></h2>
                </div>
                
            </div>
        
            <?php endwhile; ?>
        <?php endif; ?>
    </div> -->

<!-- Form -->
<form
        id="form"
        class="form-input-container"
        action="https://formspree.io/f/xoqrqqro"
        method="post"
      >

      <input
          type="text"
          name="Title"
          id="Title"
          placeholder="Title"
          aria-label="text"
          class="half"
        />
      <div class="half-section">
        <input
          type="text"
          name="FirstName"
          id="FirstName"
          placeholder="First Name"
          aria-label="text"
          class="half"
          required
        />
        <input
          type="text"
          name="LastName"
          id="LastName"
          placeholder="Last Name"
          aria-label="text"
          class="half"
          required
        />
      </div>
        <input
          type="text"
          name="Title"
          id="Title"
          placeholder="Title"
          aria-label="text"
          class="onethird"
        />
        <input
          type="text"
          name="Company"
          id="Company"
          placeholder="Company"
          aria-label="text"
          class="twothird"
        />
        <input
          type="text"
          name="Phone"
          id="phone"
          placeholder="(___)"
          aria-label="text"
          class="half"
          required
        />
        <input
          type="email"
          name="Email"
          id="email"
          placeholder="Email"
          aria-label="email"
          class="half"
          required
        />
        <input
          type="text"
          name="Industry"
          id="industry"
          placeholder="Industry"
          aria-label="text"
          class="onethird"
        />
        <input
          type="scroll"
          name="Interest"
          id="interest"
          placeholder="What's Your Interest In"
          aria-label="text"
          class="one"
        />
        <!-- <textarea
          type="textbox"
          name="Comments"
          id="comments"
          placeholder="Comments"
          aria-label="text"
          class="one"
        /> -->
        <button class="cta-button" form="contact-form" value="Submit">
          Submit
        </button>
      </form>

    <!-- Section One -->
    <?php while( the_repeater_field('blue_section') ): ?>
<!-- Map -->
    <?php
        if(get_row_index() % 2 != 0):
    ?>

    <section class='section' style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/blue-pattern-bg-repeatable.jpg');" >

            <div class="left left-img">
            <div>
                <img src=<?php the_sub_field("image") ?> />
            </div>
            </div>

        
            <div class="right text right-text">
                <div class="title">
                    <h1><?php the_sub_field("title") ?></h1>
                </div>
                <p><?php the_sub_field("description") ?></p>
                <div class="btn">
                    <a class='cta-button parallelogram red' href="#"><span class="skew-fix">View Manuals</span></a>
                </div>
            </div>
    </section>
    <?php endif ?>
    <?php endwhile ?>




   

    </div>
 
<?php
get_footer();
?>