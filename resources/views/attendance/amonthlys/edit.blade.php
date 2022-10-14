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
            {!! Form::model($data, ['method' => 'PATCH','route' => ['amonthlys.update', $data->id]]) !!}
            <h6 class="heading-small text-muted mb-4 text-orange">{{ __('lang.generalinformation') }}</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('adate') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                {!! Form::text('adate', null, array('placeholder' => __('lang.adate'),'class' => 'form-control', 'required'=>'required')) !!}
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
                                {!! Form::text('presence', null, array('placeholder' => __('lang.presence'),'class' => 'form-control', 'required'=>'required')) !!}
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
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                {!! Form::text('absence', null, array('placeholder' => __('lang.absence'),'class' => 'form-control', 'required'=>'required')) !!}
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
                                {!! Form::text('leave', null, array('placeholder' => __('lang.leave'),'class' => 'form-control', 'required'=>'required')) !!}
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
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                {!! Form::text('weekend', null, array('placeholder' => __('lang.weekend'),'class' => 'form-control', 'required'=>'required')) !!}
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
                                {!! Form::text('holiday', null, array('placeholder' => __('lang.holiday'),'class' => 'form-control', 'required'=>'required')) !!}
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
                                        <option value="{{ $key }}" {{ ( $key == $data->month_id) ? 'selected' : '' }}> 
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
                                        <option value="{{ $key }}" {{ ( $key == $data->year_id) ? 'selected' : '' }}> 
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
                                        <option value="{{ $key }}" {{ ( $key == $data->teacher_id) ? 'selected' : '' }}> 
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
