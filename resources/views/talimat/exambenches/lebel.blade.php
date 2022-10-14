@extends('layouts.nopad')

@section('content')
<div class="row justify-content-center col-xs-12 col-sm-12 col-md-12">
    <div class="card shadow">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <div style="display: none">{{ $n=0 }}</div>                        
            <table class="table">
                <thead class="thead-light">
                    <tr >
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)
                        <div style="display: none">{{ $n++ }}</div>                        
                        @if($n == 1)
                            <tr>
                                <td>
                                <table class="h1 m-4">
                                    <tr><td ><span class="h1 m-6">{{ $data->name }}</span></td></tr>
                                    <tr><td ><span class="h1 m-6">{{ $data->examholl ? $data->examholl->name : '' }}</span></td></tr>
                                    <tr><td ><span class="h1 m-6">{{ $data->examname ? $data->examname->name : '' }}</span></td></tr>
                                </table>
                                </td>
                        @elseif($n == 2)
                                <td>
                                    <table class="h1 m-4">
                                        <tr><td><span class="h1 m-6">{{ $data->name }}</span></td></tr>
                                        <tr><td><span class="h1 m-6">{{ $data->examholl ? $data->examholl->name : '' }}</span></td></tr>
                                        <tr><td><span class="h1 m-6">{{ $data->examname ? $data->examname->name : '' }}</span></td></tr>
                                    </table>
                                </td>
                            </tr>
                        @endif               
                        <div style="display: none">{{ $n == 2 ? $n=0 : '' }}</div>
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

@endsection