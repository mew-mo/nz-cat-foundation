
  <?php get_header(); ?>

    <div class="single-cont mt-5">
      <div class="row">

        <?php
        if ( have_posts() ) :
          while (have_posts() ) : the_post(); ?>
          <div class="col-4">
            <div class="purr-img">
              <?php the_post_thumbnail('medium', ['class' => 'purr-img-thumb']); ?>
            </div>
          </div>
          <div class="col-7 purr-content">
            <h2 style="display:inline;"><?php the_title(); ?></h2>
            <div class="purr-line"></div>
            <p class="card-text"><?php the_content();?></p>
            <a href="<?php echo get_page_link(get_page_by_path('purr-stories'));?>">
            <button type="button" class="btn ncf-btn">Back to Purr Stories</button></a>
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
