@extends('frontend.layoutother')

@section('content')

 <div class="section_title about">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-12">
                            <h1>{!! $page->title !!}
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
						<?php /* if(file_exists("assets/images/uploads/1/" . $page->image)) { ?>
                        <div class="col-md-4">
						<div class="titles">
							<img class="img-responsive" src="<?php echo url("assets/images/uploads/1/" . $page->image); ?>" alt="<?php echo $page->title; ?>">
						</div>
						</div>
                        <div class="col-md-8">
						
						<?php } else {  */ ?>
							<div class="col-md-12">
						
                            <!-- Title-->
                            <div class="titles">
                                <h1>{!! $page->title !!}</h1>
                            </div>
                            <!-- End Title-->  

                            <p class="lead">
                                {!! $page->body !!}
                            </p>   
                        </div>                              
                    </div>

                    
                    <!-- End Teams Members-->
                </div>
            </section>
            <!-- End content info-->


@endsection