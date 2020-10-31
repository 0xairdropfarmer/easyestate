@extends('frontend.layoutmap')

@section('content')

<?php $setting = get_setting(); ?>


<div class="content_info">
                <div class="container">
                    <!-- filter-horizontal -->                  
                    <div class="filter_horizontal">
                        <div class="container">
                            <div class="row">
                                <form action="{{url('listing')}}">
                                    <div class="col-md-2">
                                        <select name="category">
                                                    <option selected="selected" value="">-- <?php echo trans('frontend.Category'); ?> --</option>
                                                     <option value=""><?php echo trans('frontend.Any'); ?></option>
													 @foreach($categories as $category)
                                                     <option value="{{$category->id}}">{{$category->name}}</option>
													 @endforeach
                                                                      
                                                 </select>
                                    </div>
                                    <div class="col-md-2">                                     
                                                  <select name="min">
                                                        <option value=""><?php echo trans('frontend.PriceFrom'); ?></option>
														<option value="1000">1000</option>
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
                                                  <select name="min">
                                                        <option value=""><?php echo trans('frontend.PriceTo'); ?></option>
														<option value="10000">10000</option>
														<option value="50000">50000</option>
														<option value="100000">100000</option>
														<option value="200000">200000</option>
														<option value="300000">300000</option>
														<option value="400000">400000</option>
														<option value="500000">500000</option>
														<option value="1000000">1000000</option>    
														<option value="1000000">2000000</option>        
                                                  </select>
                                    </div>
                                    
                                    <div class="col-md-2">                                   
                                        <select  name="bed" class="form-control">
													<option value=""><?php echo trans('frontend.Beds'); ?></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
												</select>
                                    </div>
                                    <div class="col-md-2">
                                        <select  name="bath" class="form-control">
													<option value=""><?php echo trans('frontend.Bath'); ?></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
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
                  <div class="row">
                            <div class="col-md-12">
                    <!-- Content Carousel Properties -->
                    <div class="content-carousel">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Title-->
                                <div class="titles">
                               
                                    <h1><?php echo trans('frontend.FeaturedProperties'); ?></h1>
                                </div>
                                <!-- End Title-->
                            </div>
                        </div>

                        <!-- Carousel Properties -->
                        <div id="properties-carousel" class="properties-carousel">
						 <?php foreach ($properties as $list): $category = get_catogory($list->category_id); ?>
                            <!-- Item Property-->
                            <div class="item_property">
							    <div class="head_property">
                                  <a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>">
                                    <div class="title <?php if ($list->type == "SALE") { ?> sale <?php } else { ?> rent <?php } ?>"></div>
                                    <img src="<?php echo url("/assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>" alt="Image">
									
                                    <h5 style="color:#fff">{{$list->title}}</h5>
                                  </a>
                                </div>                        
                                <div class="info_property">                                  
                                    <ul>
                                        <li><strong><i class="fa fa-map-marker"></i> <?php echo trans('frontend.Place'); ?> </strong><span>{{$list->city}}</span></li>
                                        <li><strong><i class="fa fa-dollar"></i> Price</strong><span><?php echo $setting->currency; ?>{{number_format($list->price)}} </span></li>
										<li><strong><i class="fa fa-umbrella"></i> <?php echo trans('frontend.Beds'); ?> </strong> <span><?php echo $list->beds; ?></span></li>
										<li><strong><i class="fa fa-wheelchair"></i> <?php echo trans('frontend.Bath'); ?>  </strong><span><?php echo $list->bath; ?></span></li>
										<li><strong><i class="fa fa-arrows"></i> <?php echo trans('frontend.Area'); ?> </strong><span><?php echo $list->size; ?> sqft</span></li>
										
                                    </ul>                                 
                                </div>
                            </div>
                            <!-- Item Property-->
							<?php endforeach; ?>
                        </div>
                        <!-- End Carousel Properties -->
                    </div>
                    </div>
                    <!-- End Content Carousel Properties -->
					<div class="col-md-9">
					 <div class="titles">
                                    <h1><?php echo trans('frontend.What_we_have_for_Sale'); ?></h1>
                                </div>
								<div class="row">
					 <?php foreach ($sales_properties as $list): $category = get_catogory($list->category_id); ?>
                              <!-- Item Property-->
                              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                  <div class="item_property">
                                      <div class="head_property">
                                        <a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>">
                                         <div class="title <?php if ($list->type == "SALE") { ?> sale <?php } else { ?> rent <?php } ?>"></div>
                                          <img src="<?php echo url("/assets/images/uploads/" .  $list->image_name); ?>" alt="Image">
                                          <h5>{{$list->title}}</h5>
                                        </a>
                                      </div>                        
                                      <div class="info_property">                                    
                                          <ul>
											<li><strong><i class="fa fa-map-marker"></i> <?php echo trans('frontend.Place'); ?> </strong><span>{{$list->city}}</span></li>
											<li><strong><i class="fa fa-umbrella"></i> <?php echo trans('frontend.Beds'); ?> </strong> <span><?php echo $list->beds; ?></span></li>
											<li><strong><i class="fa fa-wheelchair"></i> <?php echo trans('frontend.Bath'); ?>  </strong><span><?php echo $list->bath; ?></span></li>
											<li><strong><i class="fa fa-arrows"></i> <?php echo trans('frontend.Area'); ?> </strong><span><?php echo $list->size; ?> sqft</span></li>
										    <li><strong><i class="fa fa-dollar"></i> <?php echo trans('frontend.Price'); ?></strong><span><?php echo $setting->currency; ?>{{number_format($list->price)}} </span></li>
											
                                          </ul>                                    
                                      </div>
                                  </div>
                              </div>
                              <!-- Item Property-->
							  <?php endforeach; ?>
							  </div>
							  
					
					 <div class="titles">
                                    <h1><?php echo trans('frontend.What_we_have_for_Rent'); ?></h1>
                                </div>
								<div class="row">
					 <?php foreach ($rent_properties as $list): $category = get_catogory($list->category_id); ?>
                              <!-- Item Property-->
                              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                  <div class="item_property">
                                      <div class="head_property">
                                        <a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>">
                                         <div class="title <?php if ($list->type == "SALE") { ?> sale <?php } else { ?> rent <?php } ?>"></div>
                                          <img src="<?php echo url("/assets/images/uploads/" .  $list->image_name); ?>" alt="Image">
                                          <h5>{{$list->title}}</h5>
                                        </a>
                                      </div>                        
                                      <div class="info_property">                                    
                                          <ul>
											<li><strong><i class="fa fa-map-marker"></i> <?php echo trans('frontend.Place'); ?> </strong><span>{{$list->city}}</span></li>
											<li><strong><i class="fa fa-umbrella"></i> <?php echo trans('frontend.Beds'); ?> </strong> <span><?php echo $list->beds; ?></span></li>
											<li><strong><i class="fa fa-wheelchair"></i> <?php echo trans('frontend.Bath'); ?>  </strong><span><?php echo $list->bath; ?></span></li>
											<li><strong><i class="fa fa-arrows"></i> <?php echo trans('frontend.Area'); ?> </strong><span><?php echo $list->size; ?> sqft</span></li>
										    <li><strong><i class="fa fa-dollar"></i> <?php echo trans('frontend.Price'); ?></strong><span><?php echo $setting->currency; ?>{{number_format($list->price)}} </span></li>
											
                                          </ul>                                    
                                      </div>
                                  </div>
                              </div>
                              <!-- Item Property-->
							  <?php endforeach; ?>
							  </div>
							  
							  

                     <section id="web-application">
                        <h2 class="page-header"><?php echo trans('frontend.Properties_Area'); ?></h2>

                        <div class="row fontawesome-icon-list">
						@foreach($all_cities as $city) 
                          <div class="fa-hover col-md-3 col-sm-4"><a href="{{url('listing?keywords=' . $city->city )}}">  {{$city->city}}</a></div>
                         @endforeach
                        
                        </div>

                      </section>
					  
					  
					   </div>
					 <div class=" row col-md-3"> 
					   <div class="titles">
						  <h1> <?php echo trans('frontend.FeaturedAgents'); ?></h1>
						  </div>
        <?php
        foreach ($agents as $agent) {
            $photo = url("assets/images/uploads/" . $agent->id . "/profile.jpg");
            if (!@getimagesize($photo)) {
                $photo = url("assets/avatars/profile-pic.jpg");
            }
            ?>
            <div class="agent">
                <div class="agentimage"><img alt="<?php echo $agent->name; ?>" class="img-responsive" src="{{$photo}}"></div>
                <div class="name"><a href="<?php echo url("agent/properties/" . $agent->id . "/" . clean($agent->name)); ?>"> <?php echo $agent->name; ?> </a></div>
                <div class="phone"><span style="font-size:12px"><?php echo $agent->phone; ?></span></div>
                <div class="mail"><a href="mailto:<?php echo $agent->email; ?>"><span style="font-size:12px"><?php echo $agent->email; ?></span></a></div>
            </div>

<?php } ?>

 <h4> <?php echo trans('frontend.FeaturedProperties'); ?> </h4>
