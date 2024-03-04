<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Judge;
use App\Models\Lawyer;
use App\Models\LegalCase;
use App\Models\User;
use Exception;
use App\Models\Attorney;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

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
    public function allcase($uid)
    {
        $viewData = [];
        $viewData['title'] = 'Cases under Trial';
        $viewData['cases'] = LegalCase::where('status', 'status3')->orWhere('status', 'status3.0')->orWhere('status', 'status2.5')->get();
        return view('admin.home')->with('viewData', $viewData);
    }
    public function mycases()
    {
        $viewData = [];
        $user = Auth::user();
        $viewData['title'] = 'Cases Under ' . $user->name;
        $judge = Judge::where('UserId', $user->UserId)->first();
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
        return redirect()->route('judge.allcase', ['uid' => Auth::user()->UserId])->with('status', 'Case Assigned to ' . $judge->FirstName);
    }
    public function assign($cid)
    {
        $viewData = [];
        $viewData["case"] = $cid;
        $viewData["judges"] = Judge::all();
        return view("judge.assign")->with('viewData', $viewData);
    }
    public function statusup($cid)
    {
        $case = LegalCase::where('Case_Id', $cid)->first();
        $laststatus = substr($case->status, 6);
        if ($case->status == 'status2.5') {
            $case->assignedDate = date('Y-m-d');
        }
        if ($case->status == 'status3') {
            $case->verdictedDate = date('Y-m-d');
        }
        $laststatus = $laststatus + 0.5;
        $case->status = 'status' . $laststatus;
        $case->save();
        return redirect()->route('judge.allcase', ['uid' => Auth::user()->UserId])->with('status', 'case Closed');
    }
    public function statusdown($cid)
    {
        $case = LegalCase::where('Case_Id', $cid)->first();
        $laststatus = substr($case->status, 6);
        $laststatus = $laststatus - 0.5;
        $case->status = 'status' . $laststatus;
        $case->save();
        return redirect()->route('judge.allcase', ['uid' => Auth::user()->UserId])->with('status', 'case redirected back to attorney');
    }
    public function casedate($cid)
    {
        $case = LegalCase::where('Case_Id', $cid)->first();
        return view('judge.edit')->with('case', $case);
    }
    public function addDate($cid,  Request $request)
    {
        $case = LegalCase::where('Case_Id', $cid)->first();
        $oldDate = $case->appointmentDate;
        $today = date('Y-m-d');
        $case->appointmentDate = $request->input('date');
        $case->Cause_of_Action = $request->input('causeOfAction');
        if(isset($request->Decision)){
            
            if($request->Decision == "warrant"){
                $case->warrant	= true;
            }
            elseif($request->Decision == "bail"){
                $case->bail = true;
            }elseif($request->Decision == "deny_bail"){
                $case->bail = false;
            }elseif($request->Decision == "catch"){
                $case->catch = true;
            }elseif($request->Decision == "detain"){
                $case->detain = true;
            }elseif($request->Decision == "undetain"){
                $case->detain = false;
            }
        }
        $defendant = $case->Defendants()->first();
        $lawyeri = Lawyer::find($defendant->lawyer_UserId);
        $lawyer = $lawyeri->email;
        $attorney = Attorney::find($case->attorney_UserId)->email;
        if($today < $oldDate){
            $subject = 'Appointment Date Change';
            $body = 'Case '.$case->Case_Title.' Appointment Chaged From '.$oldDate.' To '.$case->appointmentDate.' Reason of appointment is '.$case->Cause_of_Action;
        }elseif($today >= $oldDate){
            $subject = 'Trial Appointment';
            $body = 'Case '.$case->Case_Title.' has Trial date set on '.$case->appointmentDate.' for '.$case->Cause_of_Action;
        }
        try {
            Mail::to([$lawyer, $attorney])->send(new MailNotify($subject, $body));
            $status = 'informed parties';
        } catch (Exception $th) {
         $status = 'something went wrong with mail';
        }
        $case->save();
        $case->refresh();
        return redirect()->route('judge.allcase', ['uid' => Auth::user()->UserId])->with('status', 'case appointed for date' . $case->AppointmentDate);


    }
    public function report(Request $request)
    {

        $viewData = [];
        $query = LegalCase::query();
        $viewData['cases'] = $query->get();
        $viewData['dateFrom'] = 2023-03-01;
        return view('judge.report')->with('viewData', $viewData);
    }

    public function leaveReport($appointed,$closedByAttorney,$bail,$warrant,$catch,$detained,$undetained,$lastYear,$newCase,$totalCase,$verdicted,$transfered)
    {

        $data = [];
        $data['appointed'] = $appointed;
        $data['closedByAttorney'] = $closedByAttorney;
        $data['bail'] = $bail;
        $data['warrant'] = $warrant;
        $data['catch'] = $catch;
        $data['detained'] = $detained;
        $data['undetained'] = $undetained;
        $data['lastYear'] = $lastYear;
        $data['newCase'] = $newCase;
        $data['totalCase'] = $totalCase;
        $data['verdicted'] = $verdicted;
        $data['transfered'] = $transfered ;
        return view('judge.reportPdf')->with('data',$data);
    }
    public function filter(Request $request)
    {

        $viewData = [];
        $viewData['dateFrom'] = 2023-03-01;
        $query = LegalCase::query();
        $now = date('Y-m-d');
        $begin = 2020 - 02 - 28;
        if (isset($request->dateFrom) && $request->dateFrom != null && isset($request->dateTo) && $request->dateTo != null) {
            $query->whereBetween('assignedDate', [$request->dateFrom, $request->dateTo])->orWhereBetween('verdictedDate', [$request->dateFrom, $request->dateTo]);
        } elseif (isset($request->dateTo) && $request->dateTo != null) {
            $query->whereBetween('assignedDate', [$begin, $request->dateTo])->orWhereBetween('verdictedDate', [$begin, $request->dateTo]);
        } elseif (isset($request->dateFrom) && $request->dateFrom != null) {
            $query->whereBetween('assignedDate', [$request->dateFrom, $now])->orWhereBetween('verdictedDate', [$request->dateTo, $now]);
        }
        if (isset($request->type) && $request->type != null) {
            $query->whereIn('Case_Type', $request->type);
        }
        $viewData['cases'] = $query->get();
        $past = count($viewData['cases']->where('assignedDate', '>', $request->dateFrom));
        $new = count($viewData['cases']->where('assignedDate', '<', $request->dateFrom));
        $next = count($viewData['cases']->where('assignedDate', '<', $request->dateFrom));
        $viewData['past'] = $past;
        $viewData['new'] = $new;
        $viewData['next'] = $next;
        $viewData['dateFrom'] = $request->dateFrom;
        $viewData['dateTo'] = $request->dateTo;
        return view('judge.report')->with('viewData', $viewData);
    }
    public function verdict(Request $request, $cid){
        $case = LegalCase::where('Case_Id', $cid)->first();
        $case->verdict = $request->verdict;
        $case->verdictedDate = date('Y-m-d');
        $this->statusup($cid);
        return redirect()->back();
    }
    public function assignLawyer($cid, Request $request){
        $case = LegalCase::where('Case_Id', $cid)->first();
        $defendant = $case->Defendants()->first();
        $lawyer = Lawyer::find($request->lawyer);
        $lawyer->Defendants()->save($defendant);
        $lawyer->refresh();
        $this->statusup($cid);
        $subject = 'YOU HAVE BEEN ASSIGNED TO NEW CASE';
        $body = 'YOU ARE ASSIGNED TO DEFENDANT '.$defendant->FirstName.' ON CASE '.$case->Case_Title;
        try {
            Mail::to($lawyer->email)->send(new MailNotify($subject, $body));
            $status = 'mail sent to assigned lawyer';
        } catch (Exception $th) {
         $status = 'something went wrong with mail';
        }
        return redirect()->back()->with('status',$status);

    }
}
