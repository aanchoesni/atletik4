<?php

class Document extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'name' => 'required|unique:documents,name',
    ];

    // Don't forget to fill this array
    protected $fillable = ['file', 'name'];

}
