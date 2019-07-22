<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     * It tests whether the start date is empty
     * @return void
     * @test 
     */
    public function to_validate_start_date()
    {
        $this->post('/', ['start' => ''])->assertSessionHasErrors('start');
    }

    /**
     * A basic unit test example.
     * It tests whether the end date is empty
     * @return void
     * @test 
     */
    public function to_validate_end_date()
    {
        $this->post('/', ['end' => ''])->assertSessionHasErrors('end');
    }
}
