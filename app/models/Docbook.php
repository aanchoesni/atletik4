<?php

class Docbook extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['docbook', 'user_id'];

    public function akun()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function sklh()
    {
        return $this->belongsTo('School', 'user_id', 'user_id');
    }
}
