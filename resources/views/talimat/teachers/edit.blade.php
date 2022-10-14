@extends('layouts.talimat')

@section('content')


 <!-- Page content -->
 <div class="container-fluid">
        <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a href="{{ route('teachers.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.back') }}</a>
                </div>
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
                <h3 class="font-weight-bold text-blue mb-0">Edit Teacher Profile </h3> 
            </div>
            <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
            </div>
            </div>
        </div>
        <div class="card-body">
           {!! Form::model($data, ['method' => 'PATCH','route' => ['teachers.update', $data->id]]) !!}
           <h6 class="text-muted mb-4 text-orange font-weight-bold h3">{{ __('lang.generalinformation') }}</h6>
            <div class="pl-lg-4">
                <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3 text-orange"></i></span>
                                </div>
                                {!! Form::text('name', null, array('placeholder' => __('lang.name'),'class' => 'form-control','required'=>'required', 'autofocus' => 'autofocus')) !!}
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
                                {!! Form::text('fname', null, array('placeholder' => __('lang.fname'),'class' => 'form-control','required'=>'required')) !!}
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
                                {!! Form::text('mname', null, array('placeholder' => __('lang.mname'),'class' => 'form-control','required'=>'required')) !!}
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
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-birthday-cake text-orange"></i></span>
                            </div>
                                {!! Form::text('dob', null, array('placeholder' => __('lang.dob'),'class' => 'form-control','required'=>'required')) !!}
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
                                {!! Form::text('nationality', null, array('placeholder' => __('lang.nationality'),'class' => 'form-control','required'=>'required')) !!}
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
                                {!! Form::text('mobile', null, array('placeholder' => __('lang.mobile'),'class' => 'form-control','required'=>'required')) !!}
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
                                {!! Form::text('nid', null, array('placeholder' => __('lang.nid'),'class' => 'form-control','required'=>'required')) !!}
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
            <h6 class="h3 text-muted mb-4 text-orange font-weight-bold">{{ __('lang.educationalinformation') }}</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('highest_jamat') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                {!! Form::text('highest_jamat', null, array('placeholder' => __('lang.highest_jamat'),'class' => 'form-control')) !!}
                            </div>
                        </div>
                        @if ($errors->has('highest_jamat'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('highest_jamat') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('highest_madrasha') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('highest_madrasha', null, array('placeholder' => __('lang.highest_madrasha'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('highest_madrasha'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('highest_madrasha') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('highest_board') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                {!! Form::text('highest_board', null, array('placeholder' => __('lang.highest_board'),'class' => 'form-control')) !!}
                            </div>
                        </div>
                        @if ($errors->has('highest_board'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('highest_board') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('highest_pass_year') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('highest_pass_year', null, array('placeholder' => __('lang.highest_pass_year'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('highest_pass_year'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('highest_pass_year') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
              </div>
            <hr class="my-4" />
            <h6 class="h3 text-muted mb-4 text-orange font-weight-bold">{{ __('lang.specialeducation') }}</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('hafez_madrasha') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                {!! Form::text('hafez_madrasha', null, array('placeholder' => __('lang.hifzmadrasha'),'class' => 'form-control')) !!}
                            </div>
                        </div>
                        @if ($errors->has('hafez_madrasha'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('hafez_madrasha') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('hafez_board') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('hafez_board', null, array('placeholder' => __('lang.hifzboard'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('hafez_board'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('hafez_board') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('hafez_session') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('hafez_session', null, array('placeholder' => __('lang.session'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('hafez_session'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('hafez_session') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('qirat_madrasha') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt text-orange"></i></span>
                            </div>
                                {!! Form::text('qirat_madrasha', null, array('placeholder' => __('lang.qiratmadrasha'),'class' => 'form-control')) !!}
                            </div>
                        </div>
                        @if ($errors->has('qirat_madrasha'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('qirat_madrasha') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('qirat_board') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('qirat_board', null, array('placeholder' => __('lang.qiratboard'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('qirat_board'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('qirat_board') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('qirat_pass_year') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('qirat_pass_year', null, array('placeholder' => __('lang.session'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('qirat_pass_year'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('qirat_pass_year') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('ifta_madrasha') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('ifta_madrasha', null, array('placeholder' => __('lang.iftamadrasha'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('ifta_madrasha'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('ifta_madrasha') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('iftaboard') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('ifta_board', null, array('placeholder' => __('lang.iftaboard'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('oldornew'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('oldornew') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('ifta_pass_year') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('ifta_pass_year', null, array('placeholder' => __('lang.session'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('ifta_pass_year'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('ifta_pass_year') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('adab_madrasha') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('adab_madrasha', null, array('placeholder' => __('lang.adabmadrasha'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('adab_madrasha'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('adab_madrasha') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('adab_board') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('adab_board', null, array('placeholder' => __('lang.adabboard'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('adab_board'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('adab_board') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('adab_pass_year') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('adab_pass_year', null, array('placeholder' => __('lang.session'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('adab_pass_year'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('adab_pass_year') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('other_jamat') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('adab_pass_year', null, array('placeholder' => __('lang.othermadrasha'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('other_jamat'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('other_jamat') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('other_madrasha') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('other_madrasha', null, array('placeholder' => __('lang.otherboard'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('other_madrasha'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('other_madrasha') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('other_board') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('other_madrasha', null, array('placeholder' => __('lang.session'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('other_board'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('other_board') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group {{ $errors->has('other_pass_year') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                {!! Form::text('other_pass_year', null, array('placeholder' => __('lang.educationnote'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('other_pass_year'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('other_pass_year') }}</strong>
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
            <h6 class="h3 text-muted mb-4 text-orange font-weight-bold">{{ __('lang.jobexperience') }}</h6>
            <div class="pl-lg-4">
            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('job_madrasha') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-school text-orange"></i></span>
                            </div>
                                {!! Form::text('job_madrasha', null, array('placeholder' => __('lang.jobmadrasha'),'class' => 'form-control')) !!}
                            </div>
                        </div>
                        @if ($errors->has('job_madrasha'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('job_madrasha') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('job_negran_jamat') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                               <select class="form-control" name="job_negran_jamat" data-toggle="select">
                                   <option>{{ __('lang.selectnegranjamat') }}</option>
                                   @foreach ($classes as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == $data->job_negran_jamat) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                            @if ($errors->has('job_negran_jamat'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('job_negran_jamat') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
   
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('job_kitab') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                               <select class="form-control" name="job_kitab" data-toggle="select">
                                   <option>{{ __('lang.selecthighestkitab') }}</option>
                                   @foreach ($subjects as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == $data->job_kitab) ? 'selected' : '' }}> 
                                            {{ $value }} 
                                        </option>
                                    @endforeach    
                                </select>
                            </div>
                            @if ($errors->has('job_kitab'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('job_kitab') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('job_experience_year') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-award text-orange"></i></span>
                                </div>
                                {!! Form::text('job_experience_year', null, array('placeholder' => __('lang.jobexperience'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('job_experience_year'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('job_experience_year') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group {{ $errors->has('job_note') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-award text-orange"></i></span>
                                </div>
                                {!! Form::text('job_note', null, array('placeholder' => __('lang.jobnote'),'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('job_note'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('job_note') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
              </div>
              <div class="pl-lg-4">
                <div class="row">
                <h6 class="h3 text-muted mb-4 text-orange font-weight-bold">{{ __('lang.jobexperience') }}</h6>              <div class="col-lg-12">
                    <div class="form-group {{ $errors->has('salary') ? ' has-danger' : '' }}">
                        <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-award text-orange"></i></span>
                            </div>
                            {!! Form::text('salary', null, array('placeholder' => __('lang.salary'),'class' => 'form-control')) !!}
                        </div>
                        @if ($errors->has('salary'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('salary') }}</strong>
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
