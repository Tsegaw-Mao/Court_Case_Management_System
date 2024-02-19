@extends('master')

@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">
    <div class="card-header"> List of Judges
    </div>
    <div class="card-body">


        <table class="table table-bordered table-striped">
            <br>
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judge Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Judge User ID</th>
                    <th scope="col">Cases Currently on Hand</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $count = 0;
                ?>
                @foreach ($viewData["judges"] as $judge)
                <?php
                $count++;
                ?>
                <a href="{{route('judge.case',['jid'=>$judge->UserId,'cid'=>$viewData['case']])}}">
                    <tr>
                        <td>{{ $count }}</td>
                        <td>
                            <a href="{{route('judge.case',['jid'=>$judge->UserId,'cid'=>$viewData['case']])}}">
                            {{ $judge->FirstName }}
                            </a>
                        </td>
                        <td>{{ $judge->email }}</td>
                        <td>{{ $judge->UserId }}</td>

                    </tr>
                </a>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
    </div>
</div>
@endsection
