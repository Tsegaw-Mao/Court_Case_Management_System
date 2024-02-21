@extends('master')
@section('title', $viewData['title'])
@section('body')
    <div class="card">
        <div class="card-header">
            Manage Case {{ $viewData['case']->Case_Title }}
        </div>
        <div class="card-body">

            @can('create-document')
                @if ($viewData['case']->detective_UserId == Auth::user()->UserId)
                    <div>
                        <a href="{{ route('categories.create', ['id' => $viewData['case']->Case_Id]) }}">
                            <button type="button" class="btn btn-primary float-end">
                                Add Document
                            </button>
                        </a>

                        <br>
                    </div>
                @endif
            @endcan
            <table class="table border">
                <thead>

                    <tr>
                        <td scope='col'>Case ID</td>
                        <td>{{ $viewData['case']->Case_Id }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope='col'>Case Title</td>
                        <td>{{ $viewData['case']->Case_Title }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope='col'>Case Type</td>
                        <td>{{ $viewData['case']->Case_Type }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope='col'>Case Detail</td>
                        <td>{{ $viewData['case']->Case_Details }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope='col'>Case Parties</td>
                        <td>{{ $viewData['title'] }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @can('view-document')
                        @if ($viewData['case']->detective_UserId == Auth::user()->UserId)
                            <tr>
                                <td scope='col'>Case Files</td>
                                <td>
                                    <a href="{{ route('categories.index', ['id' => $viewData['case']->Case_Id]) }}">
                                        <button type="button" class="btn btn-primary float-right">
                                            View Documents
                                        </button>
                                    </a>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                    @endcan
                    <tr>
                        <td scope='col'>Actions</td>
                        @if ($viewData['case']->status == 'status1')
                            @can('send-to-attorney')
                                @if ($viewData['case']->detective_UserId == Auth::user()->UserId)
                                    <td>

                                        <a href="{{ route('detective.status.up', ['cid' => $viewData['case']->Case_Id]) }}">
                                            <button type="button" class="btn btn-primary float:right">
                                                Finish
                                            </button>
                                        </a>
                                    </td>
                                @endif
                            @endcan
                        @elseif ($viewData['case']->status == 'status1.5')
                            @can('attorney-accept')
                                <td>
                                    <a href="{{ route('attorney.status.up', ['cid' => $viewData['case']->Case_Id]) }}">
                                        <button type="button" class="btn btn-primary float:right">
                                            Accept
                                        </button>
                                    </a>
                                </td>


                                <td>
                                    <a href="{{ route('attorney.status.down', ['cid' => $viewData['case']->Case_Id]) }}">
                                        <button type="button" class="btn btn-primary float:right">
                                            Decline
                                        </button>
                                    </a>
                                </td>
                            @endcan
                        @elseif ($viewData['case']->status == 'status2')
                            @can('send-to-judge')
                                @if ($viewData['case']->attorney_UserId == Auth::user()->UserId)
                                    <td>
                                        <a href="{{ route('attorney.status.up', ['cid' => $viewData['case']->Case_Id]) }}">
                                            <button type="button" class="btn btn-primary float:right">
                                                Finish
                                            </button>
                                        </a>
                                    </td>
                                @endif
                            @endcan
                        @elseif ($viewData['case']->status == 'status2.5')
                            @can('judge-accept')
                                <td>
                                    <a href="{{ route('judge.status.up', ['cid' => $viewData['case']->Case_Id]) }}">
                                        <button type="button" class="btn btn-primary float:right">
                                            Accept
                                        </button></a>
                                </td>

                                <td>
                                    <a href="{{ route('judge.status.down', ['cid' => $viewData['case']->Case_Id]) }}">
                                        <button type="button" class="btn btn-primary float:right">
                                            Decline
                                        </button></a>
                                </td>
                            @endcan
                        @elseif ($viewData['case']->status == 'status3' || $viewData['case']->status == 'status3.0')
                            @can('judge-veridct')
                                @if ($viewData['case']->judge_UserId == Auth::user()->UserId)
                                    <td>
                                        <a href="{{ route('judge.date', ['cid'=>$viewData['case']->Case_Id]) }}">
                                            <button type="button" class="btn btn-primary float:center">
                                                Assign Date
                                            </button>
                                        </a>
                                        <a href="{{ route('judge.status.up', ['cid' => $viewData['case']->Case_Id]) }}">
                                            <button type="button" class="btn btn-primary float:right">
                                                Finish
                                            </button>
                                        </a>
                                    </td>
                                @endif
                            @endcan
                        @endif

                    </tr>



                </thead>

            </table>

        </div>
    </div>
@endsection
