@extends('master')

@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">
    <div class="card-header"> {{ __('List of Detectives')}}
    </div>
    <div class="card-body">


        <table class="table table-bordered table-striped">
            <br>
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Detective Name')}}</th>
            <th scope="col">{{ __('Email')}}</th>
                    <th scope="col">{{ __('Detective User ID')}}</th>
                    <th scope="col">{{ __('Cases Currently on Hand')}}</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $count = 0;
                ?>
                @foreach ($viewData["detectives"] as $detective)
                <?php
                $count++;
                ?>

                <tr>
                    <td>{{ $count }}</td>
                    <td>
                        <a href="{{route('detective.case',['did'=>$detective->UserId,'cid'=>$viewData['case']])}}">
                            {{ $detective->FirstName }}
                        </a>
                    </td>
                    <td>{{ $detective->email }}</td>
                    <td>{{ $detective->UserId }}</td>
                    <td>{{count($detective->Cases()->where('status','status1')->get())}}</td>

                </tr>

                @endforeach
            </tbody>
        </table>
        <div>
        </div>
    </div>
</div>
@endsection
