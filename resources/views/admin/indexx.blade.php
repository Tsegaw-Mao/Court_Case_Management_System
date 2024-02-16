@extends('master')



@section('body')
<div class="card">

    <table class="table table-bordered table-striped">
        <br>
        <thead>

            <tr class="bold">
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Rank</th>
                <th scope="col">Department</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
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
                <td>{{ $case->name}}</td>
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