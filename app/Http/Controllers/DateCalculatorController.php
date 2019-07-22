<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class DateCalculatorController extends Controller
{
    public function index()
    {
        $timezone = 0;
        $tz_list = tz_list();
        $data = array(
            'timezone' => $timezone,
            'tz_list' => $tz_list
            );
        return view('index')->with($data);
    }

    public function calculate(Request $request)
    {
        // Validations
        $validate_these = [
            'start' => 'required',
            'end' => 'required'
        ];

        //dd($request->input('timezone'));

        if( $request->has('timezone') )
        {
            $timezone = 1;
            $validate_these['s_tzone'] = 'required';
            $validate_these['e_tzone'] = 'required';
        } 
        else {
            $timezone = 0;
        } 
        

        $validator = Validator::make($request->all(),$validate_these);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }

        /** If timezone specified set the default timezone to start date timezone 
         *  else set default timezone as 'Australia/Adelaide'
         */        
        if ($request->input('s_tzone') != null) {
            $s_tzone = $request->input('s_tzone');            
            // Set start timezone as default timezone
            date_default_timezone_set($s_tzone); 
        } else {
            $s_tzone = null;
            // Set 'Australia/Adelaide' timezone as default timezone
            date_default_timezone_set('Australia/Adelaide');      
            //dd($request->input('s_tzone'));      
        }

        if ($request->input('e_tzone') != null) {
            $e_tzone = $request->input('e_tzone');
        } else {
            $e_tzone = null;
        }        
        
        $start_date = $request->input('start');
        $start = strtotime($start_date);

        $end_date = $request->input('end');
        if ($e_tzone != null) {
            // add timezone conversion to end date
            $end = strtotime($end_date. ' ' . $e_tzone);
        } else{
            $end = strtotime($end_date);
        }

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
        $number_of_weeks = calculateNumberOfWeeks($start,$end);
        
        $tz_list = tz_list();

        $data = array(
            'timezone' => $timezone,
            'start_date'=>$start_date,
            'end_date'=>$end_date, 
            'number_of_days' => $number_of_days, 
            'number_of_week_days' => $number_of_week_days, 
            'number_of_weeks' => $number_of_weeks,
            'convert_to' => $convert_to,
            'diff_in_convert_value' => $diff_in_convert_value,
            'tz_list' => $tz_list,
            's_tzone' =>  $s_tzone,
            'e_tzone' =>  $e_tzone
            );
        return view('index')->with($data);
    }
}
