@extends('frontend.layoutother')

@section('content')

	<script type='text/javascript' src='assets/unitegallery/js/unitegallery.min.js'></script>	

	<link rel='stylesheet' href='assets/unitegallery/css/unite-gallery.css' type='text/css' />
	
	<script type='text/javascript' src='assets/unitegallery/themes/tiles/ug-theme-tiles.js'></script>
	
	<script type="text/javascript">

		jQuery(document).ready(function(){

			jQuery("#gallery").unitegallery({
				tiles_type:"justified"
			});

		});
		
	</script>

			<div class="section_title features">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-8">
                            <h1><?php echo trans('frontend.Gallery'); ?>
                                <span><a href="<?php echo url(""); ?>">Home </a> / <?php echo trans('frontend.Gallery'); ?></span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>


<!-- Intro Content -->
<section class="content_info">
                <div class="container">
				     @include('newslatter')
					
				<div class="titles">
                                 <h1><?php echo trans('frontend.Gallery'); ?></h1>
                            </div>
                            
							
	<div id="gallery" style="display:none;">			
				<?php foreach($images as $key=>$row) :  ?>
				<a href="javascript:void(0);">
				
				<img alt="Easy Estate"
					 src="<?php echo url($row); ?>"
					 data-image="<?php echo url(str_replace("thumbnails/" , "" , $row)); ?>"
					 data-description=""
					 style="display:none">
				</a>
				
					
				<?php endforeach; ?>
							
				</div>
	</div>
   
    
</div>


 <div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
