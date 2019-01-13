<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    public static function updateQuantity($type_flow, $current_quantity, $quantity_update){

        if($type_flow == 'entrada')
            return $current_quantity + $quantity_update;

        return $current_quantity - $quantity_update;
    }
}
