<?php

class Menu extends BaseModel
{

    // protected $table = 'users'; //mengambil nama tabel yang tidak sama dengan nama model
    // Add your validation rules here
    public $timestamps = false;

    // Don't forget to fill this array
    protected $fillable = ['menu', 'tipe'];
}
