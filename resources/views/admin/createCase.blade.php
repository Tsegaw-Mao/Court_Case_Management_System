@extends('master')
@section('title',$viewData['title'])
@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">
    <div class="card-header"> Create Case</div>
    <div class="card-body">

        <form action="{{ route('admin.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Plaintiff UserId:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="pid" value="{{ old('UserId') }}" type="text" class="form-control" placeholder="Enter Plaintiff Id" required><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Defendant UserId:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="did" value="{{ old('UserId') }}" type="text" class="form-control" placeholder="Enter Defendant Id" required><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">ID:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="id" value="{{ old('Case_Id') }}" type="text" class="form-control" placeholder="Enter Case Id" required><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Case Title</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter Case title" required><br>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Case type</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" name="type" value="{{ old('type') }}" class="form-control" placeholder="Enter Case type" required><br>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Case Details</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">

                            <input type="text" name="details" value="{{ old('details') }}" class="form-control" placeholder="Enter Case details" required><br>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
