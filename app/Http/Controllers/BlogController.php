<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Blog;
use Session;

class BlogController extends Controller
{
   public function __construct() {
        $this->middleware('auth');
    }
	
	/**
     * Blog Lisitng on admin.
     *
     */
	 
	 public function index() {
			
            $Blogs = Blog::orderBy("id" , "DESC")->paginate(25);
			return view('backend.blog.home', ['blogs' => $Blogs, "title" => "Blog Posts"]);
	 }
		
	/**
     * Blog Add Form.
     *
     */
    public function add() {
         return view('backend.blog.form', ["title" => "Add New"]);
    }
	 /**
     * Blog Edit.
     *
     */
	public function edit($id) {
        $Blog = Blog::find($id);
        return view('backend.blog.edit', ['blog' => $Blog,"title" => "Edit Post"]);
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
			if (!file_exists("assets/images/blog/")) {
				$oldmask = umask(0);
				mkdir("assets/images/blog/", 0777);
				umask($oldmask);
			}
        $destinationPath = "assets/images/blog/";
        if ($request->hasFile("mainfile")) {
            $fileName = rand(11111, 999999) . "_blog"; // renameing image
            $request->file("mainfile")->move($destinationPath, "$fileName.jpg");
            $data["image"] = "$fileName.jpg";
        }
		
        if ($id) {
			 
            \Session::flash('flash_message', 'Updated Successfully');
            Blog::where("id", $id)->update($data);
         
        } else {
			$data['create_date'] = date("Y-m-d h:i:s");
            $insert_id = Blog::insertGetId($data);
            \Session::flash('flash_message', 'Blog Successfully Added.');

        }
        return redirect("admin/blog");
    }
	
	
	/**
     * Delete Blog.
     *
     */
    public function delete(Request $request) {
        $id = $request->input("id");
        Blog::where("id", $id)->update(array('is_delete' => 1));
		return redirect("admin/blog");
    }
}
