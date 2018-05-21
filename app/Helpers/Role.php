<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class Role {

    public static function system_roles() {
        return [
            'admin' => [
                'name' => 'Administrator',
                'capabilities' => [
                    'admin_cap',
                    'add_product',
                    'delete_product',
                    'add_category',
                    'delete_category',
                ],
            ],
            'customer' => [
                'name' => 'Subscriber',
                'capabilities' => [
                ],
            ]
        ];
    }

    
    public static function get() {
        $system_roles = self::system_roles();

        $return = [];
        foreach ($system_roles as $key => $value) {
            $return[$key] = $value['name'];
        }
        return $return;
    }

    public static function is_admin() {
    	return self::is('admin');
    }

    public static function is($role) {
    	
    	if (Auth::check()) {
            $current_user_role = Auth::user()->role;
        } else {
        	return false;
        }

        if (is_array($role)) {
        	return in_array($current_user_role, $role);
        }else{
        	return ($role == $current_user_role);	
        }

        

    }

    public static function can($capability = null, $param = null, $and = true) {

        if ($capability == null) {
            return Auth::check();
        }

        if (Auth::check()) {
            $current_user_role = Auth::user()->role;
            $current_user_id = Auth::user()->id;
        } else {
            $current_user_role = 'public';
            $current_user_id = 0;
        }

        $system_roles = self::system_roles();
        $capabilities = (isset($system_roles[$current_user_role]['capabilities'])) ? $system_roles[$current_user_role]['capabilities']: [];

        if (is_array($capability)) {

            if ($and) {
            	$have = [];
            	foreach ($capability as $value) {
            		if(in_array($value, $capabilities)){
            			$have[] = 1;
            		}
            	}
        		return count($have) == count($capability);
            } else {
            	foreach ($capability as $value) {
                    if (in_array($value, $capabilities)) {
                        return true;
                    }
                }
            }

        } else {

            switch ($capability) {

                // Special cases for role capability check
                case 'user_delete':
                case 'user_edit_role':
                    $user_id = $param;
                    if ($user_id != $current_user_id && in_array($capability, $capabilities)) {
                        return true;
                    }

                    break;

                default :
                    if (in_array($capability, $capabilities)) {
                        return true;
                    }
            }
        }


        return false;
    }

    public static function get_role_name($role) {
        $system_roles = self::system_roles();
        return (isset($system_roles[$role]['name'])) ? $system_roles[$role]['name'] : '';
    }

}