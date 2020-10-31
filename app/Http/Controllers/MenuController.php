<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth,DB;
use App\Page;
class MenuController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
		// if (Auth::user()->AccessLevel !=0) {
				// return redirect("dashboard");
		// }
    }
	
	 public function index() {
            $inactive_pages = DB::table("menus")->where("active" , 0)->orderBy('order_by' , "ASC")->get();;
            $activemenus = DB::table("menus")->where("parent_id" , 0)->where("active" , 1)->orderBy('order_by' , "ASC")->get();
			foreach($activemenus as $menu) { 
				$menu->child = DB::table("menus")->where("parent_id" , $menu->menu_id)->orderBy('order_by' , "ASC")->get();
			}
			return view('backend.menu.index', ["pages" => $inactive_pages,"menus" => $activemenus , "title" => "Menus"]);
	 }
	 
	 
	function saveList(Request $request) {
		$list = $request->all();
		$p_o = 1;
		foreach($request->all() as $key=>$item) {
			 foreach($item as $l) {
				$menu_id = $l['id'];
				$parent_record = DB::table("menus")->where("menu_id" , $menu_id)->first();
				if(!empty($parent_record)) { 
					$data = array(
						"active" => 1,
						"parent_id" => 0,
						"order_by" => $p_o
					);
					DB::table("menus")->where("menu_id" , $menu_id)->update($data);
				} 
				if(!empty($l['children'])) {
					 $c_o = 1;
					 foreach($l['children'] as $child) { 
						$data = array(
							"active" => 1,
							"parent_id" => $menu_id,
							"order_by" => $c_o
						);
					
						$child_record = DB::table("menus")->where("menu_id" , $menu_id)->first();
						if(!empty($child_record)) { 
							DB::table("menus")->where("menu_id" , $child['id'])->update($data);
						} 
						$c_o++;
					 } 
				}
				$p_o++;
			 }
			 
		}
	}

	function saveRemoved(Request $request) {
		$list = $request->all();
		$p_o = 1;
		foreach($request->all() as $key=>$item) {
			 foreach($item as $l) {
				$menu_id = $l['id'];
				$parent_record = DB::table("menus")->where("menu_id" , $menu_id)->first();
				if(!empty($parent_record)) { 
					$data = array(
						"active" => 0,
						"parent_id" => 0,
						"order_by" => $p_o
					);
					DB::table("menus")->where("menu_id" , $menu_id)->update($data);
				} 
				if(!empty($l['children'])) {
					 $c_o = 1;
					 foreach($l['children'] as $child) { 
						$data = array(
							"active" => 0,
							"parent_id" => $menu_id,
							"order_by" => $c_o
						);
					
						$child_record = DB::table("menus")->where("menu_id" , $menu_id)->first();
						if(!empty($child_record)) { 
							DB::table("menus")->where("menu_id" , $child['id'])->update($data);
						} 
						$c_o++;
					 } 
				}
				$p_o++;
			 }
			 
		}
	}

}
