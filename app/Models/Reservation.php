<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'user_id' => 'required',
        'store_id' => 'required',
        'date' => 'required',
        'time' => 'required',
        'number' => 'required'
    );

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function store() {
        return $this->belongsTo('App\Models\Store');
    }
}
