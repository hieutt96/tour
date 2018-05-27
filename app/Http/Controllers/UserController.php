<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\DTour;
use Auth;
class UserController extends Controller
{
    public function home(){
    	$tours = Tour::paginate(10);
    	return view('/welcome',compact('tours'));
    }

    public function cancelTour(Request $r){
    	$tour_id = $r->tour_id;
    	DTour::where('user_id',Auth::user()->id)->where('tour_id',$tour_id)->delete();
		return response()->json(['success'=>'success']);
    }

    public function joinTour(Request $r){
    	$dtour = new DTour;
    	$dtour->user_id = Auth::user()->id;
    	$dtour->tour_id = $r->tour_id;
    	$dtour->save();
    	return response()->json(['success'=>'success']);
    }	
}
