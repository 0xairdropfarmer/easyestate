<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Page;
use Session;
use App\Http\Requests;

use Intervention\Image\ImageManagerStatic as Image;

class PageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
		if (Auth::user()->AccessLevel !=0) {
				return redirect("admin/dashboard");
		}
    }
	
	/**
     * Page Lisitng on admin.
     *
     */
	 
	 public function index() {
        
            $pages = Page::paginate(25);
			return view('backend.pages.home', ['pages' => $pages, "title" => "Pages"]);
	 }
		
	/**
     * Page Add Form.
     *
     */
    public function add() {
        $pages = Page::where("is_delete",0)->get();
         return view('backend.pages.form', ['pages' => $pages, "title" => "Add New Page"]);
    }
	 /**
     * Page Edit.
     *
     */
	public function edit($id) {
        $page = Page::find($id);
        return view('backend.pages.edit', ['page' => $page,"title" => "Edit Page"]);
    }
	
	
	/**
     * Property Store.
     *
     */
    public function save(Request $request) {
        $id = $request->input("id");
        $data = array(
            "title" => $request->input("title"),
            "body" => $request->input("body")
        );

      
			$user_id = Auth::user()->id;
			if (!file_exists("assets/images/uploads/$user_id")) {
				$oldmask = umask(0);
				mkdir("assets/images/uploads/$user_id", 0777);
				umask($oldmask);
			}
        $destinationPath = "assets/images/uploads/$user_id/";
        if ($request->hasFile("mainfile")) {
            $fileName = rand(11111, 999999) . "_page"; // renameing image
            $request->file("mainfile")->move($destinationPath, "$fileName.jpg");
            $data["image"] = "$fileName.jpg";
        }
		
        if ($id) {
			 
            \Session::flash('flash_message', 'Updated Successfully');
            Page::where("id", $id)->update($data);
         
        } else {
            $insert_id = Page::insertGetId($data);
            \Session::flash('flash_message', 'Page Successfully Added. Change in Translation and Publish if you are using Multi Language');

        }
        return redirect("admin/pages");
    }
	
	
	/**
     * Delete Page.
     *
     */
    public function delete(Request $request) {
        $id = $request->input("id");
        Blog::where("id", $id)->update(array('is_delete' => 1));
    }

}
