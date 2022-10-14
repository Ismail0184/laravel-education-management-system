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
        <h3 class="ribbon">   {{ __('lang.marksheet') }}: {{ $student->name }}</h3>
    <div class="table-responsive">
    <div style="display: none">
	    {{ $total = 0, $f=0, $cls='', $fail='' }}
    </div>
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr >
                        <th scope="col" class="text-blue text-center w-10"">{{ __('lang.id') }}</th>
                        <th scope="col" class="text-blue text-right w-40">{{ __('lang.subject') }}</th>
                        <th scope="col" class="text-blue text-center w-50">{{ __('lang.mark') }}</th>
                    </tr>
                    @foreach ($subjects as $key => $subject)
                    <div style="display: none">{{$total += $datas[$subject->id]}} {{ $fails[$subject->id] == 1 ? $cls='orange' : $cls='blue'}} {{ $fails[$subject->id] == 1 ? $fail='[ফেল]' : $fail=''}} {{ $f += $fails[$subject->id] }}</div>
                        <tr >
                            <td class="text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla(++$i) }}</td>
                            <td class="text-{{ $cls }} text-right">{{ $subject->name }}: </td>
                            <td class="text-{{ $cls }} text-center">{{ isset($datas[$subject->id]) ? \App\Http\Controllers\BnumberController::toBangla($datas[$subject->id]) : '' }} {{ isset($graces[$subject->id]) && $graces[$subject->id] !== 0 ? '[ +'. \App\Http\Controllers\BnumberController::toBangla($graces[$subject->id]). ']' : ''}} {{ $fail}}</td>
                        </tr>
                    @endforeach        
                    <tr >
                        <td class="text-blue text-right"></td>
                        <td class="text-blue text-right">{{ __('lang.total_mark') }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla($total) }}</td>
                    </tr>
                    <tr >
                        <td class="text-blue text-right"></td>
                        <td class="text-blue text-right">{{ __('lang.result') }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ $f >3 ? __('lang.rasib') : $f < 4 && $f>0 ? __('lang.mokbul') : \App\Http\Controllers\ResultController::status($total) }}</td>
                    </tr>
                </thead>
                <tbody>
                    
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