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
        <h3 class="ribbon">  ছাত্রদের মোবাইল নম্বর</h3>
    <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr >
                        <th scope="col" class="text-blue w-10">{{ __('lang.id') }}</th>
                        <th scope="col" class="text-orange w-30">{{ __('lang.student') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.fname') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.mobile') }}</th>
                        <th scope="col" class="text-blue w-20">{{ __('lang.address') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.thana') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.district') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.division') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr> 
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla(++$i) }}</td> 
                        <td class="font-weight-bold text-orange">{{ $data->name }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->fname }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->mobile }}</td>
                        <td class="font-weight-bold text-blue wrap">{{ $data->caddress }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->thana ? $data->thana->name : ''}}</td>
                        <td class="font-weight-bold text-blue">{{ $data->district ? $data->district->name : '' }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->district ? $data->district->division : '' }}</td>
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