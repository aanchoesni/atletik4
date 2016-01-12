<?php

class Valid extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['validation', 'user_id'];

    public function valid()
    {
        return $this->belongsTo('User', 'user_id');
    }
}
