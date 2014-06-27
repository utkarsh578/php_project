<?php

class Personinfo extends Eloquent{

	protected $table = "personhotel";
	protected $fillable = ['name','mobno','roomid'];

	public static function getdata()
	{
		return DB::table('personhotel')
        ->leftJoin('roomaddress', 'roomid', '=', 'roomaddress.id')
        ->get();
	}

	public static function insertpersonrecord($name,$mobno,$roomid)
	{
		return DB::insert('insert into personhotel (name,mobno,roomid) values (?,?,?)',array($name,$mobno,$roomid));
	}
	public static function deleteuser($id)
	{
		return DB::delete('delete from personhotel where userid = ?',array($id));
	}
	public static function finduser($id)
	{
		return DB::select('select * from personhotel where userid= ?',array($id));
	}
	public function edituser($id)
	{
		return DB::select('select * from personhotel,roomaddress where roomid=roomaddress.id and (personhotel.userid=?)',array($id));
	}
	public static function addedituser($name,$mobno,$roomid,$userid)
	{
		//return "utkarsh";
		return DB::update('update personhotel set name = ?,mobno = ?,roomid = ? where userid= ?', array($name,$mobno,$roomid,$userid));
	}

}