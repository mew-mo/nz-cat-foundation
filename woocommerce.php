<?php
get_header();
?>

<div class="container mt-5">
  <div class="row">
    <div class="col">
      <?php woocommerce_content();?>
    </div>
  </div>
</div>

<script>
  if (document.querySelector('.page-title')) {
    document.querySelector('.page-title').innerHTML += ' - Ways to Donate';
  }
</script>

<?php
get_footer();
?>
