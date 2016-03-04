<?php

class Setting extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['startdayreg', 'enddayreg', 'startdaypay', 'enddaypay', 'tmday', 'tmdate', 'tmtime', 'tmplace', 'contestday', 'contestdate', 'contesttime', 'contestplace', 'moneyreg', 'moneyregest', 'moneysertatl', 'moneysertoff', 'moneydocbook', 'kejuaraan_ke', 'bank', 'norek', 'nmpembimbing', 'nopembimbing', 'nmpembimbing1', 'nopembimbing1', 'nmpembimbing2', 'nopembimbing2', 'nmketua', 'noketua', 'nmsek', 'nosek', 'nmben', 'noben', 'facebook', 'twitter'];

}
