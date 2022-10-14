@extends('layouts.talimat')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 margin-tb">
        <div class="card shadow">
                <div class="table-responsive">
                <table class="table table-responsive{-sm|-md|-lg|-xl} align-items-center table-flush">
                    <thead class="thead-light">
                        <tr class="row m-0">
                            <th class="d-inline-block col-3">Criteria</th>
                            <th class="d-inline-block col-4">Value</th>
                            <th class="d-inline-block col-5">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Roll</td>
                        <td class="d-inline-block col-4">{{ $data->roll }}</td>
                        <td class="d-inline-block col-5" rowspan=4>
                            <img src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg" class="img-thumbnail rounded-circle">
                        </td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Name</td>
                        <td class="d-inline-block col-4">{{ $data->name }}</td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Father's Name</td>
                        <td class="d-inline-block col-4">{{ $data->fname }}</td>
                   </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Mother's Name</td>
                        <td class="d-inline-block col-4">{{ $data->mname }}</td>
                       
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Date of Birth</td>
                        <td class="d-inline-block col-5">{{ $data->dob }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Nationality</td>
                        <td class="d-inline-block col-5">{{ $data->nationality }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Mobile</td>
                        <td class="d-inline-block col-5">{{ $data->mobile }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Email</td>
                        <td class="d-inline-block col-5">{{ $data->email }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Session</td>
                        <td class="d-inline-block col-5">{{ $data->session }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Old Or New</td>
                        <td class="d-inline-block col-5">{{ $data->oldornew }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">NID Number</td>
                        <td class="d-inline-block col-5">{{ $data->nid }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Special Identity</td>
                        <td class="d-inline-block col-5">{{ $data->specialidentity }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Present Address</td>
                        <td class="d-inline-block col-5">{{ $data->caddress }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Permanent Address</td>
                        <td class="d-inline-block col-5">{{ $data->paddress }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
                    <tr class="row m-0">
                        <td class="d-inline-block col-3 text-orange">Previous Education</td>
                        <td class="d-inline-block col-5">{{ $data->paddress }}</td>
                        <td class="d-inline-block col-4"></td>
                    </tr>
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