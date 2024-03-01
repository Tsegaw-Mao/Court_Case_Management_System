@extends('master')
@section('body')
    <div class="card">
        <div class="card-header bold"> Judge Registration</div>
        <div class="card-body">
            <form action="{{ route('judge.adddate',['cid'=>$case->Case_Id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-0 col-sm-1 col-form-label bold">Appointment Date:</label>
                            <div class="col-lg-4 col-md-4 col-sm-10">
                                <input name="date" value="{{ $case->appointmentDate }}" type="date" class="form-control" id="date"
                                    placeholder="please enter Appointment Date" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-0 col-sm-1 col-form-label bold">Reason of Appointment:</label>
                            <div class="col-lg-4 col-md-4 col-sm-10">
                                <input name="causeOfAction" value="{{ $case->Cause_of_Action }}" type="text" class="form-control"
                                    placeholder="Enter your Reason of Appointment" required>
                            </div>
                        </div>
                    </div>
                </div>
                @if($case->Cause_of_Action != null)
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-0 col-sm-1 col-form-label bold">Trial Dicision</label>
                            <div class="col-lg-4 col-md-4 col-sm-10">
                            <select name="Decision" multiple>
                                <option value="warrant">warrant</option>
                                <option value="bail">bail</option>
                                <option value="deny_bail">deny_bail</option>
                                <option value="catch">catch</option>
                                <option value="detain">detain</option>
                                <option value="undetain">undetain</option>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <button center type="submit" class="btn btn-primary bold">Submit</button>
            </form>
        </div>

    </div>
@endsection
