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

          <!-- NOTE: look further into this, see if there are better ways to organise and arrange it...,, -->

          <!-- <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul> -->
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
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
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
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
