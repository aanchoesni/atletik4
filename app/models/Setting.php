<?php

class Setting extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['startdayreg', 'enddayreg', 'startdaypay', 'enddaypay', 'tmday', 'tmdate', 'tmtime', 'tmplace', 'contestday', 'contestdate', 'contesttime', 'contestplace', 'moneyreg', 'moneyregest', 'moneysertatl', 'moneysertoff', 'moneydocbook', 'kejuaraan_ke', 'nmpembimbing', 'nopembimbing', 'nmketua', 'noketua', 'nmsek', 'nosek', 'nmben', 'noben', 'facebook', 'twitter'];

}
