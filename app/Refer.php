<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Refer extends Model
{
    protected $guarded = ['id'];

    public function user(){
    	$this->belongsTo(User::class);
    }
}
