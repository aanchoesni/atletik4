<?php

class Skema extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'seri'   => 'required',
        'nolint' => 'required',
        'nodada' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['jenjang', 'tahun', 'lomba', 'seri', 'nolint', 'nodada'];

    public function contest()
    {
        return $this->belongsTo('Contest', 'nodada');
    }

}
