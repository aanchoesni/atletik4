<?php

class Setting extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['startdayreg', 'enddayreg', 'startdaypay', 'enddaypay', 'tmday', 'tmdate', 'tmtime', 'tmplace', 'contestsmaday', 'contestsmadate', 'contestsmatime', 'contestsmaplace', 'contestsmpday', 'contestsmpdate', 'contestsmptime', 'contestsmpplace', 'contestsdday', 'contestsddate', 'contestsdtime', 'contestsdplace', 'moneyreg', 'moneyregest', 'moneysertatl', 'moneysertoff', 'moneydocbook', 'kejuaraan_ke', 'bank', 'norek', 'kodebank', 'an', 'nmpembimbing', 'nopembimbing', 'nmpembimbing1', 'nopembimbing1', 'nmpembimbing2', 'nopembimbing2', 'nmketua', 'noketua', 'nmsek', 'nosek', 'nmben', 'noben', 'facebook', 'twitter'];

}
