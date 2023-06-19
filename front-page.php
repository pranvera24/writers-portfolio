<?php get_header(); 
/*Template Name: Home Page*/
$image = get_field('image');
$picture = $image['sizes']['large'];
$about_img = get_field('about_img');
$publication_details = get_field('publication_details')
?>

<section class="page">
    <div class="container">


        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; else : endif; ?>

        

        <div class="image-section">
            <div class="image-container">
                <img src="<?php echo $picture; ?>" alt="homeimg">
                <div class="quote-overlay">
                    <h2 style="color:whitesmoke;font-weight:bolder;background-color:rgba(0,0,0,0.6);border-radius:5px;padding:5px;font-family: 'Roboto Mono', monospace;">
                    "Words that inspire worlds."</h2>
                    <a href="#portfolio" class="btn">About Me</a>
                </div>
            </div>
        </div>




        <div class="portfolio-section" id="portfolio">
  <div class="container bordered-section">
    <h2 style="color:whitesmoke;padding:10px;font-family: 'Roboto Mono', monospace;">About Me.</h2>
    <div class="row">
      <div class="col-md-3 about-image">
        <img src="<?php echo $picture; ?>" class="about-picture img-fluid rounded border border-white" />
      </div>
      <div class="col-md-6 my-auto">
        <div class="personal-info">
            <h3>- Personal Info. -</h3>
          <h4>Name:</h4>
          <p> Writer's Name</p>
          <h4>Surname:</h4>
          <p>Writer's Surname</p>
          <h4>Age:</h4>
          <p>25</p>
          <h4>Address:</h4>
          <p> 123 Main St, City</p>
          <h4>Phone:</h4>
          <p>123-456-7890</p>
          <h4>Instagram:</h4>
          <p><a href="">@example</a></p>
          <h4>Facebook</h4>
          <p><a href="https://www.facebook.com/">@facebook</a></p>
          <h4>Twitter:</h4>
          <p><a href="">@example</a></p>
          <a href="#writings" class="btn writings-btn" style="color:whitesmoke;border:1px solid whitesmoke;border-radius:10px:font-family: 'Roboto Mono', monospace;">Writings</a>
        </div>
      </div>
      <div class="col-md-3 my-auto">
        <div class="more-info">
            <h3>- More Info. -</h3>
          <h5>Writing Specialties:</h5>
          <p>[Specify your writing specialties here]</p>

          <h4>Education and Certifications:</h4>
          <p>[Specify your education and certifications here]</p>

          <h4>Writing Experience:</h4>
          <p>[Outline your writing experience here]</p>

          <h4>Awards and Recognitions:</h4>
          <ul>
            <li>[Award or Recognition], [Year]</li>
            <li>[Award or Recognition], [Year]</li>
            <li>[Award or Recognition], [Year]</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


        <div class="writings-section" id="writings">
            <div class="container">
                <div class="row">
                    <div class=" writings">
                        <h2 style="color:whitesmoke;padding:25px;font-family: 'Roboto Mono', monospace;">Writing List.</h2>
            <?php
                $shortcode_output = do_shortcode('[display_posts_by_category category="best"]');
                echo $shortcode_output;?>
                <?php if($publication_details):?>
                    <p><?php echo $publication_details;?></p>
                    <?php endif;?>

                </div>
                
                </div>
              
        </div>

    </div>
</section>

<?php get_footer(); ?>
