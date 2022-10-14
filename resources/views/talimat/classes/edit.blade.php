@extends('layouts.talimat')


@section('content')
<div class="container pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
           <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{ route('admissionfees.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.back') }}</a>
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
                        {!! Form::model($classes, ['method' => 'PATCH','route' => ['classes.update', $classes->id]]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('name', null, array('placeholder' => __('lang.class'),'class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('total_mark', null, array('placeholder' => __('lang.total_mark'),'class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('mumtaj', null, array('placeholder' => __('lang.mumtaj'),'class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('jjiddan', null, array('placeholder' => __('lang.jjiddan'),'class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('jayeed', null, array('placeholder' => __('lang.jayeed'),'class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('mokbul', null, array('placeholder' => __('lang.mokbul'),'class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('division_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="division_id" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectaclass') }}</option>
                                        @foreach ($departments as $key => $value)
                                                <option value="{{ $key }}" {{ ( $key == $classes->division_id) ? 'selected' : '' }}> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    @if ($errors->has('division_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('division_id') }}</strong>
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
