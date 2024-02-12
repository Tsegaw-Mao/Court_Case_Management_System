@extends('master')
@section('body')
<div class="card">
    <div class="card-header"> Manage Cases
    </div>
    <div class="card-body">
        <div>
            <a href="{{ route('admin.addFile') }}">
                <button type="button" class="btn btn-primary float-end">
                    Add Document
                </button>
            </a>

            <br>
        </div>


        <table class="table table-bordered table-striped">
            <br>
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Case ID</th>
                    <th scope="col">Document Name</th>
                    <th scope="col">Document Type</th>
                    <th scope="col">Document Discription</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>

<<<<<<< HEAD
            </thead>
            <tbody>
                <?php
                $count = 0;
                ?>
                @foreach ($fileuploads as $file)
                <?php
                $count++;
                ?>
                <tr>
                    <td>{{ $count }}</td>
                    <td>{{ $file->Case_Id }}</td>
                    <td>{{ $file->filename }}</td>
                    <td>{{ $file->type }}</td>
                    <td>{{ $file->discription }}</td>
                    <td>
                        <a href="{{ route('admin.showFile', ['id' => $file->id]) }}">
                            <button class="btn btn-primary">
                                <i class="bi-eye"></i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.editFile', ['id' => $file->id]) }}">
                            <button class="btn btn-primary">
                                <i class="bi-pencil"></i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.deleteFile', ['id' => $file->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
=======
            </form>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>File Path</th>
                        <th>File Discription</th>
                        <th>File Type</th>
                        <th>Action Type</th>

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
                        <td>
                            <a href="url {{'edit/.$fileUpload->id'}}" class="btn btn sucess">Edit</a>
                            <a href="url {{'delete/.$fileUpload->id'}}"class="btn btn-danger">Delete</a>

                    </tr>
>>>>>>> 554a7c9781f88f7cde5681e602a04c32e25d4b08
                @endforeach
            </tbody>
        </table>
        <div>
            <a href="{{ route('admin.readalldeletedFiles')}}">
                <button type="button" class="btn btn-primary left">
                    <i>Restore Deletes</i>
                </button>
            </a>
        </div>
    </div>
</div>
@endsection