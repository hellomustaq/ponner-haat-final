<?php

namespace App\Classes;



class RawQuery
{
   public static function getAllUsersReferedByMe($userId)
    {
        return "SELECT  id,
        user_id,
        ref_user_id 
		from    (select * from refers
         order by ref_user_id, user_id) refers_sorted,
        (select @pv := '{$userId}') initialisation
		where   find_in_set(ref_user_id, @pv)
		and     length(@pv := concat(@pv, ',', user_id))";

        // return self::executeQuery($query);
    }

    public static function getLevelOneUsersReferedByMe($userId)
    {
        return "SELECT t1.id,t1.user_id,t1.ref_user_id
		FROM refers AS t1
		LEFT JOIN refers AS t2 ON t2.ref_user_id = t1.user_id
		WHERE t1.ref_user_id = '{$userId}'";

        // return self::executeQuery($query);
    }

    public static function getLevelTwoUsersReferedByMe($userId)
    {
		return "SELECT 
        t1.user_id AS levelOne,
        t2.user_id As levelTwo
		FROM refers AS t1
		LEFT JOIN refers AS t2 ON t2.ref_user_id = t1.user_id
		LEFT JOIN refers AS t3 ON t3.ref_user_id = t2.user_id

		WHERE t1.ref_user_id = '{$userId}'
		group by levelOne,levelTwo";

        // return self::executeQuery($query);
    }

    public static function getbenifitedUsers($userId)
    {
        return "SELECT @pv:=ref_user_id as ref_user_id, user_id,id 
        from refers
		join
		(select @pv:=16)tmp
		where ref_user_id=@pv";

        // return self::executeQuery($query);
    }
}
