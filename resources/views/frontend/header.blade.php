<?php $setting = get_setting(); ?>

<!-- Info Head -->
            <section class="info_head">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul>  
                                <li><i class="fa fa-headphones"></i><a href="#">{{$setting->phone_no}}</a></li>
                                <li><i class="fa fa-comment"></i><a href="#">{{$setting->email}}</a></li>
                                <li>
                                    <ul>
                                      <li class="dropdown">
                                        <i class="fa fa-globe"></i> 
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <?php echo trans('frontend.Language'); ?><i class="fa fa-angle-down"></i>
                                        </a>
                                         <ul class="dropdown-menu">  
                                             <li><a href="<?php echo url("localization/es"); ?>"><img src="{{url('assets/frontend/img/language/spanish.png')}}" alt="">Spanish</a></li>
                                             <li><a href="<?php echo url("localization/en"); ?>"><img src="{{url('assets/frontend/img/language/english.png')}}" alt="">English</a></li>
                                             <li><a href="<?php echo url("localization/fr"); ?>"><img src="{{url('assets/frontend/img/language/frances.png')}}" alt="">Frances</a></li>
                                             <!-- <li><a href="#"><img src="img/language/portugues.png" alt="">Portuguese</a></li> -->
                                        </ul>
                                      </li>                      
                                    </ul>
                                </li>
                            </ul> 
                        </div>
                    </div>
                </div>                         
            </section>
            <!-- Info Head -->

            <!-- Nav-->
            <nav>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 logo">
                            <a href="<?php echo url("/"); ?>"><img src="{{url('assets/frontend/logo.png')}}" alt="Image" class="logo_img"></a>
                        </div>
                        <!-- Menu-->
						<?php $menus = get_menu(); ?>
                        <ul id="menu" class="col-md-9 sf-menu">
                            <?php foreach($menus as $menu) { $translate = $menu->translate;?>
                             
                            <li><a href="<?php echo url("/" . $menu->link); ?>"><?php echo trans("frontend.$translate"); ?> <?php if(!empty($menu->child_menu)) {  ?> <b class="caret"></b> <?php } ?></a>
								<?php if(!empty($menu->child_menu)) {  ?>
								<ul>
								 <?php foreach($menu->child_menu as $child) { $child_translate = $child->translate;?>
								<li>
									<a href="<?php echo url("/" . $child->link); ?>"><?php echo trans("frontend.$child_translate"); ?></a>
								</li>
								<?php } ?>
							  </ul>
								<?php } ?>
							</li>
                          
							<?php } ?>
						
                             
                            
                        </ul>
                        <!-- End Menu-->
                    </div>
                </div>
            </nav>
   