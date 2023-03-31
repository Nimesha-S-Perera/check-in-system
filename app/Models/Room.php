<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'roomNo';
    use HasFactory;

    /*
    public function guest()
    {
        return $this->hasOne('App\Models\guest', 'roomID' ,'roomNo');
    }*/

    public function booking()
    {
        return $this->hasMany('App\Models\booking');
    }

    protected $fillable = [
        'roomNo',
        'roomSuite',
        'status',
    ];

}
