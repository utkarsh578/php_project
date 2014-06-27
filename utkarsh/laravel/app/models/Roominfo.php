<?php

class Roominfo extends Eloquent{

	protected $table = "roomaddress";
	protected $fillable = ['roomno'];
	public static function insertroom($roomno)
	{
		DB::insert('insert into roomaddress (roomno) values (?)',array($roomno));
	}
	public static function getroomid($roomno)
	{
		return Roominfo::where("roomno","=",$roomno)->first();
	}
}