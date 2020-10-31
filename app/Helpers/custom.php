<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Session as s;

/*
 *  Get Simple Comapny 
 * param id
 */

function get_menu() {
	$parent_menu = DB::table("menus")->where("active" , 1)->where("parent_id" , 0)->orderBy("order_by" , "ASC")->get();
	foreach($parent_menu as $mm) { 
		$mm->child_menu = DB::table("menus")->where("active" , 1)->where("parent_id" , $mm->menu_id)->orderBy("order_by" , "ASC")->get();
	}
	
	return $parent_menu;
}
function get_catogory($id) {
    $res = DB::table("category")->where("id" , $id)->first();
    if (empty($res))
        return false;
    return $res->name;
}

function get_testimonials() {
    $res = DB::table("testimonials")->get();
    if (empty($res))
        return false;
    return $res;
}

function get_agent($id) {
    $res = DB::table("users")->where("id" , $id)->first();
    if (empty($res))
        return false;
    return $res->name;
}

function get_property($id) {
    $res = DB::table("properties")->where("id" , $id)->first();
    if (empty($res))
        return false;
    return $res;
}


function get_setting() {
    $res = DB::table("settings")->first();
   
    if (empty($res))
        return false;
    return $res;
}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full)
        $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


function listFolderFiles($dir){
	$editable_extensions = array('php', 'txt', 'text', 'js', 'css', 'html', 'htm', 'xml', 'inc', 'include');
    $ffs = scandir($dir);
    echo '<ol>';
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
			if(!is_dir($dir.'/'.$ff)) {
				if(preg_match('/\.([^.]+)$/', $ff, $matches)) {
					$ext = strtolower($matches[1]);
					if (in_array( $ext, $editable_extensions ) )
					echo "<li><a href='?file=" . $dir .'/'. urlencode( $ff ) . "'>".$ff;
				}
			} else  {
				echo "<li>" . $ff . "</li>";
			}
            if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
            echo '</a></li>';
        }
    }
    echo '</ol>';
}





