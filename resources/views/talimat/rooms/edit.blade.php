@extends('layouts.talimat')


@section('content')
<div class="container pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
           <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{ route('rooms.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.back') }}</a>
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
                        {!! Form::model($room, ['method' => 'PATCH','route' => ['rooms.update', $room->id]]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('name', null, array('placeholder' =>  __('lang.room'),'class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('building_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="building_id" data-toggle="select" required>
                                        <option value=''>Select a class name</option>
                                        @foreach ($buildings as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $room->building_id) ? 'selected' : '' }}> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    @if ($errors->has('building_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('building_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('branch_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="branch_id" data-toggle="select">
                                        <option value=''>{{ __('lang.selectabranch') }}</option>
                                        @foreach ($branches as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $room->branch_id) ? 'selected' : '' }}> 
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
                                <div class="form-group {{ $errors->has('classes_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="classes_id" data-toggle="select">
                                        <option value=''>{{ __('lang.selectaclass') }}</option>
                                        @foreach ($classes as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $room->classes_id) ? 'selected' : '' }}> 
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
                                <div class="form-group {{ $errors->has('teacher_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="teacher_id" data-toggle="select">
                                        <option value=''>{{ __('lang.negran') }}</option>
                                        @foreach ($teachers as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $room->teacher_id) ? 'selected' : '' }}> 
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
