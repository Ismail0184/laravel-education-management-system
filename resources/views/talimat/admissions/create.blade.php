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
                <h3 class="mb-0">{{ __('lang.studentinformation') }} </h3>
            </div>
            <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
            </div>
            </div>
        </div>
        <div class="card-body bg-light">
            {!! Form::open(array('route' => 'admissions.store','method'=>'POST')) !!}
            <h6 class="heading-small text-muted mb-4 text-orange">{{ __('lang.generalinformation') }}</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('roll') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check-circle text-orange"></i></span>
                            </div>
                                <input class="form-control {{ $errors->has('roll') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.roll') }}" type="text" name="roll" value="{{ $newroll }}"required>
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
                                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.name') }}" type="text" name="name" required autofocus>
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
                                <input class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.fname') }}" type="text" name="fname" required>
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
                                <input class="form-control {{ $errors->has('mname') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.mname') }}" type="text" name="mname" required>
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
                                <input class="form-control datepicker {{ $errors->has('dob') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.dob') }}" type="text" name="dob" required>
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
                                <input class="form-control {{ $errors->has('nationality') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.nationality') }}" type="text" name="nationality" required>
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
                                <input class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.mobile') }}" type="text" name="mobile" required>
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
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.email') }}" type="text" name="email">
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
                                <input class="form-control {{ $errors->has('nid') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.nid') }}" type="text" name="nid">
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
                                <input class="form-control {{ $errors->has('specialidentity') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.specialidentity') }}" type="text" name="specialidentity">
                            </div>
                            @if ($errors->has('specialidentity'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('specialidentity') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>             </div>
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
                                <input class="form-control {{ $errors->has('session') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.session') }}" type="text" name="session">
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
                                <input class="form-control {{ $errors->has('oldornew') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.oldornew') }}" type="text" name="oldornew">
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
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
                    <div class="col-lg-12">
                        <div class="form-group {{ $errors->has('monthlyfee_id') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <select class="form-control" name="monthlyfee_id" data-toggle="select" required> 
                                   <option value="">{{ __('lang.monthlyfee') }}</option>
                                   @foreach ($monthlyfees as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
                                <input class="form-control {{ $errors->has('caddress') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.caddress') }}" type="text" name="caddress" required>
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
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
                                <input class="form-control {{ $errors->has('paddress') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.paddress') }}" type="text" name="paddress">
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
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
                                <input class="form-control {{ $errors->has('madrasha') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.madrasha') }}" type="text" name="madrasha">
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
                        <div class="form-group {{ $errors->has('classname') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                               <select class="form-control" name="class_id" data-toggle="select">
                                   <option value="">{{ __('lang.selectapreviousclass') }}</option>
                                   @foreach ($classes as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                            @if ($errors->has('classname'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('classname') }}</strong>
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
                                <input class="form-control {{ $errors->has('classyear') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.session') }}" type="text" name="classyear">
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
                                <input class="form-control {{ $errors->has('result') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.result') }}" type="select" name="result">
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
 @endsection
