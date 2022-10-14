@extends('layouts.talimat')


@section('content')
<div class="container pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
           <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{ route('mumtahins.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.back') }}</a>
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
                        {!! Form::model($mumtahin, ['method' => 'PATCH','route' => ['mumtahins.update', $mumtahin->id]]) !!}
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('teacher_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="teacher_id" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectateacher') }}</option>
                                        @foreach ($teachers as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $mumtahin->teacher_id) ? 'selected' : '' }}> 
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
                                        <option value=''>Select a exam name</option>
                                        @foreach ($classes as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $mumtahin->classes_id) ? 'selected' : '' }}> 
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
                                <div class="form-group {{ $errors->has('subject_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="subject_id" data-toggle="select" required>
                                        <option value=''>Select a exam name</option>
                                        @foreach ($subjects as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $mumtahin->subject_id) ? 'selected' : '' }}> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    @if ($errors->has('subject_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('subject_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('examname_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="examname_id" data-toggle="select" required>
                                        <option value=''>Select a exam name</option>
                                        @foreach ($examnames as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $mumtahin->examname_id) ? 'selected' : '' }}> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    @if ($errors->has('examname_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('examname_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('nesab', null, array('placeholder' => __('lang.nesab'),'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('last_date', null, array('placeholder' => __('lang.lastsubmitdate'),'class' => 'form-control')) !!}
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
