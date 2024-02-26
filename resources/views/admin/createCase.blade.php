@extends('master')
@section('title',$viewData['title'])
@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">
    <div class="card-header bold"> {{ __('Create Case')}}</div>
    <div class="card-body">

        <form action="{{ route('admin.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">{{ __('Plaintiff UserId:')}}</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="pid" value="{{ old('UserId') }}" type="text" class="form-control" placeholder="{{ __('Enter Plaintiff Id')}}" required><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">{{ __('Defendant UserId')}}:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="did" value="{{ old('UserId') }}" type="text" class="form-control" placeholder="{{ __('Enter Defendant Id')}}" required><br>
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
                            <input type="text" name="type" value="{{ old('type') }}" class="form-control" placeholder="{{ __('Enter Case type')}}" required><br>

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
