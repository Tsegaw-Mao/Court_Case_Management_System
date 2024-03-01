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
                    {{ __(' Add Document') }}
                </button>
            </a>

            <br>
        </div>
        @endif
        @endcan
        <table class="table border">
            <thead>

                <tr>
                    <td scope='col'>{{ __('Case ID') }}</td>
                    <td>{{ $viewData['case']->Case_Id }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope='col'>{{ __('Case Title') }}</td>
                    <td>{{ $viewData['case']->Case_Title }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope='col'>{{ __('Case Type') }}</td>
                    <td>{{ $viewData['case']->Case_Type }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope='col'>{{ __('Case Detail') }}</td>
                    <td>{{ $viewData['case']->Case_Details }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope='col'>{{ __('Case Parties') }}</td>
                    <td>{{ $viewData['title'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                @can('view-document')
                @if ($viewData['case']->detective_UserId == Auth::user()->UserId)
                <tr>
                    <td scope='col'>{{ __('Case Files') }}</td>
                    <td>
                        <a href="{{ route('categories.index', ['id' => $viewData['case']->Case_Id]) }}">
                            <button type="button" class="btn btn-primary float-right">
                                {{ __(' View Documents') }}
                            </button>
                        </a>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                @endif
                @endcan
                <tr>
                    <td scope='col'>{{ __('Actions') }}</td>
                    @if ($viewData['case']->status == 'status1')
                    @can('send-to-attorney')
                    @if ($viewData['case']->detective_UserId == Auth::user()->UserId)
                    <td>

                        <a href="{{ route('detective.status.up', ['cid' => $viewData['case']->Case_Id]) }}">
                            <button type="button" class="btn btn-primary float:right">
                                {{ __('Finish') }}
                            </button>
                        </a>
                    </td>
                    @endif
                    @endcan
                    @elseif ($viewData['case']->status == 'status1.5')
                    @can('attorney-accept')
                <tr>
                    <td scope='col'>{{ __('Case Files') }}</td>
                    <td>
                        <a href="{{ route('categories.index', ['id' => $viewData['case']->Case_Id]) }}">
                            <button type="button" class="btn btn-primary float-right">
                                {{ __(' View Documents') }}
                            </button>
                        </a>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <td>
                    <a href="{{ route('attorney.status.up', ['cid' => $viewData['case']->Case_Id]) }}">
                        <button type="button" class="btn btn-primary float:right">
                            {{ __('Accept') }}
                        </button>
                    </a>
                </td>


                <td>
                    <a href="{{ route('attorney.status.down', ['cid' => $viewData['case']->Case_Id]) }}">
                        <button type="button" class="btn btn-primary float:right">
                            {{ __('Decline') }}
                        </button>
                    </a>
                </td>
                @endcan
                @elseif ($viewData['case']->status == 'status2')
                @can('send-to-judge')
                @if ($viewData['case']->attorney_UserId == Auth::user()->UserId)
                <tr>
                    <td scope='col'>{{ __('Case Files') }}</td>
                    <td>
                        <a href="{{ route('categories.index', ['id' => $viewData['case']->Case_Id]) }}">
                            <button type="button" class="btn btn-primary float-right">
                                {{ __(' View Documents') }}
                            </button>
                        </a>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <td></td>
                <td>
                    <a href="{{ route('attorney.status.up', ['cid' => $viewData['case']->Case_Id]) }}">
                        <button type="button" class="btn btn-primary float:right">
                            {{ __('Finish') }}
                        </button>
                    </a>
                </td>
                @endif
                @endcan
                @elseif ($viewData['case']->status == 'status2.5')
                @can('judge-accept')
                <td>
                    <!-- <a href="{{ route('judge.status.up', ['cid' => $viewData['case']->Case_Id]) }}"> -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2">
                        {{ __('Accept') }}
                    </button>
                    <!-- </a> -->
                </td>

                <td>
                    <a href="{{ route('judge.status.down', ['cid' => $viewData['case']->Case_Id]) }}">
                        <button type="button" class="btn btn-primary float:right">
                            {{ __('Decline') }}
                        </button></a>
                </td>
                @endcan
                @elseif ($viewData['case']->status == 'status3' || $viewData['case']->status == 'status3.0')
                @can('judge-veridct')
                @if ($viewData['case']->judge_UserId == Auth::user()->UserId)
                <td>
                    <a href="{{ route('judge.date', ['cid' => $viewData['case']->Case_Id]) }}">
                        <button type="button" class="btn btn-primary float:center">
                            {{ __(' Assign Date') }}
                        </button>
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        {{ __('Finish') }}
                    </button>
                </td>
                @endif
                @endcan
                @endif

                </tr>



            </thead>

        </table>

    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title">Final Verdict on Case</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('judge.verdict',['cid'=>$viewData['case']->Case_Id])}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">{{ __('verdict')}}</label>
                                <div class="col-lg-6 col-md-6 col-sm-12">

                                    <input name="verdict" value="{{ $viewData['case']->verdict }}" type="text" class="form-control" placeholder="Enter Final Case Verdict" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary bold">{{ __('Submit')}}</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal" id="myModal2">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title">Assign Lawyer to Defendant</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <?php
                 $lawyers = \App\Models\Lawyer::all();
            ?>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('judge.assign.lawyer',['cid'=>$viewData['case']->Case_Id])}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">{{ __('Select Lawyer')}}</label>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select name="lawyer">
                                        @foreach($lawyers as $lawyer)
                                        <option value="{{$lawyer->UserId}}">$lawyer->FirstName</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary bold">{{ __('Submit')}}</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@endsection