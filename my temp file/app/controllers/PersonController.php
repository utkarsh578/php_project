<?php

class PersonController extends BaseController
{
	public function add_person()
	{
		return View::make('person')
		->with('title','Add new Person');
	}
	public function adding()
	{
		$name=Input::get('name');
		$mobno=Input::get('mobno');
		$roomno=Input::get('roomno');
		DB::insert('insert into person (name,mobno,roomno) values (?, ?,?)', array($name, $mobno,$roomno));
		/*Person::create(array(
				'name'=>Input::get('name'),
				'mobno'=>Input::get('mobno'),
				'roomno'=>Input::get('roomno'),	
			));*/
		return Redirect::to('/allperson')->with('message','User has been added');
	}
	public function allperson()
	{	return View::make('allperson')
		->with('person',Person1::all());
	}
	public function delete_person($id)
	{
		if(!$user = Person1::find($id))
		{
			return Redirect::to('/allperson')->with('message','User does not exist');
		}
		$user->delete();
		return Redirect::to('/allperson')->with('message','User deleted');		

	}
	public function edit_person($id)
	{
		$user = Person1::find($id);
		return View::make('person')->with('personvalue',$user)->with('message','Edit your content');
	}
	public function addedit_person($id)
	{
		$name=Input::get('name');
		$mobno=Input::get('mobno');
		$roomno=Input::get('roomno');
		DB::update('update person set name = ?,mobno = ?,roomno = ? where id = ? ', array($name,$mobno,$roomno,$id));
		return Redirect::to('/allperson')->with('message','User has been edited');
	}
}
