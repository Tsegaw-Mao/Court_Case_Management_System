<!DOCTYPE html>
<html>
<head>
    <title>Multitple File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
   <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Upload File
                        <a href="{{ url('categories') }}" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('categories/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            {{-- <label>Is Active</label> --}}
                            {{-- <input type="checkbox" name="is_active" {{ old('is_active') == true ? checked:'' }} /> --}}
                            @error('is_active') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Upload File/Image</label>
                            <input type="file" name="file" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</tbody>
</body>
</html
