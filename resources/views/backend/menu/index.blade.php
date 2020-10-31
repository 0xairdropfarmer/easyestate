@extends('backend.layouts.app')

@section('content')
 <script src="<?php  echo url("assets/js/jquery.min.js"); ?>"></script> 
 
 <script src="<?php echo url("assets/js/nestable.js"); ?>"></script>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="dashboard">Home</a>
        </li>



        <li class="active"><?php echo $title; ?></li>
    </ul><!-- /.breadcrumb -->

</div>

		<div class="panel-body">
			<div class="table-responsive"> 
        <div class="dd" id="nestable">
		<div class="page-header">
			 <h1>Active Menu </h1> </div>
			<div style="color:red" id="active_msg"> </div>
            <ol class="dd-list">
				<?php foreach($menus as $key=>$menu) { ?>
				
                <li class="dd-item" data-id="{{$menu->menu_id}}">
                    <div class="dd-handle">{{$menu->title}}</div>
					<?php if(!empty($menu->child)) foreach($menu->child as $child) { ?>
					<ol class="dd-list">
                        <li class="dd-item" data-id="{{$child->menu_id}}"><div class="dd-handle">{{$child->title}}</div></li>
                    </ol>
					<?php } ?>
                </li>
				
				<?php } ?>
            </ol>
        </div>

        <div class="dd" id="nestable2">
		<div class="page-header">
			 <h1>Inactive Menu </h1> </div>
			<div style="color:red" id="inactive_msg"> </div>
				
				
            <ol class="dd-list">
			<li class="dd-item" data-id="0">
                    <div class="dd-handle">Dont Move It's a demo. It will not work</div>
                </li>
				<?php foreach($pages as $page) {  ?>
                <li class="dd-item" data-id="{{$page->menu_id}}">
                    <div class="dd-handle">{{$page->title}}</div>
                </li>
                <?php } ?>
            </ol>
        </div>
  
			</div>
			<!-- /.table-responsive -->
		</div>
<script>
$(document).ready(function()
{
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target), output = list.data('output');

        $.ajax({
            method: "POST",
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
            url: "<?php echo url('admin/menu/save'); ?>",
            data: {
                list: list.nestable('serialize')
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            $("active_msg").html("Unable to save active list order: " + errorThrown);
			
        });
		
		$("active_msg").html("Save Successfully");

    };
	
	
	var updateOutput1 = function (e) {
        var list = e.length ? e : $(e.target), output = list.data('output');

        $.ajax({
            method: "POST",
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
            url: "<?php echo url('admin/menu/save_removed'); ?>",
            data: {
                list: list.nestable('serialize')
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            $("inactive_msg").html("Unable to save inactive list order: " + errorThrown);
        });
		$("inactive_msg").html("Save Successfully");
    };
	
    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1,
		maxDepth:2
    })
    .on('change', updateOutput);
    // activate Nestable for list 2
    $('#nestable2').nestable({
        group: 1,
		maxDepth:1
    })
    .on('change', updateOutput1);
    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    updateOutput1($('#nestable2').data('output', $('#nestable2-output')));
    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });
    $('#nestable3').nestable();
});
</script>


<style type="text/css">
.cf:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
* html .cf { zoom: 1; }
*:first-child+html .cf { zoom: 1; }
h1 { font-size: 1.5em; margin: 0 0 0.6em 0; }
a { color: #2996cc; }
a:hover { text-decoration: none; }
p { line-height: 1.5em; }
.small { color: #666; font-size: 0.875em; }
.large { font-size: 1.25em; }
/**
 * Nestable
 */
.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }
.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }
.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }
.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }
.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }
.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}
.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}
/**
 * Nestable Extras
 */
.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }
#nestable-menu { padding: 0; margin: 20px 0; }
#nestable-output,
#nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }
#nestable2 .dd-handle {
    color: #fff;
    border: 1px solid #999;
    background: #bbb;
    background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
    background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
    background:         linear-gradient(top, #bbb 0%, #999 100%);
}
#nestable2 .dd-handle:hover { background: #bbb; }
#nestable2 .dd-item > button:before { color: #fff; }
@media only screen and (min-width: 700px) {
    .dd { float: left; width: 48%; }
    .dd + .dd { margin-left: 2%; }
}
.dd-hover > .dd-handle { background: #2ea8e5 !important; }
/**
 * Nestable Draggable Handles
 */
.dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd3-content:hover { color: #2ea8e5; background: #fff; }
.dd-dragel > .dd3-item > .dd3-content { margin: 0; }
.dd3-item > button { margin-left: 30px; }
.dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
    border: 1px solid #aaa;
    background: #ddd;
    background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:         linear-gradient(top, #ddd 0%, #bbb 100%);
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
.dd3-handle:hover { background: #ddd; }
    </style>

	@endsection


