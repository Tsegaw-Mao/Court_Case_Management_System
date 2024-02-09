<!DOCTYPE html>
<html>
<head>
    <title>Multitple File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>


<div class="container">
    <h2 class="text-center mt-5 mb-3">Multitple File Upload</h2>
    <div class="card">
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <b>{{ $message }}</b>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="row" method="post" action="{{url('multiple-file-upload')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-auto">
                    {{-- <a href="{{ url('add')}}" class="btn  btn-primary float-end">add document</a> --}}
                    <input type="file" name="fileuploads[]" class=" form-control" multiple >
                </div>
                <div class="col-auto">
                    <label for="discription" class="btn btn-outline-primary mb-3">File Discription</button>
                    <input type="text" name="discription" class=" form-control">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-primary mb-3">Upload Files</button>
                </div>

            </form>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>File Path</th>
                        <th>File Discription</th>
                        <th>File Type</th>

                        {{-- <th>File Descreption</th> --}}
                    </tr>
                </thead>
                <tbody>
                @foreach ($fileUploads as $fileUpload)
                    <tr>
                        <td>{{ $fileUpload->filename }}</td>
                        <td>{{ $fileUpload->filepath }}</td>
                        <td>{{ $fileUpload->discription}}
                        <td>{{ $fileUpload->type }}</td>

                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>


</body>
</html>
