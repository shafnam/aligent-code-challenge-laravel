<?php

    function calculateNumberOfDays($start,$end){
        $datediff = ($start - $end);
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds 
        $number_of_days = abs($datediff / (60 * 60 * 24)); // gets the positive value
        $number_of_days = floor($number_of_days); // gets the complete value        
        return $number_of_days;
    }

?>
