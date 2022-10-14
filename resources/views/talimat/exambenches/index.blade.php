@extends('layouts.talimat')

@section('content')
<div class="row justify-content-center pt-3">
    <div class="col-lg-11">
        <h6 class="mb-2 text-success">{{ __('lang.examhollseat')}}</h6>
        <div class="col-lg-11 text-center">
            <a href="{{ route('exambenches.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.refresh') }}</a>
            <a href="{{ route('exambenches.create') }}" class="btn btn-sm btn-neutral">{{ __('lang.addnew') }}</a>
            <a href="{{ route('exambenches.report') }}" class="btn btn-sm btn-neutral">{{ __('lang.report') }}</a>
            <a href="{{ route('exambenches.lebel') }}" class="btn btn-sm btn-neutral">{{ __('lang.lebel') }}</a>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#auto" data-bs-whatever="@mdo">{{ __('lang.auto') }}</button>

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
                        <th scope="col" class="text-orange w-30">{{ __('lang.bench') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.seat_count') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.c1') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.c3') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.examholl') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.exam') }}</th>
                        <th scope="col" class="w-10"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla(++$i) }}</td>
                        <td class="font-weight-bold text-orange">{{ $data->name }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla($data->bench_row) }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ $data->c1 }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ $data->c3 }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->examholl ? $data->examholl->name : '' }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->examname ? $data->examname->name : '' }}</td>
                        <td class="text-right">
                            <a href="{{ route('exambenches.show', $data->id) }}" title="show">
                                <i class="fas fa-eye text-orange  fa-lg"></i>
                            </a>
                           <a href="{{ route('exambenches.edit', $data->id) }}">
                                <i class="fa fas fa-edit  fa-lg"></i>
                            </a>
                            <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('exambenches.delete', $data->id) }}" title="Delete Project">
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

<div class="modal fade" id="auto" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('lang.makingexamhollseat') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {!! Form::open(array('route' => 'exambenches.auto','method'=>'POST')) !!}
      @csrf
          <div class="mb-3">
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
        <button type="submit" class="btn btn-primary">{{ __('lang.maketheseat') }}</button>
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

var exampleModal = document.getElementById('auto')
exampleModal.addEventListener('show.bs.modal', function (event) {
  
})

</script>

@endsection