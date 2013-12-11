<?php $CI = & get_instance(); ?>
<footer>
	<div class="container">
		<div class="row footer_section_pre">

			<div class="span4">
				<h4>
					<?php 

					echo $CI->config->item('company_name');
					?>
					<span class="line"></span>
				</h4>

				<p>
					<?php 
					echo $CI->config->item('zip').",  ";
					echo $CI->config->item('address1');
					?>
					<!-- 					 2247 Copperhead Road, Hartford, CT 06103</p> -->
				
				
				<p>
					<?php 
					echo "Tel: ".$CI->config->item('telp')."<br />";
					echo "Fax: ".$CI->config->item('fax')."<br />";
					echo "Email: ".$CI->config->item('email');
					?>
					<!-- 					Tel: +860-631-7795<br />Fax: +860-631-7796 <br />Email: -->
					<!-- 					admin@appsarea.com -->
				</p>

				<!-- 				<ul data-facebook-action="recommend" data-url="#" -->
				<!-- 					class="socialcount socialcount-small recommend grade-a"> -->
				<!-- 					<li class="facebook"><a title="Share on Facebook" -->
				<!-- 						href="https://www.facebook.com/sharer/sharer.php?u=#"><span -->
				<!-- 							class="social-icon icon-facebook"></span><span class="count"></span> -->
				<!-- 					</a> -->
				<!-- 					</li> -->
				<!-- 					<li class="twitter"><a title="Share on Twitter" -->
				<!-- 						href="https://twitter.com/intent/tweet?text=#"><span -->
				<!-- 							class="social-icon icon-twitter"></span><span class="count"></span> -->
				<!-- 					</a> -->
				<!-- 					</li> -->
				<!-- 					<li class="googleplus"><a title="Share on Google Plus" -->
				<!-- 						href="https://plus.appsarea.com/share?url=#"><span -->
				<!-- 							class="social-icon icon-googleplus"></span><span class="count"></span> -->
				<!-- 					</a> -->
				<!-- 					</li> -->
				<!-- 				</ul> -->
				<br />
				<p class="copy">
					All content &copy; 2013 <a href="http://hotel-01.com/">Hotel01</a>
				</p>

			</div>
			<div class="span4">
				<h4>
					Special offers<span class="line"></span>
				</h4>
				<p>
					<b>FREE</b> Breakfast, <b>FREE</b> Internet, <b>FREE</b> Tour =
					Savings!
				</p>
				<p>
					Stay five nights and get one night totally <b>FREE</b>!
				</p>
				<p>
					Save up to <b>20% OFF</b> our Best Available Rate by booking with
					us in advance.
				</p>
			</div>
			<div class="span4">
				<h4>
					Sponsors<span class="line"></span>
				</h4>
				<ul class="thumbnails">

					<?php
					$sponsors = array(
                        array("new_window" => "KFC", "image" => "KFC", "link" => "KFC"),
                        array("new_window" => "Mac Donald", "image" => "Mac Donald", "link" => "Mac Donald"),
                        array("new_window" => "BFC", "image" => "BFC", "link" => "BFC")
                    );

                    $array = array(
                        "foo" => "bar",
                        "bar" => "foo",
                    );

                    foreach ($sponsors as $sponsor):
                    //foreach ($sponsor as $item):
                    ?>
					<li class="span2">
						<div class="thumbnail">
							<?php 
							//echo $sponsor['link'];
							//echo theme_img('no_picture.png', lang('no_image_available'));
							?>
						</div>
					</li>



					<?php
					//endforeach;
					endforeach;
					?>
				</ul>
			</div>
		</div>

	</div>


</footer>

<?php echo theme_js('jquery.js', true); ?>
<?php echo theme_js('bootstrap.js', true); ?>

<?php echo theme_js('stringformat.js', true); ?>
<?php echo theme_js('jquery-ui.js', true); ?>
<?php echo theme_js('jquery.nivo.slider.js', true); ?>
<?php echo theme_js('socialcount.min.js', true); ?>
<?php echo theme_js('jquery.quicksand.js', true); ?>
<?php echo theme_js('kendo.web.min.js', true); ?>
<?php echo theme_js('global.js', true); ?>

<script>
    $(document).ready(function() {
        // create Calendar from div HTML element
        $("#calendar").kendoCalendar({
            value: new Date()
        });
    });
</script>
</body>
</html>
