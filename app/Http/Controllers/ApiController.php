<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use App\property;
use App\Agent;
use DB;
use Illuminate\Support\Facades\Input;
use Validator;

class ApiController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $properties = property::where("is_delete" , 0)->orderBy("id", "DESC")->get();
        if ($properties) {
            return Response::json(
                            array(
                        'status' => true,
                        'data' => $properties
                            ), 200
            );
        } else {
            return Response::json(
                            array(
                        'error' => [
                            'message' => "Something wrong with your Information"
                        ]
                            ), 404
            );
        }
    }
	
	
	  public function sliders() {
        $sliders = DB::table('slider')->get();
        if ($sliders) {
            return Response::json(
                            array(
                        'status' => true,
                        'data' => $sliders
                            ), 200
            );
        } else {
            return Response::json(
                            array(
                        'error' => [
                            'message' => "Something wrong with your Information"
                        ]
                            ), 404
            );
        }
    }
	
	
	 public function listings() {
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
            $query->where('title', 'like', "%$keywords%");
            $query->orWhere('address', 'like', "%$keywords%");
            $query->orWhere('zip', 'like', "%$keywords%");
            $query->orWhere('city', 'like', "%$keywords%");
            $query->orWhere('state', 'like', "%$keywords%");
        }
		$properties = $query->get();
        if ($properties) {
            return Response::json(
                            array(
                        'status' => true,
                        'data' => $properties
                            ), 200
            );
        } else {
            return Response::json(
                            array(
                        'error' => [
                            'message' => "Something wrong with your Information"
                        ]
                            ), 404
            );
        }
    }
	

    public function featured() {
        $properties = property::where("featured", 1)->orderBy("id", "DESC")->limit(5)->get();
        if ($property) {
            return Response::json(
                            array(
                        'status' => true,
                        'data' => $properties
                            ), 200
            );
        } else {
            return Response::json(
                            array(
                        'error' => [
                            'message' => "Something wrong with your Information"
                        ]
                            ), 404
            );
        }
    }

    public function detail($id) {
        $property = property::where("id", $id)->first();
		$property->agent = Agent::select("name","phone","email")->where("id" , $property->agent_id)->first();
        if ($property) {
            return Response::json(
                            array(
                        'status' => true,
                        'data' => $property
                            ), 200
            );
        } else {
            return Response::json(
                            array(
                        'error' => [
                            'message' => "Something wrong with your Information"
                        ]
                            ), 404
            );
        }
    }

    public function agents() {
        $agents = Agent::get();
        if ($agents) {
            return Response::json(
                            array(
                        'status' => true,
                        'data' => $agents
                            ), 200
            );
        } else {
            return Response::json(
                            array(
                        'error' => [
                            'message' => "Something wrong with your Information"
                        ]
                            ), 404
            );
        }
    }

}
