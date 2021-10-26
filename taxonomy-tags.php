<?php

get_header(); ?>

<div class="container mt-5">
  <h3>
    Showing results for
    <span class="news-taxonomy-tag">
    <?php
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    echo $term->name;
    ?>
    </span>
  </h3>

  <a href="<?php echo get_page_link(get_page_by_path('news'));?>" class="back-link">Back to all news</a>

  <div class="row">

    <?php
    if ( have_posts() ) :

      while (have_posts() ) : the_post(); ?>
      <!-- this is where it loops over each post -->
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
              echo get_the_term_list($post->ID, 'tags', '<div style="display:inline;">', ' ', '</div>');
              ?> • Posted: <?php echo get_the_date('F j, Y');?> <?php the_time();?></p>

              <?php
              echo get_the_term_list($post->ID, 'news-type', '<div class="news-tag">', ' ', '</div>');
              ?></p>
              <hr>
              <p class="card-text"><?php the_excerpt();?></p>
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
