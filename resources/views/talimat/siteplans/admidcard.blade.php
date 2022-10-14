@extends('layouts.nopad')

@section('content')
<div class="row justify-content-center m-auto" style="background-image:url({{ asset('ess').'/admidcard.png' }}); width: 760px; height: 430px;">
    <div class="col-lg-11">
        <div class="col-lg-6 col-5 text-right">
        </div>

    <div class="card shadow">
        <div class="table-responsive ">
            <table class="table align-items-center table-flush p-5">
                <thead class="thead-light">
                </thead>
                <tbody>
                    <tr>
                        <td>Name</td><td>{{ __('name')}}</td>
                    </tr> 
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

@endsection