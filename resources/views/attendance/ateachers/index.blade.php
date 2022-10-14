@extends('layouts.talimat')

@section('content')
<div class="row justify-content-center pt-5">
    <div class="col-lg-11">
        <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('ateachers.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.refresh') }}</a>
            <a href="{{ route('ateachers.create') }}" class="btn btn-sm btn-neutral">{{ __('lang.addnew') }}</a>
            <a href="{{ route('ateachers.report') }}" class="btn btn-sm btn-neutral">{{ __('lang.report') }}</a>
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
                        <th scope="col" class="text-blue w-10">{{ __('lang.tdate') }}</th>
                        <th scope="col" class="text-orange w-30">{{ __('lang.teacher') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.atype') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.time_in') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.time_out') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.amethod') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.createdBy') }}</th>
                        <th scope="col" class="w-10"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr>
                        <td class="font-weight-bold text-blue">{{ \App\Http\Controllers\BnumberController::toBangla($data->adate->format('d-m-Y')) }}</td>
                        <td class="font-weight-bold text-orange">{{ $data->teacher ? $data->teacher->name : '' }} </td>
                        <td class="font-weight-bold text-blue">{{ $data->atype ? $data->atype->name : ''}}</td>
                        <td class="font-weight-bold text-blue">{{ \App\Http\Controllers\BnumberController::toBangla($data->time_in) }}</td>
                        <td class="font-weight-bold text-blue">{{ \App\Http\Controllers\BnumberController::toBangla($data->time_out) }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->amethod->name }}</td>
                        <td class="font-weight-bold text-blue">{{ $data->user ? $data->user->name : '' }}</td>
                        <td class="text-right">
                            <a href="{{ route('ateachers.show', $data->id) }}" title="show">
                                <i class="fas fa-eye text-orange  fa-lg"></i>
                            </a>
                           <a href="{{ route('ateachers.edit', $data->id) }}">
                                <i class="fa fas fa-edit  fa-lg"></i>

                            </a>
                            <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('ateachers.delete', $data->id) }}" title="Delete Project">
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