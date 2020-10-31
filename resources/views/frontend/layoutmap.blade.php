<!DOCTYPE html>
<html lang="en">
    
	@include('frontend.head')
    <body> 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1389166081410787";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
       <?php 
			$setting = get_setting();
			$layout = $setting->theme_layout;
			if(!$layout) { 
				$layout = "";
			}
			
		?>
        <!-- layout-->
        <div id="layout" class="<?php echo $layout; ?>">
            <!-- Login Client -->
            <div class="jBar">
              <div class="container">            
                  <div class="row">                     
                      <?php if(empty(Auth::user()->id)) {  ?>				  
                      <form role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}           
                          <div class="col-md-2">
                              <h1>Login Area</h1> 
                          </div>
						 
                          <div class="col-md-4"> 
                              <input type="email" name="email" placeholder="Your Email" required>
                          </div>
                          <div class="col-md-3">
                              <input type="password" name="password" placeholder="Your Password" required>                          
                          </div>
                          <div class="col-md-3">
                              <input type="submit" class="botton" value="Sign in">
                              <span>Our</span>
                              <a href="{{url('/register')}}" class="botton"> Register </a>
                          </div>
                      </form> 
					<?php } else {  ?>
 <div class="col-md-4"> </div>					
 <div class="col-md-4"> </div>					
<div class="col-md-3">
                              
                              <a href="{{url('/logout')}}" class="botton"> Logout </a>
                          </div>
<?php } ?>             
                      <p class="jTrigger downarrow">Close Login</p>
                  </div>
              </div>
            </div>
           @if($setting->registration == 0)
            <span class="jRibbon jTrigger up">Login</span>
            <div class="line"></div>
            @endif
            <!-- End Login Client -->

            @include('frontend.header')
            @include('frontend.map')
           
            
					@yield('content')
 
                    
              
           @include('frontend.footer')
        </div>
        <!-- End layout-->
   
        <!-- ======================= JQuery libs =========================== -->
        <!-- Core JS Libraries -->
               
        <!--Nav-->
        <script type="text/javascript" src="{{url('assets/frontend/js/nav/tinynav.js')}}"></script> 
        <script type="text/javascript" src="{{url('assets/frontend/js/nav/superfish.js')}}"></script>  
        <script type="text/javascript" src="{{url('assets/frontend/js/nav/hoverIntent.js')}}"></script>              
        <!--Totop-->
        <script type="text/javascript" src="{{url('assets/frontend/js/totop/jquery.ui.totop.js')}}" ></script>  
        <!--Slide-->
        <script type="text/javascript" src="{{url('assets/frontend/js/slide/camera.js')}}" ></script>      
        <script type='text/javascript' src="{{url('assets/frontend/js/slide/jquery.easing.1.3.min.js')}}"></script> 
        <!--owlcarousel-->
        <script type='text/javascript' src="{{url('assets/frontend/js/owlcarousel/owl.carousel.js')}}"></script> 
        <!--efect_switcher-->
        <script type='text/javascript' src="{{url('assets/frontend/js/efect_switcher/jquery.content-panel-switcher.js')}}"></script>         
        <!--Theme Options-->
        <script type="text/javascript" src="{{url('assets/frontend/js/theme-options/jquery.cookies.js')}}"></script> 
        <!-- Bootstrap.js-->
        <script src="{{url('assets/frontend/js/bootstrap/bootstrap.js')}}"></script>
        <!--fUNCTIONS-->
        <script type="text/javascript" src="{{url('assets/frontend/js/main.js')}}"></script>
        <!-- ======================= End JQuery libs =========================== -->
    </body>
</html>