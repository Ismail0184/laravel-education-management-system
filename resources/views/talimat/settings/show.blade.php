@extends('layouts.talimat')


@section('content')
<div class="row justify-content-center">
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="pull-left">
            <h2> Show Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-outline-success" href="{{ route('settings.index') }}"> Back</a>
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $data->name }}
        </div>
    </div>
    
</div>
@endsection