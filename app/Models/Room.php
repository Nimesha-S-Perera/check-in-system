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
    public $timestamps = false;

    public function bookings()
    {
        return $this->hasMany('App\Models\booking','roomID');
    }

    protected $fillable = [
        'roomNo',
        'roomType',
        'status',
    ];

}
