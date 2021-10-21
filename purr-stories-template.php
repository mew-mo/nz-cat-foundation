<?php

/*

Template Name: Purr Stories Template

*/

?>

<?php

query_posts(
  array(
    'post_type' => 'purr-stories'
  )
);
?>

<?php

get_header(); ?>

<div class="container mt-5">
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>

  <div class="row">
<?php
if ( have_posts() ) : $postcount = 0;
// the : defines whats going to happen AFTER

  while (have_posts() ) : the_post();
    $postcount++;

    if ($postcount == 1) {
    ?>
  <div class="col-4">
    <a href="<?php the_permalink();?>">
      <div class="hotlink-img-wrapper">
        <?php the_post_thumbnail('medium_large', ['class' => 'hotlink-img']); ?>
      </div>
        <h5><?php the_title(); ?></h5>
      </a>
    </div>
  <?php
}  //closing bracket for the if statement that is at the beginning of this codeblock. IT IS IMPORTNANT
  else {
    ?>
    <!-- else-> all of the normal posts show! -->
    <div class="col-4">
      <a href="<?php the_permalink();?>">
        <div class="hotlink-img-wrapper">
          <?php the_post_thumbnail('medium_large', ['class' => 'hotlink-img']); ?>
        </div>
          <h5><?php the_title(); ?></h5>
        </a>
      </div>
    <?php
  } // END OF ELSE
  endwhile;
    else : echo '<p> No stories have been made! </p>';
  endif
  ?>

</div>
  <!-- end row -->

</div>
<!-- end container -->


  <?php get_footer(); ?>
</html>
