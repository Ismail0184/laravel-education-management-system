@extends('layouts.talimat')

@section('content')
<div class="row justify-content-center pt-2">
    <div class="col-lg-11">
        <h6 class="mb-2 text-success">{{ __('lang.seatnumber')}}</h6>
        <div class="col-lg-11 text-center">
            <a href="{{ route('siteplans.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.refresh') }}</a>
            <a href="{{ route('siteplans.create') }}" class="btn btn-sm btn-neutral">{{ __('lang.addnew') }}</a>
            <a href="{{ route('siteplans.report') }}" class="btn btn-sm btn-neutral">{{ __('lang.report') }}</a>
            <a href="{{ route('siteplans.admidcard') }}" class="btn btn-sm btn-neutral">{{ __('lang.admidcard') }}</a>
            <button type="button" id="bauto" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#auto">{{ __('lang.auto') }}</button>
            <button type="button" id="badelete" class="btn btn-sm btn-primary invisible " data-bs-toggle="modal" data-bs-target="#adelete">{{ __('lang.deleteall') }}</button>
        </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
            <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr >
                        <th scope="col" class="text-blue w-10">{{ __('lang.id') }}</th>
                        <th scope="col" class="text-orange w-30">{{ __('lang.roll') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.bench') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.benchside') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.holl') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.exam') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.createdBy') }}</th>
                        <th scope="col" class="w-10"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla(++$i) }}</td> 
                        <td class="font-weight-bold text-orange">{{ $data->admission->roll }} - {{ $data->admission->name }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->exambench ? $data->exambench->name : '' }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->exambenchside ? $data->exambenchside->name : '' }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->exambench ? $data->exambench->examholl->name : '' }}</td>
                         <td class="font-weight-bold text-blue">{{ $data->examname ? $data->examname->name : '' }}</td>
                         <td class="font-weight-bold text-blue">{{ $data->user ? $data->user->name : '' }}</td>
                        <td class="text-right">
                            <a href="{{ route('siteplans.show', $data->id) }}" title="show">
                                <i class="fas fa-eye text-orange  fa-lg"></i>
                            </a>
                           <a href="{{ route('siteplans.edit', $data->id) }}">
                                <i class="fa fas fa-edit  fa-lg"></i>

                            </a>
                            <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('siteplans.delete', $data->id) }}" title="Delete Project">
                                <i class="fas fa-trash text-danger  fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $datas->links() !!}
        </div>
        <div class="card-footer py-4">
            <nav class="d-flex justify-content-end" aria-label="...">
                
            </nav>
        </div>
    </div>
</div>
</div>
<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="auto"  aria-labelledby="autoModalLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="autoModalLabel">{{ __('lang.makingexamhollseat') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {!! Form::open(array('route' => 'siteplans.auto','method'=>'POST')) !!}
      @csrf
          <div class="mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group {{ $errors->has('classes_id') ? ' has-danger' : '' }}">
                    <div class="input-group input-group mb-3">
                    <select class="form-control" name="classes_id" data-toggle="select" required>
                        <option value=''>{{ __('lang.selectaclass') }}</option>
                        @foreach ($classes as $key => $value)
                                <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
                <div class="form-group {{ $errors->has('examholl_id') ? ' has-danger' : '' }}">
                    <div class="input-group input-group mb-3">
                    <select class="form-control" name="examholl_id" data-toggle="select" required>
                        <option value=''>{{ __('lang.selectanexamholl') }}</option>
                        @foreach ($examholls as $key => $value)
                                <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
                                    {{ $value }} 
                                </option>
                            @endforeach    
                        </select>
                    </div>
                    @if ($errors->has('examholl_id'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('examholl_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        <div class="mb-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group {{ $errors->has('examname_id') ? ' has-danger' : '' }}">
                <div class="input-group input-group mb-3">
                <select class="form-control" name="examname_id" data-toggle="select" required>
                    <option value=''>{{ __('lang.selectanexam') }}</option>
                    @foreach ($examnames as $key => $value)
                            <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
        </div>
        <button type="submit" class="btn btn-primary">{{ __('lang.siteplan') }}</button>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="adelete" role="dialog" aria-labelledby="adeleteModalLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adeleteModalLabel">{{ __('lang.makingexamhollseat') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {!! Form::open(array('route' => 'siteplans.adelete','method'=>'POST')) !!}
      @csrf
          <div class="mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group {{ $errors->has('classes_id') ? ' has-danger' : '' }}">
                    <div class="input-group input-group mb-3">
                    <select class="form-control" name="classes_id" data-toggle="select" required>
                        <option value=''>{{ __('lang.selectaclass') }}</option>
                        @foreach ($classes as $key => $value)
                                <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
        <div class="mb-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group {{ $errors->has('examname_id') ? ' has-danger' : '' }}">
                <div class="input-group input-group mb-3">
                <select class="form-control" name="examname_id" data-toggle="select" required>
                    <option value=''>{{ __('lang.selectanexam') }}</option>
                    @foreach ($examnames as $key => $value)
                            <option value="{{ $key }}" {{ ( $key == 0) ? 'selected' : '' }}> 
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
        </div>
        <button type="submit" class="btn btn-primary">{{ __('lang.deleteall') }}</button>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });
    var auto = document.getElementById('auto')
    auto.addEventListener('show.bs.modal', function (event) {
    })
    
    var adelete = document.getElementById('adelete')
    adelete.addEventListener('show.bs.modal', function (event) {
    })
</script>

@endsection