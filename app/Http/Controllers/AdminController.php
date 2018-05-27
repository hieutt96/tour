<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\User;
use App\Place;
use Auth;
class AdminController extends Controller
{
    function __construct($foo = null)
    {
    	// $this->foo = $foo;
    }

    public function manageTour(){
    	$user_id = Auth::user()->id;
    	$tours = Tour::where('user_id',$user_id)->paginate(1);
    	return view('admin.manage_tour',compact('tours'));
    }

    public function addTour(){
    	return view('admin.add_tour');
    }

    public function postAddTour(Request $r){
		$tour = new Tour;
		$tour->name = $r->name;
		$tour->user_id = Auth::user()->id;
		$tour->description = $r->description;
		$tour->vehicle = $r->vehicle;
		$tour->time = $r->time;
		$tour->cost = $r->cost;
		$tour->start_address = $r->start_address;
		if($r->hasFile('cover')){
			$file = $r->file('cover');
			$time = time();	
			$file->move(public_path().'/image/tour/',$time.$file->getClientOriginalExtension());
			$tour->cover= '/image/tour/'.$time.$file->getClientOriginalExtension();
		}
		$tour->save();
		return redirect('/admin/manage-tour')->with('success',"Success");
    }

    public function editTour(Request $r){
    	$tour = Tour::find($r->id);
    	// dd($tour);
    	return view('admin.edit_tour',compact('tour'));
    }

    public function postEditTour(Request $r){
		$tour = Tour::where('id',$r->id)->first();
		$tour->name = $r->name;
		$tour->user_id = Auth::user()->id;
		$tour->description = $r->description;
		$tour->vehicle = $r->vehicle;
		$tour->time = $r->time;
		$tour->cost = $r->cost;
		$tour->start_address = $r->start_address;
		if($r->hasFile('cover')){
			$file = $r->file('cover');
			$time = time();	
			$file->move(public_path().'/image/tour/',$time.$file->getClientOriginalExtension());
			$tour->cover= '/image/tour/'.$time.$file->getClientOriginalExtension();
		}
		$tour->save();
		return redirect('/admin/manage-tour')->with('success',"Success");
    }

    public function delete(Request $r){
    	$tour = Tour::find($r->id);
    	$tour->delete();
    	return redirect('/admin/manage-tour')->with('success',"Success"); 
    }

    public function addPlace(Request $r){
    	$tour = Tour::find($r->id);
    	return view('admin.add_place',compact('tour'));
    }

    public function postAddPlace(Request $request){
    	$id = $request->id;
    	$data = $request->data;	
    	foreach($data as $d){
    		$place = new Place;
    		$place->name = $d['name'];
    		$place->description = $d['description'];
    		$place->tour_id = $id;
    		$place->save();
    	}
    	return response()->json(['success'=>'success']);
    }
}
