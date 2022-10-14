@extends('layouts.talimat')

@section('content')


 <!-- Page content -->
 <div class="container-fluid">
        <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                 </div>
            @endif
            <div class="col-8">
                <h3 class="mb-0">{{ __('lang.collectstudentmonthlyfee') }} </h3>
            </div>
            <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
            </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'transactions.store','method'=>'POST')) !!}
            <h6 class="heading-small text-muted mb-4 text-orange">{{ __('lang.generalinformation') }}</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('tdate') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                <input class="form-control datepicker {{ $errors->has('tdate') ? ' is-invalid' : '' }}" data-date-format="yyyy-mm-dd" placeholder="{{ __('lang.tdate') }}" type="text" name="tdate" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        @if ($errors->has('tdate'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('tdate') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('amount') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.amount') }}" type="text" name="amount" required autofocus>
                            </div>
                            @if ($errors->has('amount'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('debit_ahead_id') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <select class="form-control" name="debit_ahead_id" data-toggle="select">
                                <option>{{ __('lang.wheretoget?') }}</option>
                                @foreach ($debit_aheads as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('debit_ahead_id'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('debit_ahead_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('credit_ahead_id') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <select class="form-control" name="credit_ahead_id" data-toggle="select">
                                <option>{{ __('lang.wheretodeposit?') }}</option>
                                @foreach ($credit_aheads as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                            @if ($errors->has('credit_ahead_id'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('credit_ahead_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>               
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('month_id') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <select class="form-control" name="month_id" data-toggle="select">
                                <option>{{ __('lang.monthname') }}</option>
                                @foreach ($months as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('month_id'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('month_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('year_id') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <select class="form-control" name="year_id" data-toggle="select">
                                <option>{{ __('lang.year') }}</option>
                                @foreach ($years as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                            @if ($errors->has('year_id'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('year_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>               
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group {{ $errors->has('admission_id') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <select class="form-control" name="admission_id" data-toggle="select">
                                <option>{{ __('lang.selectastudent') }}</option>
                                @foreach ($students as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('admission_id'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('admission_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>               
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group {{ $errors->has('note') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sticky-note text-orange"></i></span>
                            </div>
                                <input class="form-control {{ $errors->has('note') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.note') }}" type="text" name="noate">
                            </div>
                        </div>
                        @if ($errors->has('note'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('note') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            <hr class="my-4" />
            <!-- Description -->
            <div class="pl-lg-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-4">{{ __('lang.submit') }}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
 @endsection
