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
        <h3 class="ribbon">  মাসিক ফি আদায়</h3>
    <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr >
                        <th scope="col" class="text-blue w-10">{{ __('lang.tdate') }}</th>
                        <th scope="col" class="text-orange w-30">{{ __('lang.student') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.atype') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.time_in') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.time_out') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.amethod') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.createdBy') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr>
                        <td class="font-weight-bold text-blue">{{ \App\Http\Controllers\BnumberController::toBangla($data->adate->format('d-m-Y')) }}</td>
                        <td class="font-weight-bold text-orange">{{ $data->student ? $data->student->name : '' }} </td>
                        <td class="font-weight-bold text-blue">{{ $data->atype ? $data->atype->name : ''}}</td>
                        <td class="font-weight-bold text-blue">{{ \App\Http\Controllers\BnumberController::toBangla($data->time_in) }}</td>
                        <td class="font-weight-bold text-blue">{{ \App\Http\Controllers\BnumberController::toBangla($data->time_out) }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->amethod ? $data->amethod->name : '' }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->user ? $data->user->name : '' }}</td>
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