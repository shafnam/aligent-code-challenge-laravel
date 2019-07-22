<?php
    /**
     * Find the complete number of days between two datetime parameters
     * @param $start
     * @param $end
     * @return integer
     */
    function calculateNumberOfDays($start,$end,$convert_to=null){
        $datediff = ($start - $end);
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds 
        $number_of_days = abs($datediff / (60 * 60 * 24)); // gets the positive value
        $number_of_days = floor($number_of_days); // gets the complete value

        if($convert_to != null) { 
            if($convert_to == 'seconds') {
                $datediffInConvertField = abs( $datediff);
            }
            else if($convert_to == 'minutes') {
                $datediffInConvertField = abs( $datediff / 60 ) ;
            }
            else if($convert_to == 'hours') {
                $datediffInConvertField = abs($datediff / (60 * 60)) ;
            }
            else if($convert_to == 'years') {
                $datediffInConvertField = abs(round($datediff / (60 * 60 * 24 * 365.25))) ;
            }
            // return array as function result
            return array($number_of_days, $datediffInConvertField);
        } else {
            // return only the number of days
            return $number_of_days;
        }
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

        $start += 86400; // dont consider the start day

        while($start <= $end){
            $no_days++; // no of days in the given date range   
            $what_day = date('N',$start); // N - The ISO-8601 numeric representation of a day (1 for Monday, 7 for Sunday)            
            if($what_day > 5) { // 6 and 7 are weekend days
                $weekends++;
            }             
            $start += 86400; // +1 day                    
        }
        
        $number_of_week_days = $no_days - $weekends;

        if($number_of_week_days < 1){ // do not return negative value instead return 0
            $number_of_week_days = 0;
        }

        return $number_of_week_days;
    }

    /**
     * Find the number of complete weeks between two datetime parameters
     * @param $start
     * @param $end
     * @return integer
     */
    function calculateNumberOfWeeks($start,$end,$convert_to){
        if($convert_to != null){
            $datediff = calculateNumberOfDays($start,$end,$convert_to)[0];
            //dd($datediff);
        } else {
            $datediff = calculateNumberOfDays($start,$end,$convert_to);
        }
        $number_of_weeks = floor($datediff / 7);
        //dd($number_of_weeks);
        return $number_of_weeks;
    }

?>
