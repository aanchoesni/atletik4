<?php

class Registrasi extends BaseModel
{
    protected $table = 'schools'; //mengambil nama tabel yang tidak sama dengan nama model

    public static $rules = [
        'jenjang'              => 'required',
        'name'                 => 'required|unique:schools',
        'adstreet'             => 'required',
        'advillage'            => 'required',
        'addistricts'          => 'required',
        'adcity'               => 'required',
        'adpostalcode'         => 'required',
        'adphone'              => 'required',
        'hmname'               => 'required',
        // 'hmphone'              => 'required',
        'hmmobile'             => 'required',
        'syarat'               => 'required',
        'g-recaptcha-response' => 'required|recaptcha',
    ];

    protected $fillable = [
        'jenjang',
        'name',
        'adstreet',
        'advillage',
        'addistricts',
        'adcity',
        'adphone',
        'adphone',
        'hmname',
        'hmphone',
        'hmmobile',
        'user_id',
    ];
}
