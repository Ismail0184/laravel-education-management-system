@extends('layouts.talimat')

@section('content')
<div class="container pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{ route('districts.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.back') }}</a>
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
                        {!! Form::open(array('route' => 'districts.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('name', null, array('placeholder' => __('lang.district'),'class' => 'form-control', 'required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::text('division', null, array('placeholder' => __('lang.division'),'class' => 'form-control', 'required'=>'required')) !!}
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
