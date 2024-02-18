@extends('master')

@section('title',$viewData['title'])

@section('body')
<div class="card">
    <div class="card-header bold"> Manage Cases
    </div>
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif
        @can('create-case')
        <div>
            <a href="{{ route('admin.create') }}">
                <button type="button" class="btn btn-primary float-end">
                    Create Case
                </button>
            </a>

            <br>
        </div>
        @endcan


        <table class="table table-bordered table-striped">
            <br>
            <thead>

                <tr class="bold">
                    <th scope="col">#</th>
                    <th scope="col">Case ID</th>
                    <th scope="col">Plaintiff</th>
                    <th scope="col">Defendant</th>
                    <th scope="col">Case Title</th>
                    <th scope="col">Case Type</th>
                    <th scope="col">Case Detail</th>
                    <th scope="col">Cause of Action</th>
                    <th scope="col">Action</th>
                    <!-- <th scope="col">Edit</th>
                    <th scope="col">Delete</th> -->
                </tr>

            </thead>
            <tbody>
                <?php
                $count = 0;
                ?>
                @foreach ($viewData['cases'] as $case)
                <?php
                $count++;
                ?>
                <tr>
                    <td>{{ $count }}</td>
                    <td>{{ $case->Case_Id }}</td>
                    <td>{{ $case->Plaintiff()->get()->value("FirstName") }}</td>
                    <td>{{ $case->Defendants()->get()->value("FirstName") }}</td>
                    <td>{{ $case->Case_Title }}</td>
                    <td>{{ $case->Case_Type }}</td>
                    <td>{{ $case->Case_Details }}</td>
                    <td>{{ $case->Cause_of_Action }}</td>
                    <td>
                        @can('view-case')
                        <a href="{{ route('admin.show', ['id' => $case->Case_Id]) }}">
                            <button class="btn btn-primary">
                                <i class="bi-eye"></i>
                            </button>
                        </a>
                        @endcan
                        @can('edit-case')        
                        <a href="{{ route('admin.edit', ['id' => $case->Case_Id]) }}">
                            <button class="btn btn-primary">
                                <i class="bi-pencil"></i>
                            </button>
                        </a>
                        @endcan
                        @can('delete-case')
                        <form action="{{ route('admin.delete', ['id' => $case->Case_Id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                onclick="return confirm('Are you sure you want delete the case?')">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                        @endcan
                        @can('assign-detective')
                        <a href="{{ route('detective.assign', ['cid' => $case->Case_Id]) }}">
                            <button class="btn btn-primary">
                                <i class="bi-pencil"></i>
                            </button>
                        </a>
                        @endcan
                        @can('assign-attorney')
                        <a href="{{ route('attorney.assign', ['cid' => $case->Case_Id]) }}">
                            <button class="btn btn-primary">
                                <i class="bi-pencil"></i>
                            </button>
                        </a>
                        @endcan
                        @can('assign-judge')
                        <a href="{{ route('judge.assign', ['cid' => $case->Case_Id]) }}">
                            <button class="btn btn-primary">
                                <i class="bi-pencil"></i>
                            </button>
                        </a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @can('delete-case')
        <div>
            <a href="{{ route('admin.readalldeletes')}}">
                <button type="button" class="btn btn-primary left">
                    <i>Restore Deletes</i>
                </button>
            </a>
        </div>
        @endcan
    </div>
</div>
@endsection