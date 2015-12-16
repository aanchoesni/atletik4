<?php

class Setting extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['startdayreg', 'enddayreg', 'startdaypay', 'enddaypay', 'tmday', 'tmdate', 'tmtime', 'tmplace', 'contestday', 'contestdate', 'contesttime', 'contestplace', 'moneyreg', 'moneyregest', 'moneysertoff', 'moneydocbook'];

}
