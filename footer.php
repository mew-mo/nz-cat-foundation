<?php wp_footer(); ?>
<br><br>
<footer class="text-center">
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Pages</h5>
          <?php wp_list_pages(); ?>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Find Us</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!">PH: 09 412 2636</a>
            </li>
            <li class="social-icons">
              <a href="https://www.instagram.com/the_nz_cat_foundation/?hl=en" class="text-white"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="https://www.facebook.com/thenzcatfoundation/" class="text-white"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            </li>
            <li>
            </li>
            <li>
              <!-- <a href="#!" class="text-white">Link 4</a> -->
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Sponsors</h5>

          <ul class="list-unstyled mb-0">
            <li class="sponsor-item">
              <a href="https://www.nsdemolition.co.nz/" class="text-white sponsor-link"><img src="<?php bloginfo('stylesheet_directory');?>/img/nsd.png" alt="North Shore Demolition Logo" class="sponsor-img"></a>
            </li>
            <li class="sponsor-item">
              <a href="https://www.007law.co.nz/" class="text-white sponsor-link"><img src="<?php bloginfo('stylesheet_directory');?>/img/wittenhannah.png" alt="Witten-Hannah Howard Barristers & Solicitors Logo" class="sponsor-img"></a>
            </li>
            <li class="sponsor-item">
              <a href="https://www.utopia.co.nz/" class="text-white sponsor-link"><img src="<?php bloginfo('stylesheet_directory');?>/img/utopia.png" alt="Utopia Logo" class="sponsor-img"></a>
            </li>
            <li class="sponsor-item">
              <a href="https://www.leadingit.co.nz/" class="text-white sponsor-link"><img src="<?php bloginfo('stylesheet_directory');?>/img/leadingIT.png" alt="Leading IT New Zealand Logo" class="sponsor-img"></a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright
    <a href="https://mdbootstrap.com/">NZ Cat Foundation</a>
  </div>
  <!-- Copyright -->
</footer>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>

<script>
  // getting rid of the 'pages' marker that shows up when using wp_list_pages
  document.querySelector('.pagenav').childNodes[0].data = '';
</script>
</html>
