@extends('master')

@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">
    <div class="card-header"> List of Cases
    </div>
    <div class="card-body">
        <div>
            <a href="{{  }}">
                <button type="button" class="btn btn-primary float-end">
                    List Unassigned Cases
                </button>
            </a>
            <a href="{{  }}">
                <button type="button" class="btn btn-primary float-end">
                    List Assigned Cases
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
                    <th scope="col">Case Title</th>
                    <th scope="col">Plaintiff</th>
                    <th scope="col">Defendant</th>
                    <th scope="col">Plaintiff Lawyer</th>
                    <th scope="col">Defendant Lawyer</th>
                    <th scope="col">Assigned</th>
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
                    <td>{{ $case->P }}</td>
                    <td>{{ $case->Case_Details }}</td>
                    <td>{{ $case->Cause_of_Action }}</td>
                    <td>
                        <a href="{{ route('admin.show', ['id' => $case->Case_Id]) }}">
                            <button class="btn btn-primary">
                                <i class="bi-eye"></i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.edit', ['id' => $case->Case_Id]) }}">
                            <button class="btn btn-primary">
                                <i class="bi-pencil"></i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.delete', ['id' => $case->Case_Id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a href="{{ route('admin.readalldeletes')}}">
                <button type="button" class="btn btn-primary left">
                    <i>Restore Deletes</i>
                </button>
            </a>
        </div>
    </div>
</div>
@endsection
