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
                <h3 class="mb-0">{{ __('lang.teacher') }} {{ __('lang.salary') }} </h3>
            </div>
            <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
            </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'salaries.store','method'=>'POST')) !!}
            <h6 class="heading-small text-muted mb-4 text-orange">{{ __('lang.generalinformation') }}</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('adate') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                <input class="form-control datepicker {{ $errors->has('adate') ? ' is-invalid' : '' }}" data-date-format="yyyy-mm-dd" placeholder="{{ __('lang.adate') }}" type="text" name="adate" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        @if ($errors->has('adate'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('adate') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('presence') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                <input class="form-control {{ $errors->has('presence') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.payable_days') }}" type="text" name="payable_days" value="{{ 0 }}" required>
                            </div>
                        </div>
                        @if ($errors->has('presence'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('presence') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                </div>
                <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('absence') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign text-orange"></i></span>
                            </div>
                                <input class="form-control {{ $errors->has('absence') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.basic') }}" type="text" name="basic" value="{{ 0 }}" required>
                            </div>
                        </div>
                        @if ($errors->has('absence'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('absence') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('leave') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('leave') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.house_rent') }}" value="{{ 0 }}" type="text" name="house_rent">
                            </div>
                            @if ($errors->has('leave'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('leave') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('weekend') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign text-orange"></i></span>
                            </div>
                                <input class="form-control {{ $errors->has('weekend') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.medical') }}" type="text" name="medical" value="{{ 0 }}">
                            </div>
                        </div>
                        @if ($errors->has('weekend'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('weekend') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('holiday') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('holiday') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.transport') }}" value="{{ 0 }}" type="text" name="transport">
                            </div>
                            @if ($errors->has('holiday'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('holiday') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('weekend') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign text-orange"></i></span>
                            </div>
                                <input class="form-control {{ $errors->has('weekend') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.loan') }}" type="text" name="loan" value="{{ '00' }}">
                            </div>
                        </div>
                        @if ($errors->has('weekend'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('weekend') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('holiday') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('holiday') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.charge') }}" value="{{ '00' }}" type="text" name="charge">
                            </div>
                            @if ($errors->has('holiday'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('holiday') }}</strong>
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
                        <div class="form-group {{ $errors->has('teacher_id') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <select class="form-control" name="teacher_id" data-toggle="select">
                                <option>{{ __('lang.selectateacher') }}</option>
                                @foreach ($teachers as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('teacher_id'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('teacher_id') }}</strong>
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
