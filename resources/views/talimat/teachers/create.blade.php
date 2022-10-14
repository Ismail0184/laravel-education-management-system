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
                <h3 class="font-weight-bold text-blue mb-0 h2">{{ __('lang.teacherprofile') }} </h3> 
            </div>
            <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
            </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'teachers.store','method'=>'POST')) !!}
             <h6 class="text-muted mb-4 text-orange font-weight-bold h3">{{ __('lang.generalinformation') }}</h6>
            <div class="pl-lg-4">
                <div class="row">
                      <div class="col-lg-12">
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
                            <div class="input-group input-group mb-3">
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
                                <input class="form-control {{ $errors->has('highest_jamat') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.highestdegree') }}" type="text" name="highest_jamat">
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
                                <input class="form-control {{ $errors->has('highest_madrasha') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.madrasha') }}" type="text" name="highest_madrasha">
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
                                <input class="form-control {{ $errors->has('highest_board') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.boe') }}" type="text" name="highest_board">
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
                                <input class="form-control {{ $errors->has('highest_pass_year') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.session') }}" type="text" name="highest_pass_year">
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
                                <input class="form-control {{ $errors->has('hafez_madrasha') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.hifzmadrasha') }}" type="text" name="hafez_madrasha">
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
                                <input class="form-control {{ $errors->has('hafez_board') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.hifzboard') }}" type="text" name="hafez_board">
                            </div>
                            @if ($errors->has('hafez_board'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('hafez_board') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('hafez_pass_year') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('hafez_pass_year') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.session') }}" type="text" name="hafez_session">
                            </div>
                            @if ($errors->has('hafez_pass_year'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('hafez_pass_year') }}</strong>
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
                                <input class="form-control {{ $errors->has('qirat_madrasha') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.qiratmadrasha') }}" type="text" name="qirat_madrasha">
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
                                <input class="form-control {{ $errors->has('qirat_board') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.qiratboard') }}" type="text" name="qirat_board">
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
                                <input class="form-control {{ $errors->has('qirat_pass_year') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.session') }}" type="text" name="qirat_pass_year">
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
                                <input class="form-control {{ $errors->has('ifta_madrasha') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.iftamadrasha') }}" type="text" name="ifta_madrasha">
                            </div>
                            @if ($errors->has('ifta_madrasha'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('ifta_madrasha') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('oldornew') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('oldornew') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.iftaboard') }}" type="text" name="ifta_board">
                            </div>
                            @if ($errors->has('oldornew'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('oldornew') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('oldornew') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('oldornew') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.session') }}" type="text" name="ifta_pass_year">
                            </div>
                            @if ($errors->has('oldornew'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('oldornew') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('oldornew') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('oldornew') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.adabmadrasha') }}" type="text" name="adab_madrasha">
                            </div>
                            @if ($errors->has('oldornew'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('oldornew') }}</strong>
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
                                <input class="form-control {{ $errors->has('adab_board') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.adabboard') }}" type="text" name="adab_board">
                            </div>
                            @if ($errors->has('adab_board'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('adab_board') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('oldornew') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('oldornew') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.session') }}" type="text" name="adab_pass_year">
                            </div>
                            @if ($errors->has('oldornew'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('oldornew') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('oldornew') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('oldornew') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.othermadrasha') }}" type="text" name="other_jamat">
                            </div>
                            @if ($errors->has('oldornew'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('oldornew') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('oldornew') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('oldornew') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.otherboard') }}" type="text" name="other_madrasha">
                            </div>
                            @if ($errors->has('oldornew'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('oldornew') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group {{ $errors->has('oldornew') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('oldornew') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.session') }}" type="text" name="other_board">
                            </div>
                            @if ($errors->has('oldornew'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('oldornew') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group {{ $errors->has('oldornew') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-archive text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('oldornew') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.educationnote') }}" type="text" name="other_pass_year">
                            </div>
                            @if ($errors->has('oldornew'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('oldornew') }}</strong>
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
            <h6 class="h3 text-muted mb-4 text-orange font-weight-bold">{{ __('lang.jobexperience') }}</h6>
            <div class="pl-lg-4">
            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('madrasha') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-school text-orange"></i></span>
                            </div>
                                <input class="form-control {{ $errors->has('madrasha') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.madrasha') }}" type="text" name="job_madrasha">
                            </div>
                        </div>
                        @if ($errors->has('madrasha'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('madrasha') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('classname') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                               <select class="form-control" name="job_negran_jamat" data-toggle="select">
                                   <option>{{ __('lang.selectnegranjamat') }}</option>
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
   
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('classname') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                               <select class="form-control" name="job_kitab" data-toggle="select">
                                   <option>{{ __('lang.selecthighestkitab') }}</option>
                                   @foreach ($subjects as $key => $value)
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
                    <div class="col-lg-6">
                        <div class="form-group {{ $errors->has('result') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-award text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('result') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.jobexperience') }}" type="select" name="job_experience_year">
                            </div>
                            @if ($errors->has('result'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('result') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group {{ $errors->has('result') ? ' has-danger' : '' }}">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-award text-orange"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('result') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.jobnote') }}" type="select" name="job_note">
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
                <!-- Previous Education -->
            <div class="pl-lg-4">
                <div class="row">
                <h6 class="h3 text-muted mb-4 text-orange font-weight-bold">{{ __('lang.jobexperience') }}</h6>              <div class="col-lg-12">
                    <div class="form-group {{ $errors->has('salary') ? ' has-danger' : '' }}">
                        <div class="input-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-award text-orange"></i></span>
                            </div>
                            <input class="form-control {{ $errors->has('salary') ? ' is-invalid' : '' }}" placeholder="{{ __('lang.salary') }}" type="select" name="salary">
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
