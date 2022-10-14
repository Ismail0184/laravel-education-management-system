@extends('layouts.talimat')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right btn btn-md btn-outline-success">
            <a href="{{ route('roles.create') }}" class="text-light">
                <i class="fas fa-plus" style="color: #f4645f;"> Add New</i>
            </a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<div class="row">
        <div class="col">
            <div class="card shadow">
                 <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
      
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                                                        
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item btn btn-sm btn-outline-success" href="{{ route('roles.show',$role->id) }}">
                    <i class="fas fa-eye" style="color: #f4645f;"> Show</i>
                </a>
                <a class="dropdown-item btn btn-sm btn-outline-success" href="{{ route('roles.edit',$role->id) }}">
                    <i class="fas fa-edit" style="color: #f4645f;"> Edit</i>
                </a>
                <a class="dropdown-item btn btn-sm btn-outline-success" href="{{ route('roles.destroy',$role->id) }}">
                    <i class="fas fa-minus" style="color: #f4645f;"> Delete</i>
                </a>
            </div>
            </div>
        </td>
    </tr>
    @endforeach
</table>
</div>
</div>
</div>
</div>

{!! $roles->render() !!}

@endsection