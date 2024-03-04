@extends('master')
@section('title',$viewData['title'])
@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">

    <div class="card-header"> {{ __('Edit Case')}}</div>
    <div class="card-body">

        <form method="POST" action="{{ route('admin.update', ['id' => $viewData['case']->Case_Id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('ID')}}:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="id" value="{{ $viewData['case']->Case_Id }}" type="readonly" class="form-control " placeholder="{{ __('case Id is not modified')}}" required ><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Case Title')}}</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" name="title" value="{{ $viewData['case']->Case_Title }}" class="form-control"  placeholder="{{ __('Enter Case title')}}" required ><br>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Case type')}}</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        <select name="type">
                                <option value="Murder">Murder</option>
                                <option value="Treason">Treason</option>
                                <option value="Desertion">Desertion</option>
                                <option value="Failure to report for duty">Failure to report for duty</option>
                                <option value="Insubordination">Insubordination</option>
                                <option value="Disobeying orders">Disobeying orders</option>
                                <option value="Disrespect of superiors">Disrespect of superiors</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Case Details')}}</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <textarea name="details" value="{{ $viewData['case']->Case_Details }} " class="form-control"  placeholder="{{ __('Enter case details')}}" required rows='4'></textarea><br>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Edit')}}</button>
        </form>
    </div>
</div>
@endsection
