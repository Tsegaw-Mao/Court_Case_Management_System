@extends('master3')
@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">
    <div class="card-header">
        Manage Case {{$viewData['case']->Case_Title}}
    </div>
    <div class="card-body">
        <div>
            <a href="{{ route('categories.create',['id'=>$viewData['case']->Case_Id]) }}">
                <button type="button" class="btn btn-primary float-end">
                    Add Document
                </button>
            </a>

            <br>
        </div>
        <table>
            <thead>
                <th>
                    <tr>
                        <td scope='col'>Case ID</td>
                        <td>{{$viewData['case']->Case_Id}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope='col'>Case Title</td>
                        <td>{{$viewData['case']->Case_Title}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope='col'>Case Type</td>
                        <td>{{$viewData['case']->Case_Type}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope='col'>Case Detail</td>
                        <td>{{$viewData['case']->Case_Details}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope='col'>Plaintiff's Name</td>
                        <td>{{$viewData['case']->Plaintiff()->get()->value("FirstName") }} {{$viewData['case']->Plaintiff()->get()->value("LastName") }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope='col'>Defendant's Name</td>
                        <td>{{$viewData['case']->Defendants()->get()->value("FirstName") }} {{$viewData['case']->Defendants()->get()->value("LastName") }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope='col'>Case Files</td>
                        <td>
                            <a href="{{ route('categories.index',['id'=>$viewData['case']->Case_Id]) }}">
                                <button type="button" class="btn btn-primary float-end">
                                    View Documents
                                </button>
                            </a>

                        </td>
                        <td></td>
                    </tr>


                </th>
            </thead>
        </table>
    </div>
</div>
@endsection
