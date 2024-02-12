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

            <!-- <div class="card">
                <div class="card-header">
                    <h4>Add Categories
                        <a href="{{ url('categories') }}" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div> -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>DOCUMENTS
                        <a href="{{ url('categories/create') }}" class="btn btn-primary float-end">Upload File</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>File</th>
                                {{-- <th>Is Active</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <img src="{{ asset($item->file) }}" style="width: 70px; height:70px;" alt="Img" />
                                </td>
                                {{-- <td>
                                    @if ($item->is_active)
                                        Active
                                    @else
                                        In-Active
                                    @endif
                                </td> --}}
                                <td>
                                    <a href="{{ url('categories/'.$item->id.'/edit') }}" class="btn btn-success mx-2">Edit</a>

                                    <a
                                        href="{{ url('categories/'.$item->id.'/delete') }}"
                                        class="btn btn-danger mx-1"
                                        onclick="return confirm('Are you sure you want delete the file?')"
                                    >
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</tbody>

</body>
</html

