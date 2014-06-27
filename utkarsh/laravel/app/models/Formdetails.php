<?php

class Formdetails extends \Eloquent
{
	protected $table = "formdetails";

	public static function addinginfo($id,$details)
	{
	
	return DB::insert('insert into formdetails (id,details) values (?,?)',array($id,$details));
		
	}
	
	
}