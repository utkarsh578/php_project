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
		$roomid=Roominfo::where("roomno","=",$roomno)->first();
		if($roomid!=null)
		{
			Personinfo::insertpersonrecord($name,$mobno,$roomid->id);
		}
		else
		{
			//return "dgdfgdf";
			Roominfo::insertroom($roomno);
			$roomid1=Roominfo::getroomid($roomno);
			$roomid1=$roomid1->id;
			Personinfo::insertpersonrecord($name,$mobno,$roomid1);
		}
		//DB::insert('insert into personhotel (name,mobno,roomid) values (?, ?,?)', array($name, $mobno,$roomid));
		/*Person::create(array(
				'name'=>Input::get('name'),
				'mobno'=>Input::get('mobno'),
				'roomno'=>Input::get('roomno'),	
			));*/
		return Redirect::to('/allperson')->with('message','User has been added');
	}
	public function allperson()
	{	
		$person=Personinfo::getdata();
		return View::make('allperson',compact('person'));
	
	}
	public function delete_person($userid)
	{
		if(!$user = Personinfo::finduser($userid))
		{
			return Redirect::to('/allperson')->with('message','User does not exist');
		}
		Personinfo::deleteuser($userid);
		return Redirect::to('/allperson')->with('message','User deleted');		

	}
	public function edit_person($userid)
	{

		$user= new Personinfo;
		//dd($user);
		$user1=$user->edituser($userid);
		$usr = $user1[0];
		return View::make('person')->with('personvalue',$usr)->with('message','Edit your content');
	}
	public function addedit_person($userid)
	{
		$name=Input::get('name');
		$mobno=Input::get('mobno');
		$roomno=Input::get('roomno'); 	
		$roomid=Roominfo::getroomid($roomno);

		if($roomid!=null)
		{
			Personinfo::addedituser($name,$mobno,$roomid->id,$userid);
		}
		else
		{
			Roominfo::insertroom($roomno);
			$roomid1=Roominfo::getroomid($roomno);
			//return $userid;
			Personinfo::addedituser($name,$mobno,$roomid1['id'],$userid);


		}
		//DB::update('update personhotel set name = ?,mobno = ?,roomid = ? where userid= ?', array($name,$mobno,$roomid1['id'],$userid));
		return Redirect::to('/allperson')->with('message','User has been edited');
	}

	public function authenticate_user()
	{
		$validate=$this->loginvalidate();
		if($validate->passes())
		{
			
		}
		$credentials=$this->getcredentials();
		///Auth::attempt($credentials);
		//return $credentials;
		if(Auth::attempt($credentials))
		{
			//return "utkarsh";
			Session::flash('message', 'Welcome user');
			return Redirect::to('/dashboard');
		}
		else
		 {
		 	//return Auth::attempt($credentials);
		 	Session::flash('message', 'Invalid Username');
		 	return View::make("login");
			//Redirect::to('/')->with('message','Invalid Username');
		}
	}
	public function loginvalidate()
	{
		return Validator::make(Input::all(),[
				"username"=>"required",
				"passowrd"=>"required"
			]);
	}
public function getcredentials()
{
	return [
	"username"=>Input::get('username'),
	"password"=>Input::get('password')
	];
}
public function logout()
{
	Auth::logout();
    Session::flash('message', 'You have been successfully logged out!');
    return Redirect::to("/");
}

}