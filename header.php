<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="<?php bloginfo('charset');?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
		<script src="https://use.fontawesome.com/df1b5d1b28.js"></script>
		<title><?php bloginfo('name');?></title>
	</head>

  <!-- NAV  -->
	<nav class="navbar navbar-expand-lg">

		<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="
			<?php
			$logo = get_theme_mod('custom_logo');
        if ($logo) {
           echo $logo;
        } else {
				  bloginfo('stylesheet_directory');?>/img/logo.svg<?php
				}?>" alt="NZ Cat Foundation Logo" id="logo"></a>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php $menu_args = ['theme_location' => 'primary', 'menu_class' => 'navbar-nav']; ?>
				<?php wp_nav_menu($menu_args); ?>
			</ul>
		</div>
	</nav>
  <!-- ENDNAV  -->

	<script>
		var menuItems = document.querySelector('#menu-main-menu').children;

		for (var i = 0; i < menuItems.length; i++) {
			menuItems[i].classList.add('nav-item');
			menuItems[i].children[0].classList.add('nav-link');
			if (menuItems[i].children[0].innerHTML != 'Help Us') {
				menuItems[i].children[0].innerHTML += '<img src="<?php bloginfo('stylesheet_directory');?>/img/single-paw.svg" alt="pawprint" class="nav-paw">';
			}
		}

	</script>

 	<!-- starting the body -->
  <body <?php body_class(); ?>>
  <!-- For adding classes to the body that you can target with css, will change from page to page -->

  <?php wp_head(); ?>
  <!-- Links the styles -->
