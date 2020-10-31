@extends('frontend.layoutother')

@section('content')

<?php $setting = get_setting(); ?>
<!-- Section Title -->
            <div class="section_title properties" style="background:<?php echo url("assets/forntend/img/titles/1.jpg"); ?> !important">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-9">
                            <h1>DETAILS PROPERTY
                                <span><a href="{{url('/')}}"><?php echo trans('frontend.Home'); ?> </a> / {{$property->title}}</span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>
            <!-- End Section Title -->

			

<!-- End content info -->
            <section class="content_info" id="printTable">
                <div class="container">
                    <!-- filter-horizontal -->                  
                    <div class="filter_horizontal" id="hide_area">
                        <div class="container">
                            <div class="row">
                                <form action="{{url('listing')}}" type="get">
                                    <div class="col-md-2">
                                        <select name="category">
                                                    <option value="" selected="selected"><?php echo trans('frontend.Category'); ?></option>
                                                     <option value="" ><?php echo trans('frontend.Any'); ?></option>
													 @foreach($categories as $category)
                                                     <option value="{{$category->id}}">{{$category->name}}</option>
													 @endforeach
                                                                      
                                                 </select>
                                    </div>
                                    <div class="col-md-2">                                   
                                        <select name="min">
                                            <option><?php echo trans('frontend.PriceFrom'); ?></option>                                  
														<option value=""><?php echo trans('frontend.Any'); ?></option>
														<option value="10000">10000</option>
														<option value="50000">50000</option>
														<option value="100000">100000</option>
														<option value="200000">200000</option>
														<option value="300000">300000</option>
														<option value="400000">400000</option>
														<option value="500000">500000</option>    
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="max">
                                           <option value=""><?php echo trans('frontend.PriceTo'); ?></option>
                                           <option value=""><?php echo trans('frontend.Any'); ?></option>
														<option value="10000">10000</option>
														<option value="50000">50000</option>
														<option value="100000">100000</option>
														<option value="200000">200000</option>
														<option value="300000">300000</option>
														<option value="400000">400000</option>
														<option value="500000">500000</option>  
														<option value="500000">1000000</option>  
														<option value="500000">2000000</option>  
                                        </select>
                                    </div>
                                    <div class="col-md-2">                                   
                                                  <select name="bed">
														<option value=""><?php echo trans('frontend.Beds'); ?></option>
														<option value=""><?php echo trans('frontend.Any'); ?></option>
														<?php for($i = 1; $i<= 10 ; $i++) { ?>
														<option <?php if (!empty($forms['bed']) and $forms['bed'] == $i) {echo "selected";}?> value="{{$i}}">{{$i}}</option>
														<?php } ?>
														
                                                  </select>
                                    </div>
                                    <div class="col-md-2">
                                       
                                            <select name="bath">
											 <option value=""><?php echo trans('frontend.Bath'); ?></option>
                                           
                                                        <option value=""><?php echo trans('frontend.Any'); ?></option>
														<?php for($i = 1; $i<= 10; $i++) { ?>
														<option <?php if (!empty($forms['bath']) and $forms['bath'] == $i) {echo "selected";}?> value="{{$i}}">{{$i}}</option>
														<?php } ?>
                                                  </select>
                                       
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" class="button" value="<?php echo trans('frontend.Search'); ?>">
                                    </div> 
                                </form>       
                            </div>
                        </div>
                    </div>
                    <!-- End filter-horizontal -->

                    <div class="row padding_top">
                        <div class="col-md-8">
                            <div class="more_slide tooltip_hover">
                                <ul>
                                     <?php /* <li title="Chat Online" data-toggle="tooltip"><i class="fa fa-comment"></i><a href="#">Live chat</a></li>
                                    <li title="Contact Us" data-toggle="tooltip"><i class="fa fa-envelope"></i><a href="#">Contact</a></li>
                                    <li title="favorite propertie" data-toggle="tooltip"><i class="fa fa-star"></i><a href="#">Favorites</a></li>
                                    */?> <li title="Publish info" data-toggle="tooltip"><i class="fa fa-calendar"></i><a href="#">Publish: <?php if(!empty($property->created_at)) { echo time_elapsed_string($property->created_at); } else  { echo "Not Found";  } ?></a></li>
                                </ul>
                            </div>
                            <!-- Slide News-->           
                            <div class="camera_wrap" id="slide_details">
                                <!-- Item Slide -->  
                                <div  data-src="<?php echo url("assets/images/uploads/" . $property->image_name); ?>">
                                    <div class="camera_property fadeFromBottom">
                                        <a href="#"><h4><?php echo $property->title; ?></h4></a>
                                        <h1><span><?php echo $setting->currency; ?></span> <?php echo $property->price; ?></h1>
										           
                                    </div>
                                </div>
                                <!-- End Item Slide -->  
								@foreach($property_photos as $photo) 
                                <!-- Item Slide -->  
                                <div  data-src="<?php echo url("assets/images/uploads/" . $property->id. "/" . $photo->image_name); ?>">
                                    <div class="camera_property fadeFromBottom">
                                        <a href="#"><h4><?php echo $property->title; ?></h4></a>
                                        <h1><span><?php echo $setting->currency; ?></span> <?php echo $property->price; ?></h1> 
										
                                    </div>
                                </div>
                                <!-- End Item Slide --> 
								@endforeach
                            </div>
                            <!-- End Slide-->  
                        </div>
                        <div class="col-md-4">
                            <div class="description">
                                
                                <h4><?php echo $property->title; ?></h4>
                                <ul class="info_details">                          
                                    <li><strong><?php echo trans('frontend.Price'); ?>:</strong><span> <?php echo $setting->currency; ?><?php echo $property->price; ?> </span></li>
                                    <li><strong><?php echo trans('frontend.Category'); ?>:</strong><span><?php echo get_catogory($property->category_id); ?></span></li>
                                    <li><strong><?php echo trans('frontend.Location'); ?>:</strong><span><?php echo $property->city; ?></span></li>
                                    <li><strong><?php echo trans('frontend.Area'); ?>:</strong><span><?php echo $property->area; ?> mt2</span></li>
                                    <li><strong><?php echo trans('frontend.Bath'); ?>:</strong><span><?php echo $property->beds; ?></span></li>
                                    <li><strong><?php echo trans('frontend.Beds'); ?>:</strong><span><?php echo $property->bath; ?></span></li>
                                    <li><strong><?php echo trans('frontend.City'); ?>:</strong><span><?php echo $property->city; ?></span></li>
                                    <li><strong><?php echo trans('frontend.State'); ?>:</strong><span><?php echo $property->state; ?></span></li>
									<li><small><?php echo $property->address; ?></small></li>
                                    
                                </ul>
                            </div>
                        </div> 
                    </div>

                     <!-- Tabs Detail Properties -->
                    <div class="row padding_top">
                        <div class="col-md-12">
                            <!--NAV TABS-->
                            <ul class="tabs"> 
                                <li><a href="#tab1">More Details</a></li> 
                                <li><a href="#tab2">Contact Agent</a></li>                                              
                                                                            
                            </ul>                       
                                        
                            <!--CONTAINER TABS-->   
                            <div class="tab_container"> 
                                <!--Tab1 Genral info-->      
                                <div id="tab1" class="tab_content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>General Features</h4>
                                            <div class="row">
											 
											<?php $property_features = explode(",", $property->features); $i=0;
												 foreach ($features as $list) : 
													if($i%4 == 0) { 
												?>
												<div class="col-xs-12 col-sm-4 col-md-4">
                                                    <ul class="general_info">
													<?php } ?>
															
															<li><?php if(in_array($list->id , $property_features)) { ?> <i style="color:green" class="fa fa-check"> </i> <?php } else { ?> <i style="color:red" class="fa fa-times"></i> <?php } ?>{{$list->name}}</li>
														                  
                                                   <?php if($i%4 == 3) { ?>
												   </ul>
                                                </div>
												   <?php } ?>
													  
												<?php   $i++; endforeach; ?>
												 </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$property->body}}</p>
                                            
                                        </div>
                                    </div>    

                                    <!-- Divisor-->
                                    <div class="divisor">
                                        <div class="circle_left"></div>
                                        <div class="circle_right"></div>
                                    </div>
                                    <!-- End Divisor-->

                                    <!-- Map-->      
                                    <div class="row">   
                                      <div class="col-md-12">
                                          <h4><?php echo trans('frontend.Map'); ?></h4>             
                                          <div class="map_area">
                                             <div id="map" style="width: 100%; height: 400px;"></div>
                                          </div>
                                      </div>
                                    </div>
                                    <!--End  Map-->                 
                                </div>
                                <!--End Tab1 Genral info-->      

                                <!--Tab2 Contact Agent-->      
                                <div id="tab2" class="tab_content">                                                             
                                   <div class="row">
                                        <div class="col-md-6">
                                            <h4>Contact Agent</h4>
                                            <form id="form" action="#">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="<?php echo trans('frontend.Name'); ?>" id="name" name="name" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="email" placeholder="<?php echo trans('frontend.Email'); ?>" id="email"  name="email" required>
                                                    </div>
													
													<div class="col-md-4">
                                                        <input type="text" placeholder="<?php echo trans('frontend.Phone'); ?>" id="phone"  name="phone">
                                                    </div>
                                                </div>
                                                <textarea placeholder="<?php echo trans('frontend.Message'); ?>" id="message" name="message" required></textarea>
                                                <input type="button" id= "SendRequestContact" name="Submit" value="<?php echo trans('frontend.MessageSend'); ?>" class="button">
                                            </form>  
                                            <div style="color:red" id="form_close"> </div>
                                        </div>
										
           
			<?php
				
                $external_link = asset("assets/images/profile/" . $property->agent_id . ".jpg");
                ;
                if (@getimagesize($external_link)) {
                    $photo = asset("assets/images/profile/" . $property->agent_id . ".jpg");
                } else {
                    $photo = url("assets/avatars/profile-pic.jpg");
                }
             
                ?>
			
                                        <div class="col-md-6">                                
                                             <div class="row item_agent">
                                                <div class="col-md-5 image_agent">
                                                    <img src="<?php echo $photo; ?>" alt="Image">
                                                </div>
                                                <div class="col-md-6 info_agent">
                                                    <h5><?php if(!empty($agent->name)) echo $agent->name ?> </h5>
                                                    <ul>
                                                        <li><i class="fa fa-envelope"></i><?php if(!empty($agent->email)) echo $agent->email ?></li>
                                                        <li><i class="fa fa-mobile-phone"></i> <?php if(!empty($agent->phone)) echo $agent->phone ?></li>
                                                    </ul>                                        
                                                </div>
                                             </div>
                                            
                                        </div>
                                   </div>        
                                </div>
                                <!--End Tab2 Contact Agent-->      

                                
                                <!--End Tab3 commnets--> 
                            </div> 
                            <!--END CONTAINER TABS-->
                        </div>
                    </div>
                     <!-- Tabs Detail Properties -->

                    <!-- Content Carousel Properties -->
                    <div class="content-carousel">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Title-->
                                <div class="titles">
                                    <h1><?php echo trans('frontend.RelatedProperties'); ?></h1>
                                </div>
                                <!-- End Title-->
                            </div>
                        </div>

                        <!-- Carousel Properties -->
                        <div id="properties-carousel" class="properties-carousel">
                            <!-- Item Property-->
							
							 <?php
    if (!empty($property->related)) {
        $property_related = explode(",", $property->related);

        for ($i = 0; $i < count($property_related); $i++) {
            $rel_prop = get_property($property_related[$i]);
			if(!empty($rel_prop)) { 
            ?>
			
	
			
                            <div class="item_property">
                                <div class="head_property">
                                  <a href="<?php echo url("property/" . $rel_prop->id . "/" . clean($rel_prop->title)); ?>">
                                    <div class="title <?php if ($rel_prop->type == "SALE") { ?> sale <?php } else { ?> rent <?php } ?>"></div>
                                    <img src="<?php echo url("/assets/images/uploads/" . $rel_prop->image_name); ?>" alt="Image">
									<h5>{{$rel_prop->title}}</h5>
                                  </a>
                                </div>                        
                                <div class="info_property">                                  
                                    <ul>
                                        <li><strong><?php echo trans('frontend.Place'); ?> </strong><span>{{$rel_prop->city}} , {{$rel_prop->state}}</span></li>
                                        <li><strong><?php echo trans('frontend.Price'); ?></strong><span>{{$setting->currency}}{{$rel_prop->price}}</span></li>
                                    </ul>                                 
                                </div>
                            </div>
                            <!-- Item Property-->
							
			<?php } } } ?>

                            
                        </div>
                        <!-- End Carousel Properties -->
                    </div>
                    <!-- End Content Carousel Properties -->
                </div>
            </section>
            <!-- End content info-->
			

