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

        $data = array(
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'number_of_days' => $number_of_days
            );

        return view('index')->with($data);
    }
}
