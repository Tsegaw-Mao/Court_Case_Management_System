@extends('master')
@section('title',$viewData['title'])
@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">

    <div class="card-header"> Edit Case</div>
    <div class="card-body">

        <form method="POST" action="{{ route('admin.update', ['id' => $viewData['case']->Case_Id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">ID:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <!-- <input name="id" value="{{ $viewData['case']->Case_Id }}" type="text" class="form-control" placeholder="case Id is not modified" required ><br> -->
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">{{$viewData['case']->Case_Id}}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Case Title</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" name="title" value="{{ $viewData['case']->Case_Title }}" class="form-control"  placeholder="Enter Case title" required ><br>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Case type</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" name="type" value=" {{ $viewData['case']->Case_Type }} " class="form-control"  placeholder="Enter case type" required ><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Case Details</label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" name="details" value="{{ $viewData['case']->Case_Details }} " class="form-control"  placeholder="Enter case details" required ><br>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection
