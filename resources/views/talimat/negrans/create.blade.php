@extends('layouts.talimat')

@section('content')
<div class="container pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{ route('negrans.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.back') }}</a>
           </div>
            <div class="col-lg-6 col-md-8">
                <div class="card bg-light shadow border-0">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body px-lg-5 py-lg-5">
                        {!! Form::open(array('route' => 'negrans.store','method'=>'POST')) !!}
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('teacher_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="teacher_id" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectateacher') }}</option>
                                        @foreach ($teachers as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    @if ($errors->has('teacher_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('teacher_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('classes_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="classes_id" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectaclass') }}</option>
                                        @foreach ($classes as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    @if ($errors->has('classes_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('classes_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('branch_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="branch_id" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectabranch') }}</option>
                                        @foreach ($branches as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    @if ($errors->has('branch_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('branch_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('room_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="room_id" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectaroom') }}</option>
                                        @foreach ($rooms as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    @if ($errors->has('room_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('room_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">{{ __('lang.submit') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
