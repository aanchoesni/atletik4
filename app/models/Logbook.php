<?php

class Logbook extends \BaseModel
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
        'kegiatan' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['hari', 'tgl', 'tempat', 'kegiatan', 'hasil', 'user_id'];

}
