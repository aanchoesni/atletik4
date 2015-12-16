<?php

class Position extends \BaseModel {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'name' => 'required|unique:positions'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

	public function admin()
	{
		return $this->hasMany('Admin','position_id');
	}


}