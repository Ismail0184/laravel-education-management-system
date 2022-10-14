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
            {!! Form::open(array('route' => 'ateachers.store','method'=>'POST')) !!}
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
                        <div class="form-group {{ $errors->has('amethod_id') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <select class="form-control" name="amethod_id" data-toggle="select">
                                <option>{{ __('lang.amethod') }}</option>
                                @foreach ($amethods as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('amethod_id'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('amethod_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                </div>
                <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('time_in') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                <input class="form-control {{ $errors->has('time_in') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.time_in') }}" type="text" name="time_in" value="{{ '09:00 AM' }}" required>
                            </div>
                        </div>
                        @if ($errors->has('time_in'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('time_in') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('time_out') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('time_out') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.time_out') }}" value="{{ '05:00 PM' }}" type="text" name="time_out" required>
                            </div>
                            @if ($errors->has('time_out'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('time_out') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
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
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('atype_id') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <select class="form-control" name="atype_id" data-toggle="select">
                                <option>{{ __('lang.atype') }}</option>
                                @foreach ($atypes as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                            @if ($errors->has('atype_id'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('atype_id') }}</strong>
                                </span>
                            @endif
                        </div>
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
