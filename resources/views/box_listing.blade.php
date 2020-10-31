@extends('frontend.layoutother')

@section('content')

<?php $setting = get_setting(); ?>




 <div class="section_title features">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-8">
                            <h1><?php echo trans('frontend.Listing'); ?>
                                <span><a href="{{url('/')}}">Home </a> / <?php echo trans('frontend.Listing'); ?></span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>
            <!-- End Section Title -->

            <!-- End content info -->
            <section class="content_info">
                <div class="container">
                  <!-- Newsletter Box -->                  
                 @include('newslatter')
                  <!-- End Newsletter Box -->

				  
                  <div class="row padding_top">
                      <!-- property List-->
                      <div class="col-md-12 col-sm-6 properties_two">
						<div  id="box_listings">
                          <!-- Bar Filter properties-->
                          <div class="bar_properties">
                              <div class="row">
                                  <div class="col-md-12 col-sm-6">
                                      <strong><?php echo trans('frontend.OrderBy'); ?>:</strong>
                                      <ul class="">                            
										  <li>
                                            <a href="javascript:void(0)" class="sort" data-sort="price_p" > <?php echo trans('frontend.Price'); ?> | </a>
                                            <a href="?"> <?php echo trans('frontend.All'); ?> | </a>
                                            <a href="?type=SALE" data-toggle="tooltip" title data-original-title="<?php echo trans('frontend.ForSale'); ?>"> <?php echo trans('frontend.Sale'); ?> | </a>
                                            <a href="?type=RENT" data-toggle="tooltip" title data-original-title="<?php echo trans('frontend.ForRent'); ?>"> <?php echo trans('frontend.Rent'); ?> </a>
                                          </li> 
										  
										<li>
											<input type="text" class="search" Placeholder="Location,Zip,Title">
										</li>
										
										<li>
											<select id="beds_r"> 
												<option value=""> Bedrooms </option> 
												<option value="1"> 1 Bed</option> 
												<option value="2"> 2 Bed</option> 
												<option value="3"> 3 Bed</option> 
												<option value="4"> 4 Bed</option> 
												<option value="5"> 5 Bed</option> 
											</select>
										</li>
										
										<li>
											<select id="bath_r"> 
												<option value=""> Bathrooms </option> 
												<option value="1"> 1 Bath </option> 
												<option value="2"> 2 Bath </option> 
												<option value="3"> 3 Bath </option> 
												<option value="4"> 4 Bath </option> 
												<option value="5"> 5 Bath </option> 
											</select>
										</li>
										 
										 
                                      </ul>
                                  </div>
                                
                              </div>
                          </div>				  
                         
						
                          <div class="row list" >
						  
						  <?php foreach ($properties as $list): $category = get_catogory($list->category_id); ?>
                              <!-- Item Property-->
                              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                  <div class="item_property">
                                      <div class="head_property">
                                        <a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>">
                                         <div class="title <?php if ($list->type == "SALE") { ?> sale <?php } else { ?> rent <?php } ?>"></div>
                                          <img src="<?php echo url("/assets/images/uploads/" .  $list->image_name); ?>" alt="Image">
                                          <h5 class="title_p">{{$list->title}}</h5>
                                        </a>
                                      </div>                        
                                      <div class="info_property">                                    
                                          <ul>
											<li class="place"><strong><i class="fa fa-map-marker"></i> <?php echo trans('frontend.Place'); ?> </strong><span>{{$list->city}}, {{$list->state}}</span></li>
											<li><strong><i class="fa fa-umbrella"></i> <?php echo trans('frontend.Beds'); ?> </strong> <span class="bedrooms"><?php echo $list->beds; ?></span></li>
											<li><strong><i class="fa fa-wheelchair"></i> <?php echo trans('frontend.Bath'); ?>  </strong><span class="bathrooms"><?php echo $list->bath; ?></span></li>
											<li><strong><i class="fa fa-arrows"></i> <?php echo trans('frontend.Area'); ?> </strong><span><?php echo $list->size; ?> sqft</span></li>
										    <li class="price"><strong><i class="fa fa-dollar"></i> <?php echo trans('frontend.Price'); ?></strong><span><?php echo $setting->currency; ?>{{number_format($list->price)}} </span></li>
											<li style="display:none" class="price_p">{{$list->price}}

												<span class="zip_p">{{$list->zip}} </span><li>
											
                                          </ul>                                    
                                      </div>
                                  </div>
                              </div>
                              <!-- Item Property-->
							  <?php endforeach; ?>

                             
                                                
                          </div> 
						   
						   <ul class="pagination"></ul>
						   
						   <script src="http://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.0/list.min.js"></script>
						   <script src="//cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>	

						 <script type="text/javascript"> 
							var options = {
								valueNames: [ 'title_p', 'place' , 'zip_p', 'price_p' , 'bedrooms' , 'bathrooms' ],
								page: 8,
								plugins: [
								  ListPagination({
									   innerWindow: 6,
										left: 2,
										right: 4
								  })
								]
							};
							var userList = new List('box_listings', options);
							
							
							
							$('#beds_r , #bath_r').on('change', function() {
								userList.filter(function(item , bd , bth) {
									var bd = $("#beds_r").val();
									var bth = $("#bath_r").val();
									if(bd != "" && bth != "") { 
										if (item._values.bedrooms == bd && item._values.bathrooms == bth) {
										   return true;
										} else {
										   return false;
										}
									} else if(bd != "") { 
										if (item._values.bedrooms == bd) {
										   return true;
										} else {
										   return false;
										}
									} else if (bth != "") { 
										if (item._values.bathrooms == bth) {
										   return true;
										} else {
										   return false;
										}
									} else { 
										return true;
									}
									
								});
							});

							$('#bath_r').on('change', function() {
								userList.search($(this).val(), ['bathrooms']);
							});

  
  
						 </script>
							<style> 
							.pagination li {
							  display:inline-block;
							  padding:5px;
							}
							</style>
							

                          </div> 
                         
                        <?php /* {!! $properties->appends(request()->input())->links() !!}
						 */ ?>
                             
                                       
                      </div>                       
                      <!-- End property List-->
					<?php /* 
                      <!-- Aside -->
                      <div class="col-md-3">                    
                          <!-- Search Advance -->
                          <aside>                                                 
                              <div class="search_advance">
                                  
                                  
                                  <div class="clearfix"></div>
                                  <div class="switcher-panel"></div> 

            
                                  <div id="3-content" class="switcher-content set2 show">
                                     <div class="search_box">
                                          <form action="{{url('listing')}}">
                                              <div>
                                                  <label><?php echo trans('frontend.Keywords'); ?></label>
                                                  <input type="text" class="search" id="keywords" value="<?php if($forms['keywords']) echo $forms['keywords']; ?>" name="keyword" >
                                              </div>
                                              <div>
                                                  <label><?php echo trans('frontend.Category'); ?></label>
                                                   <select name="category">
                                                    <option selected="selected" value="">-- <?php echo trans('frontend.Category'); ?> --</option>
                                                     <option value=""><?php echo trans('frontend.Any'); ?></option>
													 @foreach($categories as $category)
                                                     <option <?php if($forms['category'] == $category->id) { echo "selected"; }  ?> value="{{$category->id}}">{{$category->name}}</option>
													 @endforeach
                                                                      
                                                 </select>
                                              </div>
                                              <div>
                                                  <label><?php echo trans('frontend.PriceFrom'); ?></label>                                     
                                                  <select name="min">
                                                        <option value=""><?php echo trans('frontend.Any'); ?></option>
														<option <?php if($forms['min'] == 1000) { echo "selected"; }  ?> value="1000">1000</option>
														<option <?php if($forms['min'] == 10000) { echo "selected"; }  ?> value="10000">10000</option>
														<option <?php if($forms['min'] == 50000) { echo "selected"; }  ?> value="50000">50000</option>
														<option <?php if($forms['min'] == 100000) { echo "selected"; }  ?> value="100000">100000</option>
														<option <?php if($forms['min'] == 200000) { echo "selected"; }  ?> value="200000">200000</option>
														<option <?php if($forms['min'] == 300000) { echo "selected"; }  ?> value="300000">300000</option>
														<option <?php if($forms['min'] == 400000) { echo "selected"; }  ?> value="400000">400000</option>
														<option <?php if($forms['min'] == 500000) { echo "selected"; }  ?> value="500000">500000</option>    
                                                  </select>
                                              </div>
											  
											  <div>
                                                  <label><?php echo trans('frontend.PriceTo'); ?></label>                                     
                                                  <select name="max">
                                                        <option value=""><?php echo trans('frontend.Any'); ?></option>
														<option <?php if($forms['max'] == 1000) { echo "selected"; }  ?> value="1000">1000</option>
														<option <?php if($forms['max'] == 10000) { echo "selected"; }  ?> value="10000">10000</option>
														<option <?php if($forms['max'] == 50000) { echo "selected"; }  ?> value="50000">50000</option>
														<option <?php if($forms['max'] == 100000) { echo "selected"; }  ?> value="100000">100000</option>
														<option <?php if($forms['max'] == 200000) { echo "selected"; }  ?> value="200000">200000</option>
														<option <?php if($forms['max'] == 300000) { echo "selected"; }  ?> value="300000">300000</option>
														<option <?php if($forms['max'] == 400000) { echo "selected"; }  ?> value="400000">400000</option>
														<option <?php if($forms['max'] == 500000) { echo "selected"; }  ?> value="500000">500000</option>   
<option <?php if($forms['max'] == 1000000) { echo "selected"; }  ?> value="1000000">1000000</option>														
                                                  </select>
                                              </div>
											  
                                              <div>
                                                  <label><?php echo trans('frontend.Beds'); ?></label>
                                                  <select name="bed">
														<option value=""><?php echo trans('frontend.Any'); ?></option>
														<?php for($i = 1; $i<= 10 ; $i++) { ?>
														<option <?php if (!empty($forms['bed']) and $forms['bed'] == $i) {echo "selected";}?> value="{{$i}}">{{$i}}</option>
														<?php } ?>
														
                                                  </select>
                                              </div>
											  
											  <div>
                                                  <label><?php echo trans('frontend.Bath'); ?></label>
                                                  <select name="bath">
                                                        <option value=""><?php echo trans('frontend.Any'); ?></option>
														<?php for($i = 1; $i<= 10; $i++) { ?>
														<option <?php if (!empty($forms['bath']) and $forms['bath'] == $i) {echo "selected";}?> value="{{$i}}">{{$i}}</option>
														<?php } ?>
                                                  </select>
                                              </div>
                                              <div>
                                                  <input type="submit" class="button" value="<?php echo trans('frontend.Search'); ?>">
                                              </div> 
                                          </form>                               
                                      </div>   
                                  </div>
                                  <!-- End 3-content -->
                              </div>  
                          </aside>
                          <!-- End Search Advance -->
                          
                        
                      </div>
                      <!-- End Aside --> */ ?>
                  </div>
                </div>
            </section>
            <!-- End content info-->
			
			
<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>


@endsection
