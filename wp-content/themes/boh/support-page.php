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
                </div>
            </div>
        </div>
    <?php endif; ?>



    <div class="support-section">
        <?php
        $uri = $_SERVER['REQUEST_URI'];
        $path = parse_url($uri, PHP_URL_PATH); // gives "/pwsdedtech"
        $pathWithoutSlash = substr($path, 1);
        // echo $pathWithoutSlash;

        // boh/boh-solutions/ personal path
        if($pathWithoutSlash == "boh/boh-solutions-wp/support/" || $pathWithoutSlash == "support/") : $pathWithoutSlash = "support"; endif;
        if($pathWithoutSlash == "boh/boh-solutions-wp/contact-us/" || $pathWithoutSlash == "contact-us/") : $pathWithoutSlash = "contact-us"; endif;
        if($pathWithoutSlash == "boh/boh-solutions-wp/request-survey/" || $pathWithoutSlash == "request-survey/") : $pathWithoutSlash = "request-survey"; endif;
        if($pathWithoutSlash == "boh/boh-solutions-wp/product-training/" || $pathWithoutSlash == "product-training/") : $pathWithoutSlash = "product-training"; endif;
        if($pathWithoutSlash == "boh/boh-solutions-wp/quote/" || $pathWithoutSlash == "quote/") : $pathWithoutSlash = "quote"; endif;
        if($pathWithoutSlash == "boh/boh-solutions-wp/product-support/" || $pathWithoutSlash == "product-support/") : $pathWithoutSlash = "product-support"; endif;
        if($pathWithoutSlash == "boh/boh-solutions-wp/warranty-claim/" || $pathWithoutSlash == "warranty-claim/") : $pathWithoutSlash = "warranty-claim"; endif;
  

            if( $pathWithoutSlash == "support" && have_rows('tiles') ):
                
                // loop through the rows of data
                while ( have_rows('tiles') ) : the_row();
        ?>
          <a style="text-decoration: none;" class='tile' href="<?php the_sub_field("url"); ?>" >
            
                <div class="hex">
                <div class="title-support">
                <h2><?php echo the_sub_field("text"); ?></h2>
                </div>
                
                </div>
                
            
          </a>
            <?php endwhile; ?>
            <?php endif; ?>

<!-- Title -->
      <?php if( $pathWithoutSlash == "contact-me" ): ?> 
        <h2 class="title">I want someone from BOH to contact me</h2>
        <div class="support-details">
        <p>BOH offers no cost Surveys and Product training to our customers. Surveys and Training can be conducted on-site or remotely. Please contact us for complete details.</p>
        </div>
       
      <?php endif; ?>

      <?php if( $pathWithoutSlash == "request-survey" ): ?> 
        <h2 class="title">I want to request a survey</h2>
        <div class="support-details">
        <p>BOH offers no cost Surveys and Product training to our customers. Surveys and Training can be conducted on-site or remotely. Please contact us for complete details.</p>
        </div>
       
      <?php endif; ?>

      <?php if( $pathWithoutSlash == "product-training" ): ?> 
        <h2 class="title">I want more information about product training</h2>
        <div class="support-details">
        <p>BOH offers no cost Surveys and Product training to our customers. Surveys and Training can be conducted on-site or remotely. Please contact us for complete details.</p>
        </div>
       
      <?php endif; ?>

      <?php if( $pathWithoutSlash == "quote" ): ?> 
        <h2 class="title">I'd like a quote</h2>
        <div class="support-details">
        <p>BOH offers no cost Surveys and Product training to our customers. Surveys and Training can be conducted on-site or remotely. Please contact us for complete details.</p>
        </div>
       
      <?php endif; ?>

      <?php if( $pathWithoutSlash == "product-support" ): ?> 
        <h2 class="title">I need product and parts support</h2>
        <div class="support-details">
        <p>BOH offers no cost Surveys and Product training to our customers. Surveys and Training can be conducted on-site or remotely. Please contact us for complete details.</p>
        </div>
       
      <?php endif; ?>
      <?php if( $pathWithoutSlash == "warranty-claim" ): ?> 
        <h2 class="title">I want to make a Warranty Claim</h2>
        <div class="support-details">
        <p>BOH offers no cost Surveys and Product training to our customers. Surveys and Training can be conducted on-site or remotely. Please contact us for complete details.</p>
        </div>
       
      <?php endif; ?>
    </div>


    <?php if( $pathWithoutSlash != "support" ): ?>

      <?php echo do_shortcode("[forminator_form id='26981']"); ?>

