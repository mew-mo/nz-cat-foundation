<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="<?php bloginfo('charset');?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title><?php bloginfo('name');?></title>
	</head>

  <!-- NAV  -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

		<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php bloginfo('stylesheet_directory');?>/img/logo.svg" alt="NZ Cat Foundation Logo" id="logo"></a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- <ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						About
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Work
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Explore
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact</a>
				</li> -->

				<?php $menu_args = ['theme_location' => 'primary', 'menu_class' => 'navbar-nav']; ?>
				<!-- theme location is the propterty of where itll show up in the menus -->
				<!-- menu class gives a class to the menu -->
				<?php wp_nav_menu($menu_args); ?>
				<!-- takes an array as an argument -->
			</ul>
		</div>
	</nav>
  <!-- ENDNAV  -->

	<script>
		var menuItems = document.querySelector('#menu-main-menu').children;

		for (var i = 0; i < menuItems.length; i++) {
			menuItems[i].classList.add('nav-item');
			console.log(menuItems[i].children);
			menuItems[i].children[0].classList.add('nav-link');
		}
	</script>

 	<!-- starting the body -->
  <body <?php body_class(); ?>>
  <!-- For adding classes to the body that you can target with css, will change from page to page -->

  <?php wp_head(); ?>
  <!-- Links the styles -->
