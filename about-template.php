<?php

/*

Template Name: About Us Template

*/

?>

<?php get_header(); ?>
    <div class="container mt-5">
      <div class="row abt-txt">
        <div class="purr-line">
        </div>
        <h2 class="inline"><?php the_title(); ?></h2>
        <div class="purr-line">
        </div>
        <?php the_content(); ?>
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  <?php get_footer(); ?>
</html>
