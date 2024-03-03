@extends('master')
@section('body')
<?php
    $appointed = 0;
    $closedByAttorney = 0;
    $bail =0;
    $warrant=0;
    $catch=0;
    $detained = 0;
    $undetained = 0;
    $lastYear =0;
    $newCase = 0;
    $totalCase = 0;
    $verdicted = 0;
    $transfered = 0;
    foreach($viewData['cases'] as $casee){
        if($casee->status == 'status3' && $casee->Cause_of_Action != null)
        {
            $appointed++;
        }
        if($casee->status == 'status3.5' && $casee->verdict == 'ClosedByAttorney')
        {
            $closedByAttorney++;
        }
        if($casee->status == 'status3' && $casee->bail == 'true')
        {
            $bail++;
        }
        if($casee->status == 'status3' && $casee->warrant == 'true')
        {
            $warrant++;
        }
        if($casee->status == 'status3' && $casee->catch == 'true')
        {
            $catch++;
        }
        if($casee->status == 'status3' && $casee->detained == 'true')
        {
            $detained++;
        }
        if($casee->status == 'status3' && $casee->detained == 'false')
        {
            $undetained++;
        }
        if($casee->assignedDate < $viewData['dateFrom'])
        {
            $lastYear++;
        }
        if($casee->assignedDate > $viewData['dateFrom'])
        {
            $newCase++;
        }
        
        if($casee->status == 'status3.5')
        {
            $verdicted++;
        }
        if($casee->status == 'status3')
        {
            $transfered++;
        }
    }
    $totalCase = $newCase + $lastYear;

?>
<div class="card">
    <div class="card-header">
        Report
    </div>
    @if (session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <div class="card-body">
        <form action="{{route('judge.filter')}}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-1 col-md-1 col-sm-1 col-form-label bold">From: </label>
                        <div class="col-lg-2.5 col-md-2 col-sm-2">
                            <input name="dateFrom" type="date" class="form-control" id="dateFrom">
                        </div>
                        <label class="col-lg-1 col-md-1 col-sm-1 col-form-label bold">To: </label>
                        <div class="col-lg-2.5 col-md-2 col-sm-2">
                            <input name="dateTo" type="date" class="form-control" id="dateTo">
                        </div>
                        <label class="col-lg-1 col-md-1 col-sm-1 col-form-label bold"><strong>Type:</strong></label>
                        <div class="col-lg-3">
                            <select name="type[]" multiple>
                                <option value="Murder">Murder</option>
                                <option value="Treason">Treason</option>
                                <option value="Desertion">Desertion</option>
                                <option value="Failure to report for duty">Failure to report for duty</option>
                                <option value="Insubordination">Insubordination</option>
                                <option value="Disobeying orders">Disobeying orders</option>
                                <option value="Disrespect of superiors">Disrespect of superiors</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-1 col-sm-1 col-form-button bold">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </form><br>
        <div>
            <a class="nav-link scrollto " href="{{ route('judge.report.pdf',[$appointed,$closedByAttorney,$bail,$warrant,$catch,$detained,$undetained,$lastYear,$newCase,$totalCase,$verdicted,$transfered]) }}">
                <button class="btn btn-primary"> Create a pdf for Report</button>
            </a>
        </div>
        <table class="table table-bordered table-striped">
            <br>
            <thead>
                <tr class="bold">
                    <th scope="col">Case Id</th>
                    <th scope="col">plaintiff</th>
                    <th scope="col">Defendant</th>
                    <th scope="col">Case Type</th>
                    <th scope="col">Appointment Reason</th>
                    <th scope="col">Appointment Date </th>
                    <th scope="col">Case Filed on</th>
                    <th scope="col">Case Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData['cases'] as $case)
                <tr>
                    <?php
                    if ($case->status == 'status2.5') {
                        $status = "Not Appointed Yet";
                    } elseif ($case->status == 'status3') {
                        $status = "on trial";
                    } elseif ($case->status == 'status3.5') {
                        $status = "verdicted";
                    } else {
                        $status = "Unknown";
                    }

                    ?>
                    <th scope="col">{{ $case->Case_Id }}</th>
                    <th scope="col">{{ $case->Plaintiff()->get()->value('FirstName') }}</th>
                    <th scope="col">{{ $case->Defendants()->get()->value('FirstName') }}</th>
                    <th scope="col">{{ $case->Case_Type }}</th>
                    <td scope="col">{{ $case->Cause_of_Action }}</td>
                    <td scope="col">{{ $case->appointmentDate}}</td>
                    <td scope="col">{{ $case->assignedDate}}</td>
                    <td scope="col">{{ $status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection