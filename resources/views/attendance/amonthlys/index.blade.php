@extends('layouts.talimat')

@section('content')
<div class="row justify-content-center pt-5">
    <div class="col-lg-12">
        <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('amonthlys.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.refresh') }}</a>
            <a href="{{ route('amonthlys.create') }}" class="btn btn-sm btn-neutral">{{ __('lang.addnew') }}</a>
            <a href="{{ route('amonthlys.report') }}" class="btn btn-sm btn-neutral">{{ __('lang.report') }}</a>
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
                        <th scope="col" class="text-blue w-10 text-center">{{ __('lang.tdate') }}</th>
                        <th scope="col" class="text-orange w-30">{{ __('lang.teacher') }}</th>
                        <th scope="col" class="text-blue w-10 text-center">{{ __('lang.presence') }}</th>
                        <th scope="col" class="text-blue w-10 text-center">{{ __('lang.absence') }}</th>
                        <th scope="col" class="text-blue w-10 text-center">{{ __('lang.weekend') }}</th>
                        <th scope="col" class="text-blue w-10 text-center">{{ __('lang.leave') }}</th>
                        <th scope="col" class="text-blue w-10 text-center">{{ __('lang.govt_holiday') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.monthname') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.year') }}</th>
                        <th scope="col" class="w-10"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla($data->adate->format('d-m-Y')) }}</td>
                        <td class="font-weight-bold text-orange">{{ $data->teacher ? $data->teacher->name : '' }} </td>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla($data->presence) }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla($data->absence) }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla($data->weekend) }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla($data->leave) }}</td>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla($data->holiday) }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->month ? $data->month->name : '' }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->year ? $data->year->name : '' }}</td>
                        <td class="text-right">
                            <a href="{{ route('amonthlys.show', $data->id) }}" title="show">
                                <i class="fas fa-eye text-orange  fa-lg"></i>
                            </a>
                           <a href="{{ route('amonthlys.edit', $data->id) }}">
                                <i class="fa fas fa-edit  fa-lg"></i>

                            </a>
                            <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('amonthlys.delete', $data->id) }}" title="Delete Project">
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

</script>

@endsection