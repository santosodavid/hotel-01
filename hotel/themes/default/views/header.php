<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo (!empty($seo_title)) ? $seo_title . ' - ' : '';
echo $this->config->item('company_name'); ?>
</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?php if (isset($meta)): ?>
<?php echo $meta; ?>
<?php else: ?>
<meta name="Keywords" content="Shopping Cart, eCommerce, Code Igniter">
<meta name="Description"
	content="Go Cart is an open source shopping cart built on the Code Igniter framework">
<?php endif; ?>

<?php echo theme_css('bootstrap.min.css', true); ?>
<?php echo theme_css('bootstrap-responsive.min.css', true); ?>
<?php echo theme_css('hotel.css', true); ?>
<?php echo theme_css('hotel-responsive.css', true); ?>


<?php echo theme_css_custom('assets/js/slider/default.css', true); ?>
<?php echo theme_css('nivo-slider.css', true); ?>
<?php echo theme_css('socialcount-with-icons.css', "screen"); ?>

<?php echo theme_css('examples-offline.css', "screen"); ?>
<?php echo theme_css('kendo.common.min.css', "screen"); ?>
<?php echo theme_css('kendo.rtl.min.css', "screen"); ?>
<?php echo theme_css('kendo.default.min.css', "screen"); ?>

<style>
div.ui-datepicker {
	font-size: 11px;
}
</style>
</head>

<body>
	<div class="container-fluid">
		<div class="row-fluid" style="padding: 5px; border-bottom: 1px solid #d4d4d4;">
			<!-- start header -->
			<div class="span5">
				<a href="index.html">
					<div class="span8">
						<img alt="Hotel 01"
							src="hotel/themes/default/assets/img/logo-hotel01.jpg">
					</div>
				</a>
			</div>
			<div class="span6 pull-right main_menu">
				<div class="navbar">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse"
							data-target=".nav-collapse"> <span class="icon-bar"></span> <span
							class="icon-bar"></span> <span class="icon-bar"></span>
						</a>

						<div class="nav-collapse">
							<ul class="nav nav-pills">
								<li <?php echo ($active == "Home") ? "class='active'" : ""; ?>><a
									href="home">Home</a></li>
								<li <?php echo ($active == "Rooms") ? "class='active'" : ""; ?>><a
									href="rooms">Rooms</a></li>
								<li
								<?php echo ($active == "Facilities") ? "class='active'" : ""; ?>><a
									href="facilities.html">Facilities</a></li>
								<li
								<?php echo ($active == "Gallery") ? "class='active'" : ""; ?>><a
									href="gallery.html">Gallery</a></li>
								<li <?php echo ($active == "Map") ? "class='active'" : ""; ?>><a
									href="map.html">Map</a></li>
								<li <?php echo ($active == "Book") ? "class='active'" : ""; ?>><a
									href="bookstart">Book</a></li>
							</ul>
						</div>
						<!-- /.nav-collapse -->
					</div>
				</div>
				<!-- /navbar -->
			</div>
		</div>
		<!-- end header -->
		<?php
		/*
		 End header.php file
		*/