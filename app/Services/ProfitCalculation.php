<?php

namespace App\Services;

use App\User;
use App\Order;
use App\Refer;
use App\UserProfit;

class ProfitCalculation
{
    CONST FIRST_PARENT = 15; //PERCENTAGE OF FIRST PARENT
    CONST SECOUND_PARENT = 10; //PERCENTAGE OF SECOUND PARENT
    CONST THIRD_PARENT = 8; //PERCENTAGE OF THIRD PARENT
    CONST REST_OF_ALL_PARENT = 5; //PERCENTAGE OF THIRD PARENT

    protected $user,$order;

    public function __construct(User $user, Order $order){
        $this->user = $user;
        $this->order = $order;
        $this->giveProfitwhenDelivered($this->user, $this->order);
    }


    protected function giveProfitwhenDelivered(User $user, Order $order){
        if ($user->referDetails->path == 0) {
            return;
        }
        UserProfit::create([
            'user_id' => $user->id,
            'profit_to' => $this->myFirstParent($user),
            'amount' => ($order->total_after_coupon*self::FIRST_PARENT)/100,
        ]);

        if ($this->mySecoundParent($user)) {
             UserProfit::create([
                'user_id' => $user->id,
                'profit_to' => $this->mySecoundParent($user),
                'amount' => ($order->total_after_coupon*self::SECOUND_PARENT)/100,
            ]);
        }

        if ($this->myMinorParent($user)) {
           foreach ($this->myMinorParent($user) as $parent){
                UserProfit::create([
                    'user_id' => $user->id,
                    'profit_to' => $parent,
                    'amount' => ($order->total_after_coupon*self::REST_OF_ALL_PARENT)/100,
                ]);
            }
        }
        
    }





    public static function newUserReferralPath(User $user,$referdBy){
    	if ($referdBy->path == 0) {
    		return $referdBy->user_id.'/'.$user->id;
    	}else{
    		return $referdBy->path.'/'.$user->id;
    	}
    }


    public static function myreferrelUsers(User $me){
    	$myPath = $me->referDetails->path;
    	$myUsers = Refer::where('path','like','%'.$myPath.'/%')->pluck('user_id');
    	$users = User::whereIn('id',$myUsers)->get();
    	(new self)->myMinorParent($me);
    }


    // public static function myreferrelUsersCount(User $me){
    // 	$myPath = $me->referDetails->path;
    // 	if ($myPath == 0) {
    // 		return false;
    // 	}
    // 	$myUsers = Refer::where('path','like','%'.$myPath.'/%')->count();

    // 	dd($myUsers);
    // }


    protected  function myFirstParent(User $me){
    	$myPath = $me->referDetails->path;
    	if ($myPath == 0) {
    		return false;
    	}
    	$allParent = explode('/', $myPath);
    	return $allParent[count($allParent)-2];
    }


    public static function mySecoundParent(User $me){
    	$myPath = $me->referDetails->path;
        $allParent = explode('/', $myPath);
        if (count($allParent)<3) {
            return false;
        }
        return $allParent[count($allParent)-3];
    }

    public static function myThirdParent(User $me){
    	$myPath = $me->referDetails->path;
        $allParent = explode('/', $myPath);
        if (count($allParent)<4) {
            return false;
        }
        return $allParent[count($allParent)-4];
    }


    protected function myMinorParent(User $me){
    	$myPath = $me->referDetails->path;
    	$allMinorParent = explode('/', $myPath);

        $count = count($allMinorParent);
        if ($count<4) {
            return false;
        }

        $allMinorParent[$count-1];

        foreach ($allMinorParent as $index => $parent){
            if ($index == $count-1 || $index == $count-2 || $index == $count-3) {
                unset($allMinorParent[$index]);
            }
        }

        return $allMinorParent;
    }
}