@extends('layouts.talimat')

@section('content')
<div class="container pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{ route('madrashas.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.back') }}</a>
           </div>
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
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
                        {!! Form::model($madrashas, ['method' => 'PATCH','route' => ['madrashas.update', $madrashas->id]]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('name', null, array('placeholder' => __('lang.madrasha'),'class' => 'form-control', 'required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('address', null, array('placeholder' => __('lang.address'),'class' => 'form-control', 'required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('mobile', null, array('placeholder' => __('lang.mobile'),'class' => 'form-control', 'required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('email', null, array('placeholder' => __('lang.email'),'class' => 'form-control', 'required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('website', null, array('placeholder' => __('lang.website'),'class' => 'form-control', 'required'=>'required')) !!}
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
