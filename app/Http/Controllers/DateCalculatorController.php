<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateCalculatorController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function calculate(Request $request)
    {
        $start_date = $request->input('start');
        $start = strtotime($start_date);
        $end_date = $request->input('end');
        $end = strtotime($end_date);
        // Get number of days using helper function
        $number_of_days = calculateNumberOfDays($start, $end);
        // Get number of week days using helper function
        $number_of_week_days = calculateNumberOfWeekDays($start,$end); 
        $number_of_weeks = calculateNumberOfWeeks($start,$end); 

        $data = array(
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'number_of_days' => $number_of_days,
            'number_of_week_days' => $number_of_week_days,
            'number_of_weeks' => $number_of_weeks
            );

        return view('index')->with($data);
    }
}
