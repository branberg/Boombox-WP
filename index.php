<!DOCTYPE html>
<html>
<head>

	<!--
	  ____    ____    ____   __  __  ____    ____ __   __
	 |  _ \  / __ \  / __ \ |  \/  ||  _ \  / __ \\ \ / /
	 | |_) || |  | || |  | || \  / || |_) || |  | |\ V / 
	 |  _ < | |  | || |  | || |\/| ||  _ < | |  | | > <  
	 | |_) || |__| || |__| || |  | || |_) || |__| |/ . \ 
	 |____/  \____/  \____/ |_|  |_||____/  \____//_/ \_\
	                                                                                                                                                 
	  Theme: Boombox, by Branberg (branberg.com)

	-->

	<meta charset="UTF-8">
	<title><?php the_title(); ?></title>
	<link rel="icon" type="image/png" href="library/img/favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Social meta tags -->
	<meta name="description" content="Boombox is a simple, one-page theme that was created specifically for musicians." />
	<meta property="og:title" content="Boombox" />
	<meta property="og:type" content="profile" />
	<meta property="og:url" content="http://www.example.com/" />
	<meta property="og:image" content="http://example.com/image.jpg" />
	<meta property="og:description" content="Boombox is a simple, one-page theme that was created specifically for musicians." />

	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href="library/css/normalize.css" rel="stylesheet" type="text/css" media="all" />
	<link href="library/css/grid.css" rel="stylesheet" type="text/css" media="all" />
	<link href="library/css/main.css" rel="stylesheet" type="text/css" media="all" />

	<link href="library/css/nivo/nivo-lightbox.css" rel="stylesheet" type="text/css" media="all" />
	<link href="library/css/nivo/themes/default/default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="library/css/swipebox/swipebox.css" rel="stylesheet" type="text/css" media="all" />

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<?php wp_head(); ?>

</head>
<body>

	<div id="site_wrap">

		<div id="overlay_color"></div>

		<div id="mobile_header">
			<div id="mobile_menu_toggle">
				<i class="icon-menu"></i>
			</div>
			<span id="mobile_site_title">Boombox</span>
		</div>
		<header id="main_header" class="site_header">
			<div class="wrap">
				<div id="logo_wrap">
					<a href="/" id="logo" class="logo_img"><img src="/library/img/logo.png" alt="Boombox" /></a>
				</div>
				<nav id="header_nav" class="clearfix">
					<ul id="menu_links">
						<li><a href="/music">Music</a></li>
						<li><a href="/shows">Shows</a></li>
						<li><a href="/videos">Videos</a></li>
						<li><a href="/contact">Contact</a></li>
					</ul>
					<ul id="social_links">
						<li class="twitter"><a href="#" target="_blank"><i class="icon-twitter"></i></a></li>
						<li class="facebook"><a href="#" target="_blank"><i class="icon-facebook"></i></a></li>
						<li class="googleplus"><a href="#" target="_blank"><i class="icon-googleplus"></i></a></li>
						<li class="instagram"><a href="#" target="_blank"><i class="icon-instagram"></i></a></li>
						<li class="tumblr"><a href="#" target="_blank"><i class="icon-tumblr"></i></a></li>
						<li class="soundcloud"><a href="#" target="_blank"><i class="icon-soundcloud"></i></a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div id="page_sections">

			<div class="page_section music_section first">
				<div class="wrap">
					<div class="album clearfix">
						<div class="soundcloud_embed">
							<iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/137894105&amp;auto_play=false&amp;hide_related=false&amp;visual=true"></iframe>
						</div>
						<div class="album_info_wrapper">
							<div class="album_info">
								<span class="album_type">Single</span>
								<h3 class="album_title">Day Dreamers</h3>
								<div class="album_description">
									<p>Off the upcomming PACE EP. Listen, Share, and download.</p>
								</div>
								<a href="#" class="album_button" target="_blank">Purchase</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="page_section videos_section">
				<div class="wrap">
					<div class="video_embed">
						<!-- This embed is responsive thanks to Fitvids! http://fitvidsjs.com/ -->
						<iframe width="560" height="315" src="//www.youtube.com/embed/U7svgD2yPig" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>

			<div class="page_section text_section">
				<div class="wrap">
					<div class="text_content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
				</div>
			</div>

			<div class="page_section photos_section">
				<div class="wrap">
					<div class="photo_gallery">
						<ul class="clearfix">
							<li><a href="library/img/photos/full_res/pic01.jpg" class="lightbox" data-lightbox-gallery="homepagephotos"><img src="library/img/photos/pic01.jpg" alt="" /></a></li>
							<li><a href="library/img/photos/full_res/pic02.jpg" class="lightbox" data-lightbox-gallery="homepagephotos"><img src="library/img/photos/pic02.jpg" alt="" /></a></li>
							<li><a href="library/img/photos/full_res/pic03.jpg" class="lightbox" data-lightbox-gallery="homepagephotos"><img src="library/img/photos/pic03.jpg" alt="" /></a></li>
							<li><a href="library/img/photos/full_res/pic04.jpg" class="lightbox" data-lightbox-gallery="homepagephotos"><img src="library/img/photos/pic04.jpg" alt="" /></a></li>
						</ul>
					</div>
				</div>
			</div>

		</div>

		<footer class="site_footer">
			<div class="wrap">
				
				<div class="mailing_list">
					<span class="mailing_list_title">Mailing List</span>
					<form>
						<input type="text" placeholder="Enter your email address" />
						<input type="submit" value="Submit" />
					</form>
				</div>

				<div class="credits">
					<p>&copy; 2014 Boombox - All Rights Reserved</p>
				</div>

			</div>
		</footer>

	</div><!-- / #site_wrap -->

	<?php wp_footer(); ?>

	<script type="text/javascript" src="library/js/imagesloaded.js"></script>
	<script type="text/javascript" src="library/js/jquery.fitvids.js"></script>
	<script type="text/javascript" src="library/js/nivo-lightbox.min.js"></script>
	<script type="text/javascript" src="library/js/jquery.swipebox.min.js"></script>

	<script type="text/javascript" src="library/js/main.js"></script>

</body>
</html>