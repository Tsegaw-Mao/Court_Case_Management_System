@extends('master')

@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">
    <div class="card-header"> List of Attornies
    </div>
    <div class="card-body">


        <table class="table table-bordered table-striped">
            <br>
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Attorney Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Attorney User ID</th>
                    <th scope="col">Cases Currently on Hand</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $count = 0;
                ?>
                @foreach ($viewData["attornies"] as $attorney)
                <?php
                $count++;
                ?>
                <a href="{{route('attorney.case',['aid'=>$attorney->UserId,'cid'=>$viewData['case']])}}">
                    <tr>
                        <td>{{ $count }}</td>
                        <td>
                            <a href="{{route('attorney.case',['aid'=>$attorney->UserId,'cid'=>$viewData['case']])}}">
                            {{ $attorney->FirstName }}
                            </a>
                        </td>
                        <td>{{ $attorney->email }}</td>
                        <td>{{ $attorney->UserId }}</td>
                        <td>{{count($attorney->Cases()->where('status','status2')->get())}}</td>
                </a>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
    </div>
</div>
@endsection
