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
  <div class="col-4 mt-5">
    <div class="news-card">
      <div class="card" style="width: 100%;">
        <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top']); ?>
        <div class="card-body">
          <h4 class="card-title">
          <a href="<?php the_permalink();?>">
            <?php the_title(); ?></h4>
          </a>
          <p class="date-posted"><?php
          echo get_the_term_list($post->ID, 'tags', '', ' ', '');
          ?> • Posted: <?php echo get_the_date('F j, Y');?> <?php the_time();?></p>

          <p><?php
          echo get_the_term_list($post->ID, 'news-type', '<div class="news-tag">', ' ', '</div>');
          ?></p>
          <hr>
          <p class="card-text"><?php the_excerpt();?></p>
          <a href="<?php the_permalink();?>" class="btn ncf-btn ncf-sub-btn btn-hov-effect">Read more</a>
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
