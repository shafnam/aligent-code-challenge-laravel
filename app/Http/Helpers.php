<?php
    /**
     * Find the complete number of days between two datetime parameters
     * @param $start
     * @param $end
     * @return integer
     */
    function calculateNumberOfDays($start,$end){
        $datediff = ($start - $end);
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds 
        $number_of_days = abs($datediff / (60 * 60 * 24)); // gets the positive value
        $number_of_days = floor($number_of_days); // gets the complete value        
        return $number_of_days;
    }

    /**
     * Find the number of complete weekdays between two datetime parameters
     * @param $start
     * @param $end
     * @return integer
     */
    function calculateNumberOfWeekDays($start,$end){
        
        $no_days = 0;
        $weekends = 0;

        /**If start is bigger than end
         * Then swap start and end 
         *  and calculate with the start date
         * */
        if ($start > $end) {
            $stime = $start;
            $start = $end;
            $end = $stime;
        } 
        
        while($start <= $end){

            $no_days++; // no of days in the given date range   
            $what_day = date('N',$start); // N - The ISO-8601 numeric representation of a day (1 for Monday, 7 for Sunday)            
            if($what_day > 5) { // 6 and 7 are weekend days
                $weekends++;
            }             
            $start += 86400; // +1 day                    
        }
        
        $number_of_week_days = $no_days - $weekends;

        return $number_of_week_days;
    }

?>
