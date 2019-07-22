@extends('layouts.app')
@section('content')

	<h2>Simple Time and Date Calculator with Timezone Conversion</h2>
	
	<form class="mt-5" method="POST" action="{{ route('calculate') }}">
        {{ csrf_field() }}  

        <div class="row mb-5">
            <div class="col-md-6">
                <div class="form-check">
                    <label class="form-check-label timezonev">
                        <input id="allow_timezone" class="form-check-input" type="checkbox" name="timezone" value="timezone" <?php if( $timezone == 1 ){ echo "checked"; }?>>
                        Calculate across different timezones
                    </label>
                </div>
            </div>
        </div>    

        <div class="row mb-5" id="timezone" style="display: none;">
            <div class="col-md-6">
                <select class="form-control selectpicker" name="s_tzone">
                    <option value="">Please, select timezone for start date</option>
                    @foreach( $tz_list as $t)
                    <option value="{{ $t['zone'] }}" <?php if( isset($s_tzone) && $s_tzone == $t['zone']){ echo "selected"; }?>>
                        {{ $t['diff_from_GMT'] }}  -  {{ $t['zone'] }}
                    </option>
                    @endforeach
                </select>
                {!! $errors->first('s_tzone', '<span class="error">:message</span>') !!}
            </div>
            <div class="col-md-6">
                <select class="form-control selectpicker" name="e_tzone">
                    <option value="">Please, select timezone for end date</option>
                    @foreach( $tz_list as $t)
                    <option value="{{ $t['zone'] }}" <?php if( isset($e_tzone) && $e_tzone == $t['zone']){ echo "selected"; }?>>
                        {{ $t['diff_from_GMT'] }}  -  {{ $t['zone'] }}
                    </option>
                    @endforeach
                </select>
                {!! $errors->first('e_tzone', '<span class="error">:message</span>') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('start') ? 'has-error' : ''}}">
                    <label class="label-control">Select start date</label>
                    <input type="text" class="form-control datetimepicker_start" name="start" @if(isset($start_date)) value="{{ $start_date }}" @else value="{{old('start')}}" @endif>
                    {!! $errors->first('start', '<span class="error">:message</span>') !!}
                </div>                    
            </div>                    
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('end') ? 'has-error' : ''}}">
                    <label class="label-control">Select end date</label>
                    <input type="text" class="form-control datetimepicker_end" name="end" @if(isset($end_date)) value="{{ $end_date }}" @else value="{{old('end')}}" @endif>
                    {!! $errors->first('end', '<span class="error">:message</span>') !!}
                </div>                    
            </div>
        </div>

        <?php if(isset($start_date) && isset($end_date)) { ?>

        <div class="title mt-3">
            <p>
                From  : <b>{{ $start_date }}</b> 
                - To  : <b>{{ $end_date }}</b>
            </p>
        </div>

        <div class="title mt-0">
            <table>
                <tr>
                    <td>Number of days:</td>
                    <td> {{ $number_of_days }}</td>
                    <td class="px-3">Get number of days in:</td>
                    <td> 
                        <div class="form-group ml-2 pt-2">
                            <select class="form-control selectpicker" data-style="btn btn-link" name="convert_to" style="width: 80px;">
                                <option value="0">Please select</option>
                                <option value="seconds" <?php if( isset($convert_to) && $convert_to == 'seconds'){ echo "selected"; }?>>seconds</option>
                                <option value="minutes" <?php if( isset($convert_to) && $convert_to == 'minutes'){ echo "selected"; }?>>minutes</option>
                                <option value="hours" <?php if( isset($convert_to) && $convert_to == 'hours'){ echo "selected"; }?>>hours</option>
                                <option value="years" <?php if( isset($convert_to) && $convert_to == 'years'){ echo "selected"; }?>>years</option>
                            </select>  
                        </div>                             
                    </td> 
                    <td class="px-3">: <?php if(isset($diff_in_convert_value)) { echo $diff_in_convert_value . ' ' . $convert_to; } ?></td>
                </tr> 
                <tr>
                    <td>Number of weekdays:</td>
                    <td>{{ $number_of_week_days }}</td>
                </tr> 
                <tr>
                    <td>Number of weeks:</td>
                    <td>{{ $number_of_weeks }}</td>
                </tr>                                                         
            </table>                     
        </div>

        <?php } ?>

        <div class="row">
            <div class="col-md-12 mt-3">
                <button class="btn btn-primary btn-sm" type="submit" name="submit">Find</button>
            </div>
        </div>

    </form>
@endsection