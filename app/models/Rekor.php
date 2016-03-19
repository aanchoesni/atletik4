<?php

class Rekor extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'nolomba'    => 'required',
        'nama'       => 'required',
        'pendidikan' => 'required',
        'prestasi'   => 'required',
        'tahun'      => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['tingkat', 'nolomba', 'nama', 'pendidikan', 'prestasi', 'tahun', 'urut'];

}
