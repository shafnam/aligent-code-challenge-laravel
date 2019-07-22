<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NumberOfWeekDaysTest extends TestCase
{
    /**
     * A basic unit test example.
     * It tests whether the number of week days 
     * between 9th and 19th is equal to 8 days
     * @return void
     * @test 
     */
    public function the_number_of_week_days_between_two_datetime_parameters()
    {
        $start_date = '07/09/2019 9:35 PM';
        $end_date = '07/19/2019 9:35 PM';
        $start = strtotime($start_date);
        $end = strtotime($end_date);
        
        $expected = 8;        
        $actual = calculateNumberOfWeekDays($start, $end);

        $this->assertEquals($expected, $actual);
    }
}
