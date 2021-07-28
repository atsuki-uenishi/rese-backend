<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'store_id' => 'required'
    );

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function store() {
        return $this->belongsTo('App\Models\Store');
    }
    public function area() {
        return $this->belongsTo('App\Models\Area');
    }
    public function genre() {
        return $this->belongsTo('App\Models\Genre');
    }
}
