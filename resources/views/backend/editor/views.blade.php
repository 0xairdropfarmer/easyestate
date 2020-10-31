@extends('backend.layouts.app')

@section('content')

<link href='http://fonts.googleapis.com/css?family=Signika:600,400,300' rel='stylesheet' type='text/css'>
<link href="{{url('assets/editor/codemirror.css')}}" rel="stylesheet">
<script src="{{url('assets/editor//codemirror.js')}}"></script>
<script src="{{url('assets/editor//matchbrackets.js')}}"></script>
<script src="{{url('assets/editor//htmlmixed.js')}}"></script>
<script src="{{url('assets/editor//xml.js')}}"></script>
<script src="{{url('assets/editor//javascript.js')}}"></script>
<script src="{{url('assets/editor//css.js')}}"></script>
<script src="{{url('assets/editor//clike.js')}}"></script>
<script src="{{url('assets/editor//php.js')}}"></script>


<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="dashboard">Home</a>
        </li>
        <li class="active"><?php echo $title; ?></li>
    </ul><!-- /.breadcrumb -->
</div>


<div class="page-header">
    <h1><?php echo $title; ?> </h1>
</div>

<?php 
if(!empty($_GET['file'])) {
					$real_file = $_GET['file']; 
				} else { 
					$real_file = "";
				}
				?>

<div class="panel-body">

    <div class="row">

        <div class="col-lg-8">
            <form role="form" method="POST" action="<?php echo url("admin/html/save?file=$real_file"); ?>" enctype="multipart/form-data">

                {!! csrf_field() !!} 
				@if(Session::has('message'))
<div class="alert alert-success"><em> {!! session('message') !!}</em></div>
@endif
				
				<?php 
				
				$content = "";
				if(!empty($real_file)) { 
				$content = file_get_contents( $real_file );
				$content = htmlspecialchars( $content );
				}
				
				?>
                
                <div class="col-md-12 col-sm-12">
                    <div class="form-group editor" >
                        <label>Description</label>
                        <textarea id="editor_code" name="editor_code" class="form-control" rows="20"><?php echo $content; ?></textarea>
                    </div>
                </div>
                

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary pull-right">
                    </div>
                </div>



            </form>
        </div>
		
		<div class="col-lg-4">
			<?php listFolderFiles($path); ?>
		</div>

    </div>
    <!-- /.row (nested) -->
</div>

<script type="text/javascript">
      var editor = CodeMirror.fromTextArea(document.getElementById("editor_code"), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift"
      });
    </script>


@endsection
