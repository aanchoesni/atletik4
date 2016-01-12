<?php

class School extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['jenjang', 'name', 'adstreet', 'advillage', 'addistricts', 'adcity', 'adpostalcode', 'adphone', 'hmname', 'hmphone', 'hmmobile', 'user_id'];

    public function akun()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function payment()
    {
        return $this->hasMany('Payment', 'user_id');
    }
}
