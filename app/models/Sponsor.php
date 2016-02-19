<?php

class Sponsor extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'name' => 'required',
        'logo' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['name', 'url', 'logo'];

}
