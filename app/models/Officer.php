<?php

class Officer extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
        'name' => 'required',
        // 'notlp'=>'required',
        'nohp' => 'required',
        'type' => 'required',
        'foto' => 'image|max:512',
    ];

    // Don't forget to fill this array
    protected $fillable = ['name', 'notlp', 'nohp', 'type', 'sertifikat', 'foto', 'user_id'];

}