<script src="http://maps.google.com/maps/api/js?key=AIzaSyBRy4cuNgPMeS5sDUj8rZ8Ql4_BkMMf4TM&language=<?php echo trans('frontend.GoogleMapLanguage'); ?>" 
type="text/javascript"></script>
<script type="text/javascript">
var locations = [
    ['<?php echo $property->title; ?>', <?php echo $property->latitude; ?>, <?php echo $property->longitude; ?>]
];

var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: new google.maps.LatLng(<?php echo $property->latitude; ?>, <?php echo $property->longitude; ?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});

var infowindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
    });

    google.maps.event.addListener(marker, 'click', (function (marker, i) {
        return function () {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
        }
    })(marker, i));
}
</script>


<script type="text/javascript">

    $("body").on("click", "#SendRequestContact", function () {
		msg = "";
		if($("#name").val() == "") { 
			msg += "Name is Required \n";
		}
		
		if($("#email").val() == "") { 
			msg += "Email is Required \n";
		}
		
		if($("#message").val() == "") { 
			msg += "Message is Required \n";
		}
		
		if(msg) { 
			alert(msg);
			return false;
		}
        var form_data = {
            property_id: <?php echo $property->id; ?>,
            name: $("#name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            message: $("#message").val()
        };
        $.ajax({
            type: 'POST',
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("/send_request"); ?>',
            data: form_data,
             complete: function(msg) { 
                    $("#form_close").html("<?php echo trans('frontend.ContactThankYou'); ?>");
					$("#name").val("");
					$("#email").val("");
					$("#phone").val("");
					$("#message").val("");
                  
            },
            
            success: function (msg) {
                if (msg != "") {
                    $("#form_close").html("Thank you for Contact With Us. We Will contact back you soon");
                }
            }
        });

    });




</script>


<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>


@endsection
