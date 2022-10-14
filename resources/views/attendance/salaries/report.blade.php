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
        <h3 class="ribbon">  মাসিক বেতন হিসাব</h3>
    <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-orange w-30">{{ __('lang.teacher') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.days') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.payable_days') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.basic') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.payable') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.house_rent') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.medical') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.transport') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.intotal') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr>
                        <td class="font-weight-bold text-orange">{{ $data->teacher ? $data->teacher->name : '' }} </td>
                        <td class="font-weight-bold text-blue">{{ $data->month->days }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->payable_days }}</td>
                        <td class="font-weight-bold text-blue">{{ number_format($data->basic, '2','.',',') }}</td>
                        <td class="font-weight-bold text-blue">{{ number_format(($data->basic / $data->month->days * $data->payable_days), '2','.',',') }}</td>
                        <td class="font-weight-bold text-blue">{{ number_format($data->house_rent, '2','.',',') }}</td>
                        <td class="font-weight-bold text-blue">{{ number_format($data->medical, '2','.',',') }}</td>
                        <td class="font-weight-bold text-blue">{{ number_format($data->transport, '2','.',',') }}</td>
                        <td class="font-weight-bold text-blue">{{ number_format(($data->basic / $data->month->days * $data->payable_days) + $data->transport + $data->house_rent + $data->medical, '2','.',',')}}</td>
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