@extends('layouts.talimat')

@section('content')
<div class="row justify-content-center pt-3">
    <div class="col-lg-11">
        <h6 class="mb-2 text-success">{{ __('lang.createadmission')}}</h6>
        <div class="col-lg-11 text-center">
            <a href="{{ route('admissions.create') }}" class="btn btn-sm btn-neutral">{{ __('lang.addnew') }}</a>
            <a href="{{ route('admissions.report') }}" class="btn btn-sm btn-neutral">{{ __('lang.report') }}</a>
            <a href="{{ route('admissions.mobile') }}" class="btn btn-sm btn-neutral">{{ __('lang.mobile') }}</a>
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
                        <th scope="col" class="text-blue w-10">{{ __('lang.id') }}</th>
                        <th scope="col" class="text-orange w-30">{{ __('lang.student') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.birth_image_name') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.fname') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.jamat') }}</th>
                        <th scope="col" class="text-blue w-10">{{ __('lang.branch') }}</th>
                        <th scope="col" class="w-10"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)                            
                    <tr>
                        <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla(++$i) }}</td> 
                        <td class="font-weight-bold text-orange">
                            @if($data->profile_image_name)
                                <a href="#" class="pop mr-2">
                                    <img src="{{ asset('students') }}/{{ $data->profile_image_name }}" style="height: 30px; width: 30px;">
                                </a>
                            @endif
                            {{ $data->name }}
                        </td>
                        <td class="font-weight-bold text-blue">
                            @if($data->nid_image_name)
                                <a href="#" class="pop mr-2">
                                    <img src="{{ asset('students') }}/{{ $data->nid_image_name }}" style="height: 30px; width: 30px;;">
                                </a>
                            @endif
                            @if($data->birth_image_name)
                                <a href="#" class="pop">
                                    <img src="{{ asset('students') }}/{{ $data->birth_image_name }}" style="height: 30px; width: 30px;;">
                                </a>
                            @endif
                        </td>
                        <td class="font-weight-bold text-blue">{{ $data->fname }}</td>
                        <td class="font-weight-bold text-blue"><a class="text-decoration-none" href="{{ url('clss',$data->classes_id) }}">{{ $data->classes ? $data->classes->name : ''}}</a></td>
                        <td class="font-weight-bold text-blue"><a class="text-decoration-none" href="{{ url('branch',$data->branch_id) }}">{{ $data->branch ? $data->branch->name : '' }}</a></td>
                        <td class="text-right">
                            <a href="{{ route('admissions.show', $data->id) }}" title="show">
                                <i class="fas fa-eye text-orange  fa-lg"></i>
                            </a>
                           <a href="{{ route('admissions.edit', $data->id) }}">
                                <i class="fa fas fa-edit  fa-lg"></i>

                            </a>
                            <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('admissions.delete', $data->id) }}" title="Delete Project">
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

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
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

    $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
    });
</script>

@endsection