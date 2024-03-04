@extends('master')
@section('title', $viewData['title'])
@section('body')
<div class="card">
    <div class="card-header">
        Detective Report {{ $viewData['case']->Case_Title }}
    </div>
    <div class="card-body">
        <table class="table border">
            <thead>
                <tr>
                    <td scope='col'>Number of Cases </td>
                    <td>{{ $viewData['totalCases'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope='col'>Cases Under Investigation</td>
                    <td>{{ $viewData['underInvestigation'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope='col'>Idel Cases</td>
                    <td>{{ $viewData['idelCases'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                @can('assign-detective')
                <tr>
                    <td>
                        <a href="#">
                            <button type="button" class="btn btn-primary float-right">
                                View Detail Reports
                            </button>
                        </a>
                    </td>
                </tr>
                @endcan
            </thead>
        </table>
    </div>
</div>
@endsection