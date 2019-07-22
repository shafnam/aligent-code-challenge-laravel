<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NumberOfDaysTest extends TestCase
{
    /**
     * A basic unit test example.
     * It tests whether the number of days 
     * between 9th and 10th is equal to 1 days
     * @return void
     * @test 
     */
    public function the_number_of_days_between_two_datetime_parameters_without_convert_option()
    {
        $start_date = '07/09/2019 9:35 PM';
        $end_date = '07/08/2019 9:35 PM';
        $convert_to = null;
        $start = strtotime($start_date);
        $end = strtotime($end_date);
        
        $expected = 1;        
        $actual = calculateNumberOfDays($start, $end, $convert_to);

        $this->assertEquals($expected, $actual);
    }

    /**
     * A basic unit test example.
     * It tests whether the number of hours 
     * between 9th and 10th is equal to 24
     * @return void
     * @test 
     */
    public function the_number_of_days_between_two_datetime_parameters_with_convert_option()
    {
        $start_date = '07/09/2019 9:35 PM';
        $end_date = '07/08/2019 9:35 PM';
        $convert_to = 'hours';
        $start = strtotime($start_date);
        $end = strtotime($end_date);
        
        $expected = array(1,24);        
        $actual = calculateNumberOfDays($start, $end, $convert_to);

        $this->assertEquals($expected, $actual);
    }

    /**
     * A basic unit test example.
     * It tests whether the number of hours 
     * between 9th and 10th is equal to 1 day or 27 hours 
     * when start date timezone is UTC/GMT +03:00  -  Africa/Addis_ababa
     * and end date timezone is UTC/GMT +00:00  -  Africa/Abidjan
     * @return void
     * @test 
     */
    public function the_number_of_days_between_two_datetime_parameters_with_timezone_convert_option()
    {
        date_default_timezone_set('Africa/Addis_ababa'); 
        $start_date = '07/09/2019 9:35 PM';
        $end_date = '07/10/2019 9:35 PM';
        $convert_to = 'hours';
        $start = strtotime($start_date);
        $end = strtotime($end_date. ' Africa/Abidjan');
        
        $expected = array(1,27);        
        $actual = calculateNumberOfDays($start, $end, $convert_to);

        $this->assertEquals($expected, $actual);
    }
}
