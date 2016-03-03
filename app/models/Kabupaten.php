<?php

class Kabupaten extends \Eloquent
{

    protected $table = 'kabupaten';
    // Add your validation rules here
    public static $rules = [
        'name' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['name'];

}
