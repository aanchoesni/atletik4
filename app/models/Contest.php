<?php

class Contest extends BaseModel
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
        // 'nocontest' => 'required',
        'name'    => 'required',
        'nis'     => 'required',
        'tmptlhr' => 'required',
        'tgllhr'  => 'required',
        'foto'    => 'image|max:512',
        'rapor'   => 'image|max:1024',
    ];

    // Don't forget to fill this array
    protected $fillable = ['nocontest', 'verifikasi', 'name', 'nis', 'tmptlhr', 'tgllhr', 'nodada', 'juara', 'jenjang', 'foto', 'rapor', 'user_id', 'sertifikat'];

    public function akun()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function skema()
    {
        return $this->hasOne('Skema', 'nodada');
    }

    public function sklh()
    {
        return $this->belongsTo('School', 'user_id', 'user_id');
    }
}
