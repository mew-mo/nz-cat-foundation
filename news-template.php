<?php

/*

Template Name: NZCF News Posts Template

*/

?>

<?php

query_posts(
  array(
    'post_type' => 'news-posts'
  )
);
// checks what the posts are. make sure they MATCH
?>

<?php

get_header(); ?>

<div class="container mt-5">
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>

  <div class="row">

<?php
if ( have_posts() ) :

  while (have_posts() ) : the_post(); ?>
  <!-- this is where it loops over each post -->
  <div class="col-4 mt-5">
    <div class="news-card">
      <div class="card" style="width: 100%;">
        <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top']); ?>
        <!-- 1st arg is img size -->
        <!-- 2nd arg is an array of attributes -->
        <div class="card-body">
          <h4 class="card-title">
          <a href="<?php the_permalink();?>">
            <?php the_title(); ?></h4>
          </a>
          <p class="date-posted">Posted: <?php echo get_the_date('F j, Y');?> <?php the_time();?></p>

          <?php
          echo get_the_term_list($post->ID, 'news-type', '<div class="news-tag">', ' ', '</div>');
          ?></p>
          <hr>
          <p class="card-text"><?php the_content();?></p>
          <a href="<?php the_permalink();?>" style="color:white;"><button type="button" class="btn ncf-sub-btn">Read more</button></a>
        </div>
      </div>
    </div>
  </div>
  <?php endwhile;
    else : echo '<p> There are no news posts! </p>';
  endif
  ?>

  </div>
  <!-- end row -->

</div>
<!-- end container -->

  <?php get_footer(); ?>
</html>