<?php foreach ($properties as $list) { ?>
            <div class="agent">
                <div class="agentimage"><img class="img-responsive" src="<?php echo url("/assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>" alt="{{$list->title}}"></div>
                <div class="name"><a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>">{{$list->title}}</a></div>
                <div class="phone">
    <?php echo $setting->currency; ?>{{number_format($list->price)}} 
	<small> <?php if ($list->type == "SALE") { ?> (For Sale) <?php } else { ?> (For Rent) <?php } ?></small></div>

            </div>
<?php } ?>
								<br>
					<h4> <?php echo trans('frontend.Calculator'); ?> </h4>
		 <script src="{{url('assets/frontend/js/calculator.js')}}"></script> 			
			<div class="form-style-6">
	<p> Loan Payment ($): <input type="text" value="10000" id="loanamount_widget" > </p>
	<p> Down Payment (%): <input type="text" value="0" min="0" max="99" id="downpayment_widget" class="easy-mortgage-input"></p>
	<p> Interest Rate (%): <input type="text" value="5" id="loanintrest_widget" class="easy-mortgage-input"></p>
    <p> Period in Years : <input type="text" value="2" id="period_widget" class="easy-mortgage-input"></p>

	<p> Per Installment  <strong ><span style="float:right" id="permonth_widget"> 0 </span> </strong></p> 
	<p> Down Payment  <strong ><span style="float:right" id="downpament_a_widget"> 0 </span> </strong></p> 
	<p> Total Interest  <strong ><span style="float:right" id="total_interest_widget"> 0 </span> </strong></p> 
	<p> Total you will repay  <strong ><span style="float:right" id="total_amount_widget"> 0 </span> </strong></p> </div>
						  
						  <div class="fb-page" data-href="<?php echo $setting->facebook; ?>" data-small-header="false"  data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo $setting->facebook; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $setting->facebook; ?>">TemplatesValley</a></blockquote></div>
						  
					  </div>
					  
					  </div>
					  

                    
                </div>
                <!-- End Container -->
            </div>
            <!-- End content info-->
			
		
<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>

@endsection
