<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objava extends Model
{
    protected $table = 'objave';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naslov', 'podnaslov', 'istaknuta', 'sadrzaj', 'autor_id'
    ];

    public function autor()
    {
        return $this->belongsTo('App\User', 'autor_id');
    }
}