<!-- Form -->
<form
        id="form"
        class="form-input-container"
        action=""
        method="post"
        style="display: none;"
      >
      <div class="container-field">
      <span>Title/Rank</span>
      
      <div class="half">
      <input
          type="text"
          name="Title"
          id="Title"
          
          aria-label="text"
          class="full"
        />
      </div>
      <div class="container-field">
      <div class="half"></div>

      </div>
      </div>

      <div class="half-section">
        <div class="container-field">
        <span>First Name</span>
          <div class="half">
            <input
              type="text"
              name="FirstName"
              id="FirstName"
              
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>
        <div class="container-field">
          <span>Last Name</span>
          <div class="half">
            <input
              type="text"
              name="LastName"
              id="LastName"
              
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>
      </div>
      <div class="half-section">
        <div class="container-field">
        <span>Email</span>
          <div class="half">
            <input
              type="text"
              name="Email"
              id="Email"
              
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>
        <div class="container-field">
          <span>Phone</span>
          <div class="half">
            <input
              type="text"
              name="Phone"
              id="Phone"
              
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>
      </div>

      <div class="half-section">
        <div class="container-field">
        <span>Unit/Organization</span>
          <div class="half">
            <input
              type="text"
              name="Org"
              id="Org"
           
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>


        <?php if( $pathWithoutSlash == "contact-me"  || $pathWithoutSlash == "request-survey"): ?> 
        <div class="container-field">
          <span>Which BOH solution would you like to discuss?</span>
          <div class="half">
            <input
              type="text"
              name="FirstName"
              id="FirstName"
             
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>
        <?php endif; ?>
        <?php if( $pathWithoutSlash == "product-training"): ?> 
        <div class="container-field">
          <span>For which BOH product do you need training?</span>
          <div class="half">
            <input
              type="text"
              name="FirstName"
              id="FirstName"
             
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>
        <?php endif; ?>
        <?php if( $pathWithoutSlash == "quote"): ?> 
        <div class="container-field">
          <span>On which BOH solution would you like a quote?</span>
          <div class="half">
            <input
              type="text"
              name="FirstName"
              id="FirstName"
             
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>
        <?php endif; ?>
        <?php if( $pathWithoutSlash == "product-support"  || $pathWithoutSlash == "warranty-claim"): ?> 
        <div class="container-field">
          <span>Product/part in question?</span>
          <div class="half">
            <input
              type="text"
              name="FirstName"
              id="FirstName"
             
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>
        <?php endif; ?>


      </div>


      <div class="container-field container-field-full">
        <span>Address 1</span>
          <div class="half">
            <input
              type="text"
              name="Address"
              id="Address"
           
              aria-label="text"
              class="full"
              required
            />
          </div>
      </div>
      <div class="container-field container-field-full">
        <span>Address 2</span>
          <div class="half">
            <input
              type="text"
              name="Address"
              id="Address"
           
              aria-label="text"
              class="full"
              required
            />
          </div>
      </div>
      <div class="container-field container-field-full">
        <span>Installation or City</span>
          <div class="half">
            <input
              type="text"
              name="City"
              id="City"
           
              aria-label="text"
              class="full"
              required
            />
          </div>
      </div>
      <div class="half-section">
        <div class="container-field">
        <span>Location</span>
          <div class="half">
            <input
              type="text"
              name="Location"
              id="Location"
           
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>
        <div class="container-field">
          <span>Zip</span>
          <div class="half">
            <input
              type="text"
              name="Zip"
              id="Zip"
             
              aria-label="text"
              class="full"
              required
            />
          </div>
        </div>
      </div>
        <!-- <input
          type="text"
          name="AddressOne"
          id="AddressOne"
          placeholder="Address"
          aria-label="text"
          class="full"
        />
        <input
          type="text"
          name="AddressOne"
          id="AddressOne"
          placeholder="Address"
          aria-label="text"
          class="full"
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
        /> -->
        <!-- <textarea
          type="textbox"
          name="Comments"
          id="comments"
          placeholder="Comments"
          aria-label="text"
          class="one"
        /> -->
        <div class="form-btn" >
          <button class="cta-button parallelogram red" form="contact-form" style="border: none;">
            <span class="skew-fix">Submit</span>
          </button>
        </div>
      </form>

      <?php endif; ?>





      

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
                    <a class='cta-button parallelogram red' href="/user-manuals"><span class="skew-fix">View Manuals</span></a>
                </div>
            </div>
    </section>
    <?php endif ?>
    <?php endwhile ?>




   

    </div>
 
<?php
get_footer();
?>