@extends('master')
@section('body')
<div class="card">
    <div class="card-header">{{$viewData['title']}}</div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="bold">
                <th scope="col">#</th>
                <th scope="col">{{ __('User ID')}}</th>
                <th scope="col">{{ __('User Name')}}</th>
                <th scope="col">{{ __('Rank')}}</th>
                <th scope="col">{{ __('Department')}}</th>
                <th scope="col">{{ __('Email')}}</th>
                <th scope="col">{{ __('Contact')}}</th>
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
                <td>{{ $case->UserId }}</td>
                @if($case->name == null){
                    <td>{{$case->FirstName . $case->LastName}}</td>
                }@else{
                    <td>{{ $case->name}}</td>
                }@endif
                <td>{{ $case->Rank }}</td>
                <td>{{ $case->Department }}</td>
                <td>{{ $case->email }}</td>
                <td>{{ $case->Contact }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
