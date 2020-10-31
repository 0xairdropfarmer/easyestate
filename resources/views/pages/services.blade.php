@extends('frontend.layoutother')

@section('content')

 <div class="section_title about">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-12">
                            <h1>Services
                                <span><a href="<?php echo url(""); ?>"><?php echo trans('frontend.Home'); ?></a> / <?php echo trans('frontend.About'); ?></span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>
			
			
			 <section class="content_info">
                <div class="container">
                    <!-- Newsletter Box -->                  
                        @include('newslatter')
                    <!-- End Newsletter Box -->

                    <div class="row">   
                       
                        <div class="col-md-12">
                            <!-- Title-->
                            <div class="titles">
                                <h1>Services</h1>
                            </div>
                            <!-- End Title-->  

                             <div class="row">
                      <div class="col-md-4">Grid systems are used for creating page layouts through a series of rows and columns that house your content. Here's how the Bootstrap grid system works</div>
                      <div class="col-md-4">Grid systems are used for creating page layouts through a series of rows and columns that house your content. Here's how the Bootstrap grid system works</div>
                      <div class="col-md-4">Grid systems are used for creating page layouts through a series of rows and columns that house your content. Here's how the Bootstrap grid system works</div>
                      
                    </div> 
                        </div>                              
                    </div>

                    
                    <!-- End Teams Members-->
                </div>
            </section>
            <!-- End content info-->


@endsection
