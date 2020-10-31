<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use DB;
use App\Agent;
use App\Property;
use Auth;
use App\Category;
use App\Slider;
use App;
use Mail;
use Session;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $locale = Session::get("locale");
        App::setLocale($locale);
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index() {
        $properties = Property::orderBy("featured", "DESC")->orderBy("id", "DESC")->where("featured", 1)->where("is_delete", 0)->get();
		
		
        $sales_properties = Property::where("type" , "SALE")->limit(9)->orderBy("featured" , "DESC")->get();
        $rent_properties = Property::where("type" , "RENT")->limit(9)->orderBy("featured" , "DESC")->get();
        $all_cities = Property::select("city")->groupBy('city')->get();
        $categories = Category::where("is_delete",0)->get();
		$sliders = Slider::get();
        $agents = Agent::limit(4)->where("AccessLevel" , 1)->where("is_delete",0)->get();
        return view('home', ['sliders' => $sliders, 'all_cities' => $all_cities, 'agents' => $agents, 'categories' => $categories,'rent_properties' => $rent_properties,'sales_properties' => $sales_properties, 'properties' => $properties]);
    }

    /**
     * Show the application Map Home.
     *
     */
    public function map() {
		$categories = Category::where("is_delete",0)->get();
		$all_cities = Property::select("city")->groupBy('city')->get();
        $all_properties = Property::orderBy("featured", "DESC")->orderBy("id", "DESC")->where("is_delete", 0)->get();
		$sales_properties = Property::where("type" , "SALE")->where("featured", 1)->limit(3)->orderBy("id" , "DESC")->get();
        $rent_properties = Property::where("type" , "RENT")->where("featured", 1)->limit(3)->orderBy("id" , "DESC")->get();
    
        $agents = Agent::limit(4)->where("AccessLevel" , 1)->get();
        $properties = Property::orderBy("featured", "DESC")->where("is_delete", 0)->paginate(6);
        return view('map', ['categories' => $categories,'all_cities' => $all_cities, 'agents' => $agents, 'all_properties' => $all_properties,'rent_properties' => $rent_properties,'sales_properties' => $sales_properties, 'properties' => $properties]);
    }

    /**
     * Show the Grid Listing of Properties.
     *
     */
    public function listing() {
        $keywords = "";
		
        if (!empty(Input::get("keywords"))) {
            $keywords = Input::get("keywords");
        }


        $type = "";
        if (!empty(Input::get("type"))) {
            $type = Input::get("type");
        }

        $bed = "";
        if (!empty(Input::get("bed"))) {
            $bed = Input::get("bed");
        }
        $bath = "";
        if (!empty(Input::get("bath"))) {
            $bath = Input::get("bath");
        }
		
		$category = "";
        if (!empty(Input::get("category"))) {
            $category = Input::get("category");
        }

        $min = 0;
        if (!empty(Input::get("min"))) {
            $min = Input::get("min");
        }
        $max = 0;
        if (!empty(Input::get("max"))) {
            $max = Input::get("max");
        }

        $query = Property::where("is_delete", 0);

        if (!empty($keywords)) {
            $query->where('title', 'like', "%$keywords%");
            $query->orWhere('address', 'like', "%$keywords%");
            $query->orWhere('zip', 'like', "%$keywords%");
            $query->orWhere('city', 'like', "%$keywords%");
            $query->orWhere('state', 'like', "%$keywords%");
        }
		
		

        if (!empty($min) and ! empty($max)) {
            $query->where('price', '>=', $min);
            $query->where('price', '<=', $max);
        }


        if (!empty($bed)) {
            $query->where('beds', $bed);
        }
		
		 if (!empty($category)) {
            $query->where('category_id', $category);
        }

        if (!empty($bath)) {
            $query->where('bath', $bath);
        }

        if (!empty($type)) {
            $query->where('type', $type);
        }

        $forms = array(
            "keywords" => $keywords,
            "type" => $type,
            "max" => $max,
            "min" => $min,
            "bath" => $bath,
            "bed" => $bed,
            "category" => $category
        );



        $order = "new";
        $orderby = "id";
        $ordertype = "desc";
        if (!empty(Input::get("order"))) {
            $order = Input::get("order");

            if ($order == "priceh") {
                $orderby = "price";
                $ordertype = "desc";
            }

            if ($order == "pricel") {
                $orderby = "price";
                $ordertype = "asc";
            }
        }

        $query->orderBy($orderby, $ordertype);
        $properties = $query->paginate(10);
		$features = DB::table('features')->get();
		$categories = Category::where("is_delete",0)->get();
        $agents = Agent::limit(5)->where("AccessLevel" , 1)->where("is_delete",0)->get();
        return view('box_listing', ["categories" => $categories,"forms" => $forms, "order" => $order, 'agents' => $agents, 'properties' => $properties,'features' => $features]);
    }
	
	
	 /**
     * Show the Listing of Properties .
     *
     */
    public function list_properties() {
        $keywords = "";
		
        if (!empty(Input::get("keywords"))) {
            $keywords = Input::get("keywords");
        }


        $type = "";
        if (!empty(Input::get("type"))) {
            $type = Input::get("type");
        }

        $bed = "";
        if (!empty(Input::get("bed"))) {
            $bed = Input::get("bed");
        }
        $bath = "";
        if (!empty(Input::get("bath"))) {
            $bath = Input::get("bath");
        }

        $min = 0;
        if (!empty(Input::get("min"))) {
            $min = Input::get("min");
        }
        $max = 0;
        if (!empty(Input::get("max"))) {
            $max = Input::get("max");
        }
		
		$category = "";
        if (!empty(Input::get("category"))) {
            $category = Input::get("category");
        }

        $query = Property::where("is_delete", 0);

        if (!empty($keywords)) {
            $query->where('title', 'like', "%$keywords%");
            $query->orWhere('address', 'like', "%$keywords%");
            $query->orWhere('zip', 'like', "%$keywords%");
            $query->orWhere('city', 'like', "%$keywords%");
            $query->orWhere('state', 'like', "%$keywords%");
        }
		
		

        if (!empty($min) and ! empty($max)) {
            $query->where('price', '>=', $min);
            $query->where('price', '<=', $max);
        }


        if (!empty($bed)) {
            $query->where('beds', $bed);
        }

        if (!empty($bath)) {
            $query->where('bath', $bath);
        }
		
		if (!empty($category)) {
            $query->where('category_id', $category);
        }

        if (!empty($type)) {
            $query->where('type', $type);
        }

        $forms = array(
            "keywords" => $keywords,
            "type" => $type,
            "max" => $max,
            "min" => $min,
            "bath" => $bath,
            "bed" => $bed,
            "category" => $category
        );




        $order = "new";
        $orderby = "id";
        $ordertype = "desc";
        if (!empty(Input::get("order"))) {
            $order = Input::get("order");

            if ($order == "priceh") {
                $orderby = "price";
                $ordertype = "desc";
            }

            if ($order == "pricel") {
                $orderby = "price";
                $ordertype = "asc";
            }
        }

        $query->orderBy($orderby, $ordertype);
        $properties = $query->paginate(12);
		$categories = Category::where("is_delete",0)->get();
        $agents = Agent::limit(5)->where("AccessLevel" , 1)->where("is_delete",0)->get();
        return view('list_listing', ["categories" => $categories,"forms" => $forms, "order" => $order, 'agents' => $agents, 'properties' => $properties]);
    }
	

    /**
     * Show the application Map Listing.
     *
     */
    public function mapListing() {
        $keywords = "";
        if (!empty(Input::get("keywords"))) {
            $keywords = Input::get("keywords");
        }


        $type = "";
        if (!empty(Input::get("type"))) {
            $type = Input::get("type");
        }

        $bed = "";
        if (!empty(Input::get("bed"))) {
            $bed = Input::get("bed");
        }
        $bath = "";
        if (!empty(Input::get("bath"))) {
            $bath = Input::get("bath");
        }

        $min = 0;
        if (!empty(Input::get("min"))) {
            $min = Input::get("min");
        }
        $max = 0;
        if (!empty(Input::get("max"))) {
            $max = Input::get("max");
        }

        $query = Property::where("is_delete", 0);

        if (!empty($keywords)) {
            $query->orWhere('title', 'like', "%$keywords%");
            $query->orWhere('address', 'like', "%$keywords%");
            $query->orWhere('zip', 'like', "%$keywords%");
            $query->orWhere('city', 'like', "%$keywords%");
            $query->orWhere('state', 'like', "%$keywords%");
        }

        if (!empty($min) and ! empty($max)) {
            $query->where('price', '>=', $min);
            $query->where('price', '<=', $max);
        }


        if (!empty($bed)) {
            $query->where('beds', $bed);
        }

		 if (!empty($category)) {
            $query->where('category_id', $category);
        }
        if (!empty($bath)) {
            $query->where('bath', $bath);
        }

        if (!empty($type)) {
            $query->where('type', $type);
        }

        $forms = array(
            "keywords" => $keywords,
            "type" => $type,
            "max" => $max,
            "min" => $min,
            "bath" => $bath,
            "bed" => $bed
        );



        $order = "new";
        $orderby = "id";
        $ordertype = "desc";
        if (!empty(Input::get("order"))) {
            $order = Input::get("order");

            if ($order == "priceh") {
                $orderby = "price";
                $ordertype = "desc";
            }

            if ($order == "pricel") {
                $orderby = "price";
                $ordertype = "asc";
            }
        }

        $query->orderBy($orderby, $ordertype);
        $all_properties = $query->get();
        $properties = $query->paginate(12);


        $agents = Agent::limit(5)->where("AccessLevel" , 1)->where("is_delete",0)->get();
        return view('maplisting', ["forms" => $forms, "order" => $order, 'agents' => $agents, 'all_properties' => $all_properties, 'properties' => $properties]);
    }

    public function detail($id) {
        $property = Property::find($id);
		if(!$property) { 
			return view("errors.propertynotfound");
		}
		$categories = Category::where("is_delete",0)->get();
        $features = DB::table("features")->where("is_delete",0)->get();
        $agent = Agent::find($property->agent_id);
        $property_photos = DB::table('supporting_images')->where("property_id", $id)->get();

        return view('detail', ['categories' => $categories,'agent' => $agent, 'features' => $features, 'property' => $property, 'property_photos' => $property_photos]);
    }

    /**
     * Show the Agents.
     *
     */
    public function agents() {
        $agents = Agent::where("AccessLevel" , 1)->where("is_delete",0)->get();
        return view('pages.agent', ['agents' => $agents]);
    }

    /**
     * Show the Contact Page.
     *
     */
    public function contact() {
        return view('pages.contact');
    }

    /**
     * Show the Loan Calculator Page.
     *
     */
    public function calculator() {
        return view('pages.calculator');
    }

    /**
     * About Us Page.
     *
     */
    public function about() {
		$page = DB::table("pages")->where("id" , 1)->first();
        return view('pages.about' , ["page" => $page]);
    }

    /**
     * Agent Profile Page.
     *
     */
    public function profile() {
        $user = User::find(Auth::user()->id);
        return view('profile', ['user' => $user, 'title', "My Profile"]);
    }
	
	
	/**
     * Gallery Page.
     *
     */
    public function gallery() {
		$dirname = "assets/gallery/";
		$dirname_thumb = "assets/gallery/thumbnails/";
        $images = glob($dirname . "*.jpg");
        $images_thumb = glob($dirname_thumb . "*.jpg");
		$all_images = array();
		foreach($images_thumb as $key) { 
			$all_images[] = $key;
		}
		
		
        return view('pages.gallery', ['images' => $all_images, 'title', "My Gallery"]);
    }

    /**
     * Contact Send Request Ajax Call.
     *
     */
    public function send_request(Request $request) {
        if ($request->input("property_id")) {
            $property_id = $request->input("property_id");
        } else {
            $property_id = 0;
        }

		$setting = get_setting();
        $email = $request->Input("email");
        $name = $request->Input("name");
        $msg = $request->Input("message");
        $phone = $request->Input("phone");

		$to_email = $setting->email;
        $data_contact = array(
            "property_id" => $property_id,
            "name" => $request->input("name"),
            "phone" => $request->input("phone"),
            "email" => $request->input("email"),
            "message" => $request->input("message")
        );
        $insert_id = DB::table("customers_request")->insertGetId($data_contact);
        //$data = array('phone' => $phone, 'title' => 'Contact Request', 'email' => $email, 'name' => $name, 'msg' => $msg);
        // Mail::send(
                // 'email_template', $data, function ($header) use ($email, $name ,$to_email ) {
            // $header->from($email, $name);
            // $header->to($to_email)->subject("Contact Request");
        // }
      //  );


        return $insert_id;
    }
	
	function newsletter_subscription(Request $request) { 
		$email = $request->input("email");
		if(DB::table("newsletter")->where("email" ,  $email)->first()) { 
			return "Already Subscribed";
		} else { 
			DB::table("newsletter")->insertGetId(array("email" => $email));
			return "Subscribed Successfully";
		}
	}
	
	
	public function pagesView($slug) { 
		$page = DB::table("pages")->where("slug" , $slug)->first();
		if(!$page)
        return view('errors.404');
        return view('pages.allpages' , ["page" => $page]);
	}
	
	public function blog() { 
		$keyword = Input::get("keyword");
		$blogs = DB::table("blogs")->where("title" ,"like" ,"%$keyword%")->orWhere("body" ,"like", "%$keyword%")->orderBy("id" , "DESC")->paginate(6);
		if(!$blogs)
        return view('errors.404');
        return view('pages.blog' , ["blogs" => $blogs]);
	}
	
	public function blogDetail($id) { 
		$blog = DB::table("blogs")->where("id" , $id)->first();
		if(!$blog)
        return view('errors.404');
        return view('pages.blogDetail' , ["blog" => $blog]);
	}

}
