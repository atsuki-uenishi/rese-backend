<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'area_id' => 'required',
        'genre_id' => 'required',
        'overview' => 'required',
        'img_path' => 'required'
    );

    public  function area() {
        return $this->belongsTo('App\Models\Area');
    }
    public  function genre() {
        return $this->belongsTo('App\Models\Genre');
    }
    public  function likes() {
        return $this->hasMany('App\Models\Like');
    }
    public  function reservations() {
        return $this->hasMany('App\Models\Reservation');
    }
    public  function reviews() {
        return $this->hasMany('App\Models\Review');
    }

}
