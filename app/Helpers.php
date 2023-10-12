<?php

namespace App\Helpers;


class Helper {

   public static function generateOTP(){
       return rand(100000, 999999);
   }
}
