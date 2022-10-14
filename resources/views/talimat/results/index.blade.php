@extends('layouts.talimat')

@section('content')
<div class="row justify-content-center pt-2">
    <div class="col-lg-11">
        <h5 class="mb-2 text-success">{{ __('lang.resultnumber')}}</h5>
        <div class="col-lg-11 text-center">
            <a href="{{ route('results.create') }}" class="btn btn-sm btn-neutral">{{ __('lang.addnew') }}</a>
            <a href="{{ route('results.report') }}" class="btn btn-sm btn-neutral">{{ __('lang.report') }}</a>
            @if($admission_id !== null)
                <a href="{{ route('results.marksheet') }}" class="btn btn-sm btn-neutral">{{ __('lang.marksheet') }}</a>
            @endif
            @if($classes_id !== null)
                <a href="{{ route('results.classresult') }}" class="btn btn-sm btn-neutral">{{ __('lang.result') }}</a>
            @endif
            <a href="{{ url('refresh') }}" class="btn btn-sm btn-neutral">{{ __('lang.refresh') }}</a>
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
                        <th scope="col" class="text-blue w-10 text-center">{{ __('lang.id') }}</th>
                        <th scope="col" class="text-orange w-30 text-center">{{ __('lang.mark') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.status') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.subject') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.jamat') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.student') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.exam') }}</th>
                        <th scope="col" class="w-10"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr>
                    <div style="display: none">{{  $data->fail !== 0 ? $cls='red' : $cls='blue' }} </div>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla(++$i) }}</td>
                        <td class="font-weight-bold text-orange text-center">{{ \App\Http\Controllers\BnumberController::toBangla($data->mark) }} {{ $data->grace_mark !==0 ? '+'. \App\Http\Controllers\BnumberController::toBangla($data->grace_mark) : ''}}</td>
                        <td class="font-weight-bold text-{{ $cls }}">{{ $data->fail == 0 ? __('lang.status1') : __('lang.status0') }}</td>
                        <td class="font-weight-bold text-blue"><a class="text-decoration-none" href="{{ url('subject',$data->subject_id) }}">{{ $data->subject ? $data->subject->name : '' }}</a></td>
                        <td class="font-weight-bold text-blue"><a class="text-decoration-none" href="{{ url('clss',$data->classes_id) }}">{{ $data->classes ? $data->classes->name : '' }}</a></td>
                        <td class="font-weight-bold text-blue"><a class="text-decoration-none" href="{{ url('student',$data->student_id) }}">{{ $data->student ? $data->student->name : '' }}</a></td>
                        <td class="font-weight-bold text-blue">{{ $data->examname ? $data->examname->name : '' }}</td>
                        <td class="text-right">
                            <a href="{{ route('results.show', $data->id) }}" title="show">
                                <i class="fas fa-eye text-orange  fa-lg"></i>
                            </a>
                           <a href="{{ route('results.edit', $data->id) }}">
                                <i class="fa fas fa-edit  fa-lg"></i>

                            </a>
                            <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('results.delete', $data->id) }}" title="Delete Project">
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