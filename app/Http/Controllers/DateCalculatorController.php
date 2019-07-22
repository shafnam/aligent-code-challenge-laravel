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
        if ($request->has('convert_to')) {
            $convert_to = $request->input('convert_to');
        } else {
            $convert_to = null;
        }
        //dd($convert_to);

        if($convert_to != null){
            // Value given to convert the number of days
            $number_of_days = calculateNumberOfDays($start, $end, $convert_to)[0];
            $diff_in_convert_value = calculateNumberOfDays($start, $end, $convert_to)[1];
        } else {
            $number_of_days = calculateNumberOfDays($start, $end, $convert_to);
            $diff_in_convert_value = null;
        }

        $number_of_week_days = calculateNumberOfWeekDays($start,$end);   
        $number_of_weeks = calculateNumberOfWeeks($start,$end,$convert_to);         

        $data = array(
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'number_of_days' => $number_of_days,
            'number_of_week_days' => $number_of_week_days,
            'number_of_weeks' => $number_of_weeks,
            'convert_to' => $convert_to,
            'diff_in_convert_value' => $diff_in_convert_value
            );

        return view('index')->with($data);
    }
}
