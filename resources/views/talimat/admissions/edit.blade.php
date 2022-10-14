@extends('layouts.talimat')


@section('content')
<div class="container pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-11">
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
                        {!! Form::model($data, ['method' => 'PATCH','route' => ['admissions.update', $data->id]]) !!}
                        <h6 class="heading-small text-muted mb-4 text-orange">{{ __('lang.generalinformation') }}</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('roll') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-check-circle text-orange"></i></span>
                                        </div>
                                            {!! Form::text('roll', null, array('placeholder' => __('lang.roll'),'class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                    </div>
                                    @if ($errors->has('roll'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('roll') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-hat-3 text-orange"></i></span>
                                            </div>
                                            {!! Form::text('name', null, array('placeholder' => __('lang.name'),'class' => 'form-control','required' => 'required','autofocus' => 'autofocus')) !!}
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('fname') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-male text-orange"></i></span>
                                        </div>
                                            {!! Form::text('fname', null, array('placeholder' => __('lang.fname'),'class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                    </div>
                                    @if ($errors->has('fname'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('fname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('mname') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-female text-orange"></i></span>
                                            </div>
                                            {!! Form::text('mname', null, array('placeholder' => __('lang.mname'),'class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                        @if ($errors->has('mname'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('mname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('dob') ? ' has-danger' : '' }}">
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-birthday-cake text-orange"></i></span>
                                        </div>
                                            {!! Form::text('dob', null, array('placeholder' => __('lang.dob'),'class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                    </div>
                                    @if ($errors->has('dob'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('nationality') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-flag text-orange"></i></span>
                                            </div>
                                            {!! Form::text('nationality', null, array('placeholder' => __('lang.nationality'),'class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                        @if ($errors->has('nationality'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('nationality') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt text-orange"></i></span>
                                        </div>
                                            {!! Form::text('mobile', null, array('placeholder' => __('lang.mobile'),'class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                    </div>
                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-envelope text-orange"></i></span>
                                            </div>
                                            {!! Form::text('email', null, array('placeholder' => __('lang.email'),'class' => 'form-control')) !!}
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('nid') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card text-orange"></i></span>
                                        </div>
                                            {!! Form::text('nid', null, array('placeholder' => __('lang.nid'),'class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    @if ($errors->has('nid'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('nid') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('specialidentity') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card text-orange"></i></span>
                                            </div>
                                            {!! Form::text('specialidentity', null, array('placeholder' => __('lang.specialidentity'),'class' => 'form-control')) !!}
                                        </div>
                                        @if ($errors->has('specialidentity'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('specialidentity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>             
                        </div>
                        <hr class="my-4" />
                        <h6 class="heading-small text-muted mb-4 text-orange">{{ __('lang.educationalinformation') }}</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('session') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                                        </div>
                                            {!! Form::text('session', null, array('placeholder' => __('lang.session'),'class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    @if ($errors->has('session'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('session') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('oldornew') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                            </div>
                                            {!! Form::text('oldornew', null, array('placeholder' => __('lang.oldornew'),'class' => 'form-control')) !!}
                                        </div>
                                        @if ($errors->has('oldornew'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('oldornew') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('classes_id') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <select class="form-control" name="classes_id" data-toggle="select">
                                            <option value="">{{ __('lang.selectaclass') }}</option>
                                            @foreach ($classes as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $data->classes_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('classes_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('classes_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('branch_id') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                            <select class="form-control" name="branch_id" data-toggle="select">
                                            <option value="">{{ __('lang.selectabranch') }}</option>
                                            @foreach ($branches as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $data->branch_id) ? 'selected' : '' }}> 
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
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('monthlyfee_id') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                            <select class="form-control" name="monthlyfee_id" data-toggle="select" required>
                                            <option value="">{{ __('lang.monthlyfee') }}</option>
                                            @foreach ($monthlyfees as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $data->monthlyfee_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                @endforeach    
                                            </select>
                                        </div>
                                        @if ($errors->has('monthlyfee_id'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('monthlyfee_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4 text-orange">{{ __('lang.contactinformation') }}</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('caddress') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-address-book text-orange"></i></span>
                                        </div>
                                            {!! Form::text('caddress', null, array('placeholder' => __('lang.caddress'),'class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    @if ($errors->has('caddress'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('caddress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                    <div class="form-group {{ $errors->has('union_id') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <select class="form-control" name="union_id" data-toggle="select">
                                            <option value="">{{ __('lang.selectanunion') }}</option>
                                            @foreach ($unions as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $data->union_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('union_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('union_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group {{ $errors->has('thana_id') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <select class="form-control" name="thana_id" data-toggle="select">
                                            <option value="">{{ __('lang.selectathana') }}</option>
                                            @foreach ($thanas as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $data->thana_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('thana_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('thana_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="form-group {{ $errors->has('district_id') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <select class="form-control" name="district_id" data-toggle="select">
                                            <option value="">{{ __('lang.selectadistrict') }}</option>
                                            @foreach ($districts as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $data->district_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('district_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('district_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('paddress') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-address-card text-orange"></i></span>
                                        </div>
                                            {!! Form::text('paddress', null, array('placeholder' => __('lang.paddress'),'class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    @if ($errors->has('paddress'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('paddress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                    <div class="form-group {{ $errors->has('punion_id') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <select class="form-control" name="punion_id" data-toggle="select">
                                            <option value="">{{ __('lang.selectanunion') }}</option>
                                            @foreach ($unions as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $data->punion_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('punion_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('punion_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group {{ $errors->has('pthana_id') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <select class="form-control" name="pthana_id" data-toggle="select">
                                            <option value="">{{ __('lang.selectathana') }}</option>
                                            @foreach ($thanas as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $data->pthana_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('pthana_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pthana_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group {{ $errors->has('pdistrict_id') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <select class="form-control" name="pdistrict_id" data-toggle="select">
                                            <option value="">{{ __('lang.selectadistrict') }}</option>
                                            @foreach ($districts as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $data->pdistrict_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('pdistrict_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pdistrict_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr class="my-4" />
                        <!-- Previous Education -->
                        <h6 class="heading-small text-muted mb-4 text-orange">{{ __('lang.previouseducation') }}</h6>
                        <div class="pl-lg-4">
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('madrasha') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-school text-orange"></i></span>
                                        </div>
                                            {!! Form::text('madrasha', null, array('placeholder' => __('lang.madrasha'),'class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    @if ($errors->has('madrasha'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('madrasha') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group {{ $errors->has('pclass_id') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <select class="form-control" name="pclass_id" data-toggle="select">
                                            <option value="">{{ __('lang.selectapreviousclass') }}</option>
                                            @foreach ($classes as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $data->pclass_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                @endforeach    
                                            </select>
                                        </div>
                                        @if ($errors->has('pclass_id'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('pclass_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
            
                                <div class="col-lg-4">
                                    <div class="form-group {{ $errors->has('classyear') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-graduation-cap text-orange"></i></span>
                                        </div>
                                            {!! Form::text('classyear', null, array('placeholder' => __('lang.classyear'),'class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    @if ($errors->has('classyear'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('classyear') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group {{ $errors->has('result') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-award text-orange"></i></span>
                                            </div>
                                            {!! Form::text('result', null, array('placeholder' => __('lang.result'),'class' => 'form-control')) !!}
                                        </div>
                                        @if ($errors->has('result'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('result') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
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
            </div>
        </div>
    </div>
@endsection
