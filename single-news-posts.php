
  <?php get_header(); ?>

    <div class="single-cont mt-5">
      <div class="row">

        <?php
        if ( have_posts() ) :
          while (have_posts() ) : the_post(); ?>
          <div class="col-4">
            <div class="purr-img">
              <?php the_post_thumbnail('medium', ['class' => 'news-thumb']); ?>
            </div>
          </div>
          <div class="col-7 news-content">
            <h2 style="display:inline;"><?php the_title(); ?></h2>
            <div class="purr-line"></div>
            <p class="date-posted"><?php
            echo get_the_term_list($post->ID, 'tags', '', ' ', '');
            ?> • Posted: <?php echo get_the_date('F j, Y');?> <?php the_time();?></p>

            <p><?php
            echo get_the_term_list($post->ID, 'news-type', '<div class="news-tag">', ' ', '</div>');
            ?></p>
            <p class="card-text"><?php the_content();?></p>
            <a href="<?php echo get_page_link(get_page_by_path('news'));?>" class="btn ncf-btn ncf-sub-btn btn-hov-effect">Back to News</a>
          </div>
          <?php endwhile;
            else : echo '<p> 404: Post Not Found :( </p>';
          endif
          ?>
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  <?php get_footer(); ?>
</html>
