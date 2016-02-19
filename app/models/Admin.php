<?php

class Admin extends \BaseModel
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
        'noi'         => 'required',
        'name'        => 'required',
        'position_id' => 'required',
        'tahun'       => 'required',
    ];

    // Don't forget to fill this arrayp
    protected $fillable = ['noi', 'name', 'position_id', 'tahun', 'user_id'];

    public function position()
    {
        // return $this->belongsTo('Position', 'position_id');
        return $this->belongsTo('Position', 'position_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function delete()
    {
        $this->user()->delete();

        return parent::delete();
    }

}
