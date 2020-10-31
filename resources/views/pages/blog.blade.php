@extends('frontend.layoutother')

@section('content')

 <div class="section_title about">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-12">
                            <h1>Blog
                                <span><a href="<?php echo url(""); ?>"><?php echo trans('frontend.Home'); ?></a> / <?php echo trans('frontend.About'); ?></span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>
			
			

            <!-- End content info -->
            <section class="content_info">
                <div class="container">
                   
 @include('newslatter')
                    <div class="row">
                        <!-- Title-->
                        <div class="col-md-12">
                            <div class="titles">
                               
                                <h1><?php echo trans('frontend.Blog'); ?> </h1>
                            </div>
                        </div>
                        <!-- End Title-->

                        <!-- Blog Post-->
                        <div class="col-md-8 col-lg-9">
						   @foreach($blogs as $blog) 
                            <!-- Post-->
                            <div class="row post">
                                <div class="col-md-7">
                                    <a href="<?php echo url("blog/" . $blog->id . "/" . clean($blog->title)); ?>"><h2>{{$blog->title}}</h2></a>
                                   
                                    <p><?php echo substr($blog->body , 0 ,300) . "..."; ?></p>
                                    <a href="<?php echo url("blog/" . $blog->id . "/" . clean($blog->title)); ?>" class="button">Read More</a>
                                </div>
                                <div class="col-md-5">
                                    <div class="image_post">
                                        <img src="<?php echo url("assets/images/blog/" . $blog->image) ?>" alt="">
                                        <ul>
                                            <li><?php echo time_elapsed_string($blog->create_date) ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Post-->
							@endforeach

                           
						   {!! $blogs->render() !!}
                            <!-- End Pagination-->
                        </div>
                        <!-- End Blog Post-->

                        <!-- Sidebars-->
                        <div class="col-md-4 col-lg-3">

                            <aside>
                                <form  method="get" id="searchform" class="searchform">
                                    <h4>Search for:</h4>
                                    <input type="text" name="keyword" placeholder="Search" required="required">
                                    <input type="submit" class="button" value="Search">
                                </form>
                            </aside>

                           

                            
                           
                        </div>
                        <!-- Sidebars-->
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
