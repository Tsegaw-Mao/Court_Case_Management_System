
@extends('master')

@section('body')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
            <div class="card">
                <div class="card-header">
                    <h4>DOCUMENTS
                        <a href="{{ url('categories/create/'.$categories['id']) }}" class="btn btn-primary float-end">Upload File</a>
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
                            @foreach ($categories['categories'] as $item)
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
                                    <a href="{{ url('categories/'.$item->id.'/edit/'.$item->legal_case_Case_Id) }}" class="btn btn-success mx-2">Edit</a>

                                    <a
                                        href="{{ url('categories/'.$item->id.'/delete/'.$item->legal_case_Case_Id) }}"
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

@endsection
