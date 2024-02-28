{{-- <!DOCTYPE html>
<html>
<head>
    <title>Multitple File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
   <div class="container mt-5">
    <div class="row">
        <div class="col-md-12"> --}}
@extends('master')

@section('body')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>{{ __('Upload File')}}
                <a href="{{ url('categories/' . $Case_Id) }}" class="btn btn-primary float-end">{{ __('Back')}}</a>
            </h3>
        </div>
        @can('create-document')
        <div class="card-body">
            <form action="{{ route('categories.store', ['id' => $Case_Id]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-0 col-sm-1 col-form-label bold">{{ __('Name:')}}</label>
                    <div class="col-lg-10 col-md-8 col-sm-20">
                        <div class="col-lg-7 col-md-4 col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label class="col-lg-2 col-md-0 col-sm-1 col-form-label bold">{{ __('Description:')}}</label><br>
                    <div class="col-lg-10 col-md-1 col-sm-10">
                        <div class="col-lg-7 col-md-4 col-sm-10">

                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                   </div>
                    </div>
                </div>
                <div class="mb-3">
                    {{-- <label>Is Active</label> --}}
                    {{-- <input type="checkbox" name="is_active" {{ old('is_active') == true ? checked:'' }} /> --}}
                    @error('is_active')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-0 col-sm-1 col-form-label bold">{{ __('Upload File/Image:')}}</label>
                        <div class="col-lg-9 col-md-2 col-sm-10">

                             <div class="col-lg-6 col-md-4 col-sm-10">

                                <div class="mb-3 row">
                            <input type="file" name="file" class="form-control" />
                </div>
                <div class="mb-3"><br>
                    <button type="submit" class="btn btn-primary">{{ __("Save")}}</button>
                </div>

            </form>
        </div>
        @endcan
    </div>
    </div>
    </div>
    </div>
    </tbody>
    {{-- </body>
</html --}}
@endsection
