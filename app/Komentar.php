<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentari';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sadrzaj', 'objava_id', 'korisnik_id'
    ];

    public function objava()
    {
        return $this->belongsTo('App\Objava', 'objava_id');
    }

    public function autor()
    {
        return $this->belongsTo('App\User', 'korisnik_id');
    }
}
