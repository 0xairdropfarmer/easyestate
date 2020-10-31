@extends('frontend.layoutother')

@section('content')

 <div class="section_title about">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-12">
                            <h1>Why Us
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
                                <h1>Why Us</h1>
                            </div>
                            <!-- End Title-->  

                            <p class="lead">
								For the about us page, services and why us, I will write the information so for now you can just leave a dummy text there. For the confirmation message after form is submitted, I guess i will also be able to able to edit the information. You see that Available properties have a drop down menu. For rent will be all properties for rent, for sale will be all properties for sale. Then Search will just return to the home page. On the search form please you will kindly remove the keyword fields i do not need it. Remember that you have to take out agents as well. Clients does not need agents. 
I will require you to do some modifications on the template. That's regarding the logo. I will send you more information and I will pay you for that. 
I am arranging with some one who also needs real estate site and i hope that for him you will give me a discount. He will get back to me on Monday. 
best regards


                            </p>   
                        </div>                              
                    </div>

                    
                    <!-- End Teams Members-->
                </div>
            </section>
            <!-- End content info-->


@endsection
