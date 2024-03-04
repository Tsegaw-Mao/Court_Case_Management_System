@extends('master')
@section('title',$viewData['title'])
@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">
    <?php
    $plaintiffs = \App\Models\Plaintiff::all();
    $defendants = \App\Models\Defendant::all();
    ?>
    <div class="card-header bold"> {{ __('Create Case')}}</div>
    <div class="card-body">

        <form action="{{ route('admin.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">{{ __('Plaintiff UserId:')}}</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="pid" list="pids" class="form-control" placeholder="{{ __('Select Plaintiff Id')}}" required><br>
                            <datalist id="pids">>
                                @foreach($plaintiffs as $plaintiff)
                                <option value="{{$plaintiff->UserId}}">{{$plaintiff->FirstName}}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">{{ __('Defendant UserId')}}:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="did" list="dids" class="form-control" placeholder="{{ __('Select Defendant Id')}}" required><br>
                            <datalist id="dids">>
                                @foreach($defendants as $defendant)
                                <option value="{{$defendant->UserId}}">{{$defendant->FirstName}}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">{{ __('Case Title')}}</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="{{ __('Enter Case title')}}" required><br>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">{{ __('Case type')}}</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="type" list='type' class="form-control" placeholder="{{ __('Select Case Type')}}" required><br>
                            <datalist id="type">
                                <option value="Murder">Murder</option>
                                <option value="Treason">Treason</option>
                                <option value="Desertion">Desertion</option>
                                <option value="Failure to report for duty">Failure to report for duty</option>
                                <option value="Insubordination">Insubordination</option>
                                <option value="Disobeying orders">Disobeying orders</option>
                                <option value="Disrespect of superiors">Disrespect of superiors</option>
                            </datalist>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">{{ __('Case Detail')}}s</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">

                            <textarea name="details" value="{{ old('details') }}" class="form-control" placeholder="{{ __('Enter Case details')}}" required rows='4'></textarea><br>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bold">{{ __('Submit')}}</button>
        </form>
    </div>
</div>
@endsection