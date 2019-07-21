@extends('layouts.app')
@section('content')

	<h2>Simple Time and Date Calculator with Timezone Conversion</h2>
	
	<form class="mt-5" method="POST" action="{{ route('calculate') }}">
        {{ csrf_field() }}  

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-control">Select start date</label>
                    <input type="text" class="form-control datetimepicker_start" name="start">
                </div>                    
            </div>                    
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-control">Select end date</label>
                    <input type="text" class="form-control datetimepicker_end" name="end">
                </div>                    
            </div>
        </div>

        <?php if(isset($start_date) && isset($end_date)) { ?>

        <div class="title mt-3">
            <p>
                From (Not included): <b>{{ $start_date }}</b> 
                - To (Included): <b>{{ $end_date }}</b>
            </p>
        </div>

        <?php } ?>

        <div class="row">
            <div class="col-md-12 mt-3">
                <button class="btn btn-primary btn-sm" type="submit" name="submit">Find</button>
            </div>
        </div>

    </form>
@endsection