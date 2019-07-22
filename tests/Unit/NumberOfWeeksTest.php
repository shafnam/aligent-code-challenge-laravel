<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NumberOfWeeksTest extends TestCase
{
    /**
     * A basic unit test example.
     * It tests whether the number of weeks 
     * between 1st and 22nd is equal to 3 weeks
     * @return void
     * @test 
     */
    public function the_number_of_weeks_between_two_datetime_parameters()
    {
        $start_date = '07/01/2019 9:35 PM';
        $end_date = '07/22/2019 9:35 PM';
        $start = strtotime($start_date);
        $end = strtotime($end_date);
        
        $expected = 3;        
        $actual = calculateNumberOfWeeks($start, $end);

        $this->assertEquals($expected, $actual);
    }
}
