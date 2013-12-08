<?php include('header.php'); ?>
    <div class="row-fluid slideshow-row">
        <div class="span12 slideshow">
            <div class="slider-wrapper theme-default">
                <div class="ribbon"></div>
                <div id="nivoslider-125" class="nivoSlider">
                    <?php
                        foreach($banners as $banner):
                            $banner_image	= '<img src="'.base_url('uploads/'.$banner->image).'" />';
                            if($banner->link)
                            {
                                $target=false;
                                if($banner->new_window)
                                {
                                        $target=' target="_blank"';
                                }
                                echo '<a href="'.$banner->link.'"'.$target.'>'.$banner_image.'</a>';
                            }
                            else
                            {
                                echo $banner_image;
                            }   
                        endforeach;
                    ?>
                </div>
            </div>
            <div id="nivoslider-125-caption-0" class="nivo-html-caption">You can add captions too&#8230;</div>
        </div>
        
        <div id="background" class="calendar-today">
            <div id="calendar"></div>
        </div>

        <style scoped>
            #background {
                width: 254px;
                height: 250px;
                /*margin: 30px auto;*/
                padding: 69px 0 0 11px;
                background: url('<?php echo theme_img('calendar.png'); ?> ') transparent no-repeat 0 0;
            }
            #calendar {
                width: 241px;
            }
        </style>
    </div>
    <div class="row-fluid home">
        <div class="span12">
            <h2>start <span>Booking your room</span><br /> select your dates and options below</h2>
        </div>
    </div>
    <form class="form-inline" />
    <div class="row-fluid home">
        <div class="span3">
<!--            <div class="room_selector" data-price="34" data-adults="1" data-kids="1">
                        <h5><a href="#" class="pull-left"><i class="icon-chevron-left"></i></a>Single room<a href="#" class="pull-right "><i class="icon-chevron-right"></i></a></h5>
                <a href="listings.html"><img src="css/images/rooms/single_room.jpg" alt="" /></a>
                <p>All single rooms have one single bed and sleeps one adult. A 25-inch TV is included.</p>
            </div>-->

        <?php 
            $active_one	= 'display: none;';
            $index=0;
            foreach ($rooms as $item):
                $photo	= theme_img('no_picture.png', lang('no_image_available'));
                $item->images	= array_values($item->images);
            
                if(!empty($item->images[0]))
                {
                        $primary	= $item->images[0];
                        foreach($item->images as $photo)
                        {
                                if(isset($photo->primary))
                                {
                                        $primary	= $photo;
                                }
                        }

                        $photo	= '<img src="'.base_url('uploads/images/small/'.$primary->filename).'" alt="'.$item->seo_title.'"/>';
                }
						 
                $addOns = $index>0?$hide= 'style="display: none;"':'';
                echo '<div class="room_selector" data-price="34" data-adults="1" data-kids="1" '.$addOns.'>
                        <h5><a href="#" class="pull-left"><i class="icon-chevron-left"></i></a>'.$item->name.'<a href="#" class="pull-right "><i class="icon-chevron-right"></i></a></h5>
                        <a href="listings.html">'.$photo.'</a>
                        <p>All single rooms have one single bed and sleeps one adult. A 25-inch TV is included.</p>
                    </div>';
                $index++;
            endforeach;
        ?>
        </div>		
        <div class="span3 home_calendar">
            <div class="form-horizontal">			
                <div class="control-group">
                    <label class="control-label pull-left" for="inputEmail">Arrive</label>
                    <div class="controls">
                        <input type="text" value="" class="span2 check-in-date" value="2012/11/22" />
                    </div>
                </div>
            </div>
            <div class="datepicker_from"></div>
        </div>
        <div class="span3 home_calendar">
            <div class="form-horizontal">			
                <div class="control-group">
                    <label class="control-label pull-left" for="inputEmail">Depart</label>
                    <div class="controls">
                        <input type="text" value="" class="span2 check-out-date" value="2012/11/22" />
                    </div>
                </div>
            </div>
            <div class="datepicker_to"></div>
        </div>

        <div class="span3">
            <div class="form-horizontal">

                <div class="control-group">
                    <label class="control-label" for="inputEmail">Rooms</label>
                    <div class="controls">
                        <select class="span1 select_rooms">
                            <option />1
                            <option />2
                            <option />3
                            <option />4
                            <option />5
                        </select>
                    </div>
                </div>			


                <div class="control-group">
                    <label class="control-label" for="inputEmail">Adults per room</label>
                    <div class="controls">
                        <select class="span1 select_adults">
                            <option />1
                            <option />2
                            <option />3
                            <option />4
                            <option />5
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputEmail">Kids per room</label>
                    <div class="controls">
                        <select class="span1 select_kids">
                            <option />1
                            <option />2
                            <option />3
                            <option />4
                            <option />5
                        </select>
                    </div>
                </div>



            </div>
            <div id="total_price" class="price">128.00 GBP</div>
            <a class="btn btn-primary btn-large book-now" href="book.html">Book now!</a>
        </div>		
    </div>	
</form>
<hr />
<div class="row-fluid">

    <?php foreach($boxes as $box):?>
	<div class="span3">
            <h3><span>R</span>ooms</h3>
		<?php
		
		$box_image	= '<img class="responsiveImage" src="'.base_url('uploads/'.$box->image).'" />';
		if($box->link != '')
		{
			$target	= false;
			if($box->new_window)
			{
				$target = 'target="_blank"';
			}
			echo '<a href="'.$box->link.'" '.$target.' >'.$box_image.'</a>';
		}
		else
		{
			echo $box_image;
		}
		?>
            <p>View our range of availiable rooms and options</p>
	</div>
	<?php endforeach;?>
    
    <!--            <div class="span3">
                    <h3><span>R</span>ooms</h3>
                    <a href="rooms.html"><img src="css/images/rooms.jpg" alt="" /></a>
                    <p>View our range of availiable rooms and options</p>
                </div>		
                <div class="span3">
                    <h3><span>S</span>ervices</h3>
                    <a href="facilities.html"><img src="css/images/services.png" alt="" /></a>
                    <p>We have a gym, swimming pool, golf course, and much more</p>
                </div>		
                <div class="span3">
                    <h3><span>P</span>romotions</h3>
                    <a href="promotions.html"><img src="css/images/promotions.png" alt="" /></a>
                    <p>Stay five nights and get one night totally <b>FREE</b>!</p>
                </div>		
                <div class="span3">
                    <h3><span>L</span>ocation</h3>
                    <a href="map.html"><img src="css/images/location.jpg" alt="" /></a>
                    <p>We're easily accessible - go anywhere quickly.</p>
                </div>		-->
</div>		


<div class="row">
    <div class="span12 what_people_say">
        <div id="quotes">
            <blockquote class="textItem" style="display: none;">
                <p>This is the best hotel I've ever been to.</p>
                <small>Someone famous <cite title="Source Title">Source Title</cite></small>
            </blockquote>			

            <blockquote class="textItem" style="display: none;">
                <p>The food is incredible.</p>
                <small>Someone famous <cite title="Source Title">Source Title</cite></small>
            </blockquote>			

            <blockquote class="textItem" style="display: none;">
                <p>Beyond All Expectations</p>
                <small>Someone famous <cite title="Source Title">Source Title</cite></small>
            </blockquote>
        </div>
    </div>	
</div></div> <!-- /container -->
<?php include('footer.php'); ?>