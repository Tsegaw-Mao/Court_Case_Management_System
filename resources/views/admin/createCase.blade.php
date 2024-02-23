@extends('master')
@section('title',$viewData['title'])
@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">
    <div class="card-header bold"> Create Case</div>
    <div class="card-body">

        <form action="{{ route('admin.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">Plaintiff UserId:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="pid" value="{{ old('UserId') }}" type="text" class="form-control" placeholder="Enter Plaintiff Id" required><br>
                            @if ($errors->has('pid'))
                            <span class="text-danger">{{ $errors->first('pid') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">Defendant UserId:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="did" value="{{ old('UserId') }}" type="text" class="form-control" placeholder="Enter Defendant Id" required><br>
                            @if ($errors->has('did'))
                            <span class="text-danger">{{ $errors->first('did') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">Case Title</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter Case title" required><br>
                            @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">Case type</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" name="type" value="{{ old('type') }}" class="form-control" placeholder="Enter Case type" required><br>
                            @if ($errors->has('type'))
                            <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label bold">Case Details</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <textarea name="details" value="{{ old('details') }}" class="form-control" placeholder="Enter Case details" required rows='4'></textarea><br>
                            @if ($errors->has('details'))
                            <span class="text-danger">{{ $errors->first('details') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bold">Submit</button>
        </form>
    </div>
</div>
@endsection