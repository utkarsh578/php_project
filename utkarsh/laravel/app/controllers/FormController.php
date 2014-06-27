<?php

class FormController extends BaseController
{
	public function add_details()
	{
		Session::flash('message','Welcome! Please Fill the form');
		return View::make('form');
	}

	public function adding_info()
	{
		$id=Input::get('id');
		$details=Input::get('details');;
		//return $id;
		Formdetails::addinginfo($id,$details);
		//Session::flash('message','added to db');
		return Redirect::to('/form')->with('message','added to db');
	}
	public function get_info($id)
	{
		return Formdetails::where("id","=",$id)->first();
	}
}
