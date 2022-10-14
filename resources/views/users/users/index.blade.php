@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-11 margin-tb">
        @if(!Request::routeIs('users.trashed'))
        <div class="pull-left btn btn-sm btn-outline-success">
                <a href="{{ route('users.create') }}" class="text-light">
                    <i class="fas fa-plus" style="color: #E16805;">{{ __('lang.addnew') }}</i>
                </a>
        </div>
        @endif
 
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
                            <tr>
                                <th scope="col" class="text-blue w-10">{{ __('lang.id') }}</th>
                                <th scope="col" class="text-orange w-50">{{ __('lang.name') }}</th>
                                <th scope="col" class="text-blue w-10">{{ __('lang.email') }}</th>
                                <th scope="col" class="text-blue w-10">{{ __('lang.createdBy') }}</th>
                                <th scope="col" class="text-blue w-10">{{ __('lang.creationDate') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)                            
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        @if($user->image_name)
                                            <a href="#" class="pop">
                                                <img src="{{ asset('uploads') }}/{{ $user->image_name }}" style="height: 30px; width: 30px;;">
                                            </a>
                                        @endif
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </td>
                                    <td class="font-weight-bold text-blue">{{ \App\Http\Controllers\BnumberController::toBangla($user->created_at->format('d/m/Y')) }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('users.show', $user->id) }}" title="show">
                                            <i class="fas fa-eye text-orange  fa-lg"></i>
                                        </a>
                                        <a href="{{ route('users.edit', $user->id) }}">
                                            <i class="fa fas fa-edit  fa-lg"></i>

                                        </a>
                                        <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('users.delete', $user->id) }}" title="Delete Project">
                                            <i class="fas fa-trash text-danger  fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {!! $data->render() !!}

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