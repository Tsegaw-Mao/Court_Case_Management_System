@extends('master')



@section('body')
<div class="card">
    <!-- <div class="card-header">Super Admin Panel - Home Page</div>
    <div class="card-body">
        Welcom to Super Admin Panel Home Page, Use the Side Menu Bar to Navigate Between different opptions
    </div>

-->

    <table class="table table-bordered table-striped">
        <br>
        <thead>

            <tr class="bold">
                <th scope="col">#</th>
                <th scope="col">{{ __('Case ID')}}</th>
                <th scope="col">{{ __('Plaintiff')}}</th>
                <th scope="col">{{ __('Defendant')}}</th>
                <th scope="col">{{ __('Case Title')}}</th>
                <th scope="col">{{ __('Case Type')}}</th>
                <th scope="col">{{ __('Case Detail')}}</th>
                <th scope="col">{{ __('Cause of Action')}}</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
