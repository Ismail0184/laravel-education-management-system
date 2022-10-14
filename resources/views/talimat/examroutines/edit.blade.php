@extends('layouts.talimat')


@section('content')
<div class="container pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
           <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{ route('examroutines.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.back') }}</a>
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
                        {!! Form::model($examroutine, ['method' => 'PATCH','route' => ['examroutines.update', $examroutine->id]]) !!}
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group {{ $errors->has('exam_date') ? ' has-danger' : '' }}">
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-birthday-cake text-orange"></i></span>
                                        </div>
                                            <input class="form-control {{ $errors->has('exam_date') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.exam_date') }}" type="text" name="exam_date" required>
                                        </div>
                                    </div>
                                    @if ($errors->has('exam_date'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('exam_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('classes_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="classes_id" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectaclass') }}</option>
                                        @foreach ($classes as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $examroutine->classes_id) ? 'selected' : '' }}> 
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
                                <div class="form-group {{ $errors->has('dayname_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="dayname_id" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectadayname') }}</option>
                                        @foreach ($daynames as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $examroutine->dayname_id) ? 'selected' : '' }}> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    @if ($errors->has('dayname_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dayname_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('daypart_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="daypart_id" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectadaypart') }}</option>
                                        @foreach ($dayparts as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $examroutine->daypart_id) ? 'selected' : '' }}> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    @if ($errors->has('daypart_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('daypart_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('subject_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="subject_id" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectasubject') }}</option>
                                        @foreach ($subjects as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $examroutine->subject_id) ? 'selected' : '' }}> 
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
                                        <option value=''>{{ __('lang.selectanexam') }}</option>
                                        @foreach ($examnames as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $examroutine->examname_id) ? 'selected' : '' }}> 
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
