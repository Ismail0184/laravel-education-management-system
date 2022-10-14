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
        <h3 class="ribbon"> পরীক্ষার বেঞ্চ </h3>
    <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr >
                        <th scope="col" class="text-blue w-10">{{ __('lang.id') }}</th>
                        <th scope="col" class="text-orange w-40">{{ __('lang.bench') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.seat_count') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.c1') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.c3') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.examholl') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.exam') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr>
                    <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla(++$i) }}</td>
                        <td class="font-weight-bold text-orange">{{ $data->name }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla($data->bench_row) }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ $data->c1 }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ $data->c3 }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->examholl ? $data->examholl->name : '' }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->examname ? $data->examname->name : '' }}</td>
                        
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