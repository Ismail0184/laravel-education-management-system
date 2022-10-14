@extends('layouts.talimat')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 margin-tb">
        <div class="card shadow">
        <div class="card shadow">
                <div class="card-body pt-0 pt-md-4">
                <hr class="my-4" />
                        <form method="post" action="{{route('teachers.fileUpload')}}" enctype="multipart/form-data">
                            @csrf
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="user-image mb-3 text-center">
                                <div class="imgPreview h-50 w-50"> </div>
                            </div>            
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                <div class="custom-file">
                                    <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple" required>
                                    <input type="hidden" name="teacher_id" value="{{ $data->id }}" >
                                    <label class="custom-file-label" for="images">Choose image</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group {{ $errors->has('classes_id') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group mb-3">
                                    <select class="form-control" name="image_field" data-toggle="select" required>
                                        <option value=''>{{ __('lang.selectimagetype') }}</option>
                                        <option value='profile_image_name'>{{ __('lang.profile_image_name') }}</option>
                                        <option value='nid_image_name'>{{ __('lang.nid_image_name') }}</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('classes_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('classes_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                {{_('ছবি আপলোড')}}
                            </button>                        
                        </form>
                    </div>
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
                            <img src="{{ asset('teachers') }}/{{ $data->profile_image_name }}" class="img-thumbnail rounded-circle">
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

<!-- jQuery -->
    <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    
    </script>
@endsection
