<?php get_header(); ?>

<div class="hero-img">
  <img src="<?php bloginfo('stylesheet_directory');?>/img/paws.svg" alt="pawprint divider" class="big-paws">
  <div class="caption">
    <h1 class="title">New Zealand Cat Foundation</h1>
    <h2 class="subtitle">Helping the Helpless</h2>
    <a href="<?php echo get_page_link(get_page_by_path('help-us'));?>" style="color:white;"> <br>
    <button type="button" class="btn ncf-btn">Help Them</button></a>
  </div>
</div>
<!-- hero ends -->

<div class="content-wrapper">
  <!-- container starts -->
  <div class="container">
    <!-- you make a difference section -->
    <div class="fp-intro row">

      <div class="intro-txt row justify-content-center">
        <div class="line"></div>
        <h2>You make a difference</h2>
        <div class="line"></div>
        <p>
          There are so many abandoned and unwanted cats and kittens in our Auckland communities. Our aim is to de-sex, vaccinate, and microchip every stray cat in the hope that one day each of them will have a loving home.
          <br><br>

          We are committed to educating the community, particularly New Zealand youth. Education of our new generation is paramount, teaching our young people to embrace their responsibility to care for their cats. Our stance is that we do not have a "cat problem"; we have a "people problem".
          <br><br>

          We offer a sanctuary to unwanted stray cats in a protected environment where all their needs are met in an indoor/outdoor environment.
        </p>
      </div>
      <!-- intro txt ends -->

      <?php
      query_posts(
        array(
          'post_type' => 'shortcuts'
        )
      );
      // checks what the posts are. make sure they MATCH
      ?>

      <div class="intro-hotlinks row" style="height:300px;">

        <?php
        if ( have_posts() ) :
          while (have_posts() ) : the_post(); ?>

        <div class="col-md-4 col-sm-12">
          <div class="hotlink-img-wrapper">
              <?php the_post_thumbnail('small', ['class' => 'hotlink-img']);?>
          </div>
          <svg viewBox="0 0 500 500" class="curve-wrap">
              <path id="curve" d="M 50 250 A 80 50 0 1 1 300 350"/>
              <text width="500" class="hotlink-txt">
                <textPath xlink:href="#curve">
                  <?php the_title();?>
                </textPath>
              </text>
          </svg>
        </div>
        <?php endwhile;
        else : echo '<p> Shortcuts have not been created. </p>';
        endif
        ?>
      </div>
      <!-- intro hotlinks ends -->

    </div>
    <!-- make a difference section ends -->

    <!-- community benefits section -->
    <div class="fp-benefits row">
      <h3>Community Benefits</h3>
    </div>
    <!-- community benefits section ends -->

    <!-- our mission section -->
    <div class="fp-mission row">
      <h3>Our Mission</h3>
    </div>
    <!-- our mission section ends -->

  </div>
  <!-- container ends -->
</div>
<!-- content wrapper ends -->

<?php get_footer(); ?>
