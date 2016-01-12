<?php

class Payment extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
        'method'      => 'required',
        'paymentdate' => 'required',
        'amount'      => 'required',
        'attachment'  => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['noinvoice', 'method', 'paymentdate', 'amount', 'message', 'school', 'year', 'attachment', 'verifikasi', 'user_id'];

    public function akun()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function schoolpay()
    {
        return $this->belongsTo('School', 'user_id');
    }

}
