<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Judge;
use App\Models\LegalCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JudgeController extends Controller
{
    //
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Judge List";
        $viewData["cases"] = Judge::all();
        return view("admin.indexx")->with("viewData", $viewData);

    }
    public function allcase($uid){
        $viewData = [];
        $viewData['title'] = 'Cases under Trial';
        $viewData['cases'] = LegalCase::where('status','status3')->orWhere('status','status3.0')->orWhere('status','status2.5')->get();
        return view('admin.home')->with('viewData', $viewData);

    }
    public function mycases(){
        $viewData = [];
        $user = Auth::user();
        $viewData['title'] = 'Cases Under ' . $user->name;
        $judge = Judge::where('UserId',$user->UserId)->first();
        $viewData['cases'] = $judge->Cases()->get();
        return view('admin.home')->with('viewData', $viewData);
    }
    public function show($id)
    {

        $viewData = [];
        $viewData['judge'] = Judge::where('UserId', $id)->get();
        return view('judge.show')->with('viewData', $viewData);

    }
    public function create()
    {

        return view('judge.create');

    }
    public function store(Request $request)
    {

        $judge = new Judge();
        $judge->UserID = $request->input('id');
        $judge->FirstName = $request->input('firstName');
        $judge->LastName = $request->input('lastName');
        $judge->email = $request->input('email');
        $judge->address = $request->input('address');

        $judge->save();
        return redirect()->back()->with('status', "Judge Created Successfully");

    }
    public function delete($id)
    {
        $judge = Judge::where('UserId', $id)->first();
        $judge->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');

    }
    public function edit($id)
    {
        $viewData = [];
        $viewData['judge'] = Judge::where('UserId', $id)->first();
        return view('judge.edit')->with('viewData', $viewData);

    }
    public function update(Request $request, $id)
    {
        $judge = Judge::where('Case_Id', $id)->first();
        $judge->UserID = $request->input('id');
        $judge->FirstName = $request->input('firstName');
        $judge->LastName = $request->input('lastName');
        $judge->email = $request->input('email');
        $judge->address = $request->input('address');
        if (User::where('UserId', $judge->UserID)->first() != null) {
            $user = User::where('UserId', $judge->UserID)->first();
            $user->assignRole('judge');
            $judge->save();
            return redirect()->back()->with("status", "Judge Created Successfully");
        } else {
            return redirect()->back()->with("status", "No User by this User ID");
        }

    }
    public function assignCase($jid, $cid)
    {
        $judge = Judge::where('UserId', $jid)->first();
        $case = LegalCase::where('Case_Id', $cid)->first();
        $judge->Cases()->save($case);
        $judge->save();
        return redirect()->route('judge.allcase',['uid'=>Auth::user()->UserId])->with('status','Case Assigned to '.$judge->FirstName);
    }
    public function assign($cid)
    {
        $viewData = [];
        $viewData["case"] = $cid;
        $viewData["judges"] = Judge::all();
        return view("judge.assign")->with('viewData', $viewData);
    }
    public function statusup($cid){
        $case = LegalCase::where('Case_Id',$cid)->first();
        $laststatus = substr($case->status,6);
        $laststatus = $laststatus + 0.5;
        $case->status = 'status' . $laststatus;
        $case->save();
        return redirect()->route('judge.allcase',['uid'=>Auth::user()->UserId])->with('status','case Closed');
    }
    public function statusdown($cid){
        $case = LegalCase::where('Case_Id',$cid)->first();
        $laststatus = substr($case->status,6);
        $laststatus = $laststatus - 0.5;
        $case->status = 'status' . $laststatus;
        $case->save();
        return redirect()->route('judge.allcase',['uid'=>Auth::user()->UserId])->with('status','case redirected back to attorney');
    }
    public function casedate($cid){
        $case = LegalCase::where('Case_Id',$cid)->first();
        return view('judge.edit')->with('case',$case);
    }
    public function addDate($cid ,  Request $request){
        $case = LegalCase::where('Case_Id',$cid)->first();
        $case->AppointmentDate = $request->input('date');
        $case->Cause_of_Action = $request->input('causeOfAction');
        $case->save();
        return redirect()->route('judge.allcase',['uid'=>Auth::user()->UserId])->with('status','case appointed for date'. $case->AppointmentDate);
    }

}
