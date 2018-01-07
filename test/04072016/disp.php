<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Felix Häberle" />
    <meta name="year" content="2016" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Roboto:300,400,700" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />

	<!-- One Page Module Specific Stylesheet -->
	<link rel="stylesheet" href="css/onepage.css" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/et-line.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
	
	<link rel="stylesheet" href="css/fonts.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->


	<!-- Document Title
	============================================= -->
	<title>Mein Stammbaum | Projektarbeit DHBW Karlsruhe</title>
	<link rel="stylesheet" href="TreeStyle.css" type="text/css" />
</head>

<body class="stretched side-push-panel overlay-menu">
	
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header transparent-header static-sticky">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="#" class="standard-logo" data-dark-logo="images/logo.png"><img src="images/logo.png" alt="Stammbaum"></a>
						<a href="#" class="retina-logo" data-dark-logo="images/logo@2x.png"><img src="images/logo@2x.png" alt="Stammbaum"></a>
					</div><!-- #logo end -->
                    
                    <!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="80">
							<li><a href="stammbaum.html" data-href="stammbaum.html"><div>Zurück zur Startseite 🔙</div></a></li>
						</ul>

						<a href="#" id="overlay-menu-close" class="visible-lg-block visible-md-block"><i class="icon-line-cross"></i></a>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->


		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="center page-section">

					<div class="container clearfix">

						<h2 id="impressum" class="divcenter bottommargin font-body" style="max-width: 700px; font-size: 40px;">Ihr Stammbaum</h2>
            
						
							<?php
						
							
								$proc=new XsltProcessor;
								$proc->importStylesheet(DOMDocument::load("http://dhbw-stammbaum.de/test/04072016/Trees.xsl")); //load XSL script
								echo $proc->transformToXML(DOMDocument::load("http://dhbw-stammbaum.de/test/04072016/test2.xml")); //load XML file and echo
							?>
                       
				

				</div>

			</div>
            

		</section><!-- #content end -->

		

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="js/functions.js"></script>

</body>
</html>