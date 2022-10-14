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
        <h3 class="ribbon"> ক্লাস রুটিন</h3>
    <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr >
                        <th scope="col" class="text-blue w-10">{{ __('lang.id') }}</th>
                        <th scope="col" class="text-orange w-50">{{ __('lang.ghanta') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.dayname') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.subject') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.class') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.teacher') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.createdBy') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr>
                        <td class="font-weight-bold text-blue text-center">{{ $banglans[++$i] }}</td>
                        <td class="font-weight-bold text-orange">{{ $data->ghanta->name }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->dayname->name }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->subject->name }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->classes->name }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->teacher->name }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->user->name }}</td>
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