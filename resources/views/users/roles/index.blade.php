@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-11 margin-tb">
        <div class="pull-left btn btn-sm btn-outline-success">
            <a href="{{ route('roles.create') }}" class="text-light">
                <i class="fas fa-plus" style="color: #E16805;">{{ __('lang.addnew') }}</i>
            </a>
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
                            <tr>
                                <th scope="col" class="text-blue text-center w-10">{{ __('lang.id') }}</th>
                                <th scope="col" class="text-orange w-60">{{ __('lang.name') }}</th>
                                <th scope="col" class="text-blue w-10">{{ __('lang.createdBy') }}</th>
                                <th scope="col" class="text-blue w-10">{{ __('lang.creationDate') }}</th>
                                <th scope="col" class="w-10"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)                            
                                <tr>
                                    <td class="font-weight-bold text-blue text-center">{{ \App\Http\Controllers\BnumberController::toBangla(++$i) }}</td> 
                                    <td class="font-weight-bold text-orange">{{ $role->name }}</td>
                                    <td class="font-weight-bold text-blue">{{ $role->user ? $permission->user->name : '' }}</td>
                                    <td class="font-weight-bold text-blue">{{ \App\Http\Controllers\BnumberController::toBangla($role->created_at->format('d/m/Y')) }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('roles.show', $role->id) }}" title="show">
                                            <i class="fas fa-eye text-orange  fa-lg"></i>
                                        </a>
                                        <a href="{{ route('roles.edit', $role->id) }}">
                                            <i class="fa fas fa-edit  fa-lg"></i>

                                        </a>
                                        <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('roles.delete', $role->id) }}" title="Delete Project">
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

    {!! $roles->render() !!}
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