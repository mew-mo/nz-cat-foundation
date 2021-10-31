<?php get_header(); ?>

<div class="hero-img">
  <img src="<?php bloginfo('stylesheet_directory');?>/img/paws.svg" alt="pawprint divider" class="big-paws">
  <div class="caption">
    <h1 class="title"><?php echo get_theme_mod('nzcf_title');?></h1>
    <h2 class="subtitle"><?php echo get_theme_mod('nzcf_tagline');?></h2>
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
        <h2><?php echo get_theme_mod('intro_title');?></h2>
        <div class="line"></div>
        <p><?php echo get_theme_mod('intro_content');?></p>
      </div>
      <!-- intro txt ends -->

      <?php
      query_posts(
        array(
          'post_type' => 'shortcuts'
        )
      );
      ?>

      <div class="intro-hotlinks row" style="height:300px;">

        <?php
        if ( have_posts() ) :
          while (have_posts() ) : the_post(); ?>

        <div class="col-md-4 col-sm-12">
            <div class="hotlink-img-wrapper">
                <?php the_post_thumbnail('small', ['class' => 'hotlink-img']);?>
            </div>
            <h2 class="hidden-title"><?php the_title();?></h2>
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

  </div>
  <!-- container ends -->
</div>
<!-- content wrapper ends -->

<?php get_footer(); ?>
