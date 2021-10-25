<?php
get_header();
?>

<!-- https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/ -->

<div class="container mt-5">
  <div class="row">
    <div class="col">
      <?php woocommerce_content();?>
      <!-- wp content -> plugins -> woocommerce -> templates -->
      <!-- templates is a list ofall the things u can change on woocommerce -->
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
