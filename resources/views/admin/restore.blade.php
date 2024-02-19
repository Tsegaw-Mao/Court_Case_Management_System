@extends('master')

@section('title', $viewData['title'])
@section('body')
    <div class="card">
        @can('delete-case')
            <div class="card-header"> Manage Cases
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <br>
                    <thead>

                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Case ID</th>
                            <th scope="col">Case Title</th>
                            <th scope="col">Case Type</th>
                            <th scope="col">Case Detail</th>
                            <th scope="col">Cause of Action</th>
                            <th scope="col">Deleted at</th>
                            <th scope="col">Restore</th>
                            <th scope="col">Permanent Delete</th>
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
                                <td>{{ $case->Case_Title }}</td>
                                <td>{{ $case->Case_Type }}</td>
                                <td>{{ $case->Case_Details }}</td>
                                <td>{{ $case->Cause_of_Action }}</td>
                                <td>{{ $case->deleted_at }}</td>
                                <td>
                                    <a href="{{ route('admin.restore', ['id' => $case->Case_Id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-recycle"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.permanentdelete', ['id' => $case->Case_Id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to peremanently delete the case?')">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <a href="{{ route('admin.restoreall') }}">
                        <button type="button" class="btn btn-primary left">
                            <i class="bi-recycle">Restore All</i>
                        </button>
                    </a>
                </div>
            </div>
        @endcan
    </div>
@endsection
