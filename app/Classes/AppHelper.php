<?php

namespace App\Classes;

use App\User;


class AppHelper
{
   public static function findUserViaPhone($phone){
       return User::where('phone',$phone)->first();
   }
}
