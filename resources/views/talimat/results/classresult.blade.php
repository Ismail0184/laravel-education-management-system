@extends('layouts.print')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="col-lg-6 col-5 text-right">
        </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <h3 class="ribbon">   {{ __('lang.result') }}</h3>
    <div class="table-responsive">
    <div style="display: none">
	    {{ $total = 0, $f=0, $cls='', $fail='', $fails= array()}}
    </div>
            <table class="table align-items-center table-bordered table-responsive">
                <thead class="thead-light">
                <tr >
                <th scope="col" class="text-blue text-right text-wrap col-1">{{ __('lang.student') }}</th>
                    @foreach ($subjects as $key => $subject)
                        <th scope="col" class="text-blue text-right text-wrap col-1">{{ $subject->name }}</th>
                    @endforeach        
                    <th scope="col" class="text-blue text-right text-wrap col-1">{{ __('lang.total_mark') }}</th>
                    <th scope="col" class="text-blue text-right text-wrap col-1">{{ __('lang.result') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $key => $student)
                <div style="display: none">{{ $datas=App\Models\Result::where('classes_id',$c_id)->where('student_id',$key)->pluck('mark','subject_id'), $total=0, $fail='', $cls='' }} {{ $graces=App\Models\Result::where('classes_id',$c_id)->where('student_id', $key)->pluck('grace_mark','subject_id') }} {{ $fails=App\Models\Result::where('classes_id',$c_id)->where('student_id',$key)->pluck('fail','subject_id') }}</div>
                <tr >
                <td class="text-blue text-right">{{ $student }}</td>
                    @foreach ($subjects as $key => $subject)
                        <div style="display: none">{{ isset($datas[$subject->id]) ? $total += $datas[$subject->id] : '' }} {{ isset($fails[$subject->id]) && $fails[$subject->id] == 1 ? $cls='orange' : $cls='blue'}} {{ isset($fails[$subject->id]) && $fails[$subject->id] == 1 ? $fail='[ফেল]' : $fail=''}} {{ isset($fails[$subject->id]) && $fails[$subject->id] == 1 ? $f += $fails[$subject->id] : ''}}</div>
                        <td class="text-{{ $cls }} text-right">{{ isset($datas[$subject->id]) ? \App\Http\Controllers\BnumberController::toBangla($datas[$subject->id]) : '' }} {{ isset($graces[$subject->id]) && $graces[$subject->id] !== 0 ? ' [+ ' .\App\Http\Controllers\BnumberController::toBangla($graces[$subject->id]). ']' : ''}} {{ $fail}}</td>
                    @endforeach        
                    <td class="text-blue text-right">{{ is_numeric($total) ? \App\Http\Controllers\BnumberController::toBangla($total) : '' }}</td>
                    <td class="text-blue text-right">{{ $f >3 ? __('lang.rasib') : $f < 4 && $f>0 ? __('lang.mokbul') : \App\Http\Controllers\ResultController::status($total) }}</td>
                </tr>
                @endforeach        
                </tbody>
            </table>
        </div>
        <div class="card-footer py-4">
            <nav class="d-flex justify-content-end" aria-label="...">
                
            </nav>
        </div>
    </div>
</div>
</div>

@endsection