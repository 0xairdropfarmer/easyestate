@extends('frontend.layoutother')

@section('content')

  <div class="section_title about">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-8">
                            <h1>
                                <span><a href="">Home </a></span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>
            <!-- End Section Title -->

            <!-- End content info -->
            <section class="content_info">
                <div class="container">
                     @include('newslatter')

                    <div class="row padding_top">
                        <!-- Blog Post-->
                        <div class="col-md-8 col-lg-9">
                            <!-- Post-->
                            <div class="post single">
                              
                                <h2>{{$blog->title}}</h2>
                                <ul class="meta">
                                    <li>Posted by: </li>
                                    <li class="author"><a href="#"> Admin</a></li>
                                    <li class="comments-numb">                                        
                                       <?php echo time_elapsed_string($blog->create_date) ?>
                                        
                                    </li>
                                </ul>
                                <p> {!! $blog->body !!} </p>      
                            </div>
                            <!-- End Post-->

                           

                           

                            
                        </div>
                        <!-- End Blog Post-->

                        <!-- Sidebars-->
                        <div class="col-md-4 col-lg-3">

                            <aside>
                                <form  method="get" action="<?php echo url("blog"); ?>" id="searchform" class="searchform">
                                    <h4>Search for:</h4>
                                    <input type="text" name="keyword" placeholder="Keyword" required="required">
                                    <input type="submit" class="button" value="Search">
                                </form>
                            </aside>

                           
                        </div>
                        <!-- Sidebars-->
                    </div>
                </div>
             </section>
            <!-- End content info-->

@endsection
