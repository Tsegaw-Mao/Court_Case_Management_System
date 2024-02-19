<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attorney;
use App\Models\LegalCase;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AttorneyController extends Controller
{
    //
    public function index()
    {
        $viewData = [];
        $viewData["cases"] = Attorney::all();
        $viewData['title'] = "Attornies List";

        return view("admin.indexx")->with("viewData", $viewData);
    }
    public function allcase($uid)
    {
        $viewData = [];
        $viewData['title'] = 'Cases under Investigation';
        $viewData['cases'] = LegalCase::where('status','status1.5')->orWhere('status','status2')->orWhere('status','status2.0')->get();
        return view('admin.home')->with('viewData', $viewData);

    }
    public function mycases()
    {
        $viewData = [];
        $user = Auth::user();
        $viewData['title'] = 'Cases Under ' . $user->name;
        $attorney = Attorney::where('UserId', $user->UserId)->first();
        $viewData['cases'] = $attorney->Cases()->get();
        return view('admin.home')->with('viewData', $viewData);
    }
    public function show($id)
    {

        $viewData = [];
        $viewData['attorney'] = Attorney::where('UserId', $id)->get();
        return view('attorney.show')->with('viewData', $viewData);

    }
    public function create()
    {

        return view('attorney.create');

    }
    public function store(Request $request)
    {

        $attorney = new Attorney();
        $attorney->UserID = $request->input('id');
        $attorney->FirstName = $request->input('firstName');
        $attorney->LastName = $request->input('lastName');
        $attorney->email = $request->input('email');
        $attorney->address = $request->input('address');

        if (User::where('UserId', $attorney->UserID)->first() != null) {
            $user = User::where('UserId', $attorney->UserID)->first();
            $user->assignRole('attorney');
            $attorney->save();

            return redirect()->back()->with('status', 'Attorney Created Successfully');
        } else {
            return redirect()->back()->with('status', 'No User by this User ID');
        }

    }
    public function delete($id)
    {
        $attorney = Attorney::where('UserId', $id)->first();
        $attorney->delete();
        //return redirect()->back()->with('success','Deleted');

        return redirect()->back()->with('status', 'Attorney deleted Successfully');

    }
    public function edit($id)
    {
        $viewData = [];
        $viewData['attorney'] = Attorney::where('UserId', $id)->first();
        return view('attorney.edit')->with('viewData', $viewData);

    }
    public function update(Request $request, $id)
    {
        $attorney = Attorney::where('Case_Id', $id)->first();
        $attorney->UserID = $request->input('id');
        $attorney->FirstName = $request->input('firstName');
        $attorney->LastName = $request->input('lastName');
        $attorney->email = $request->input('email');
        $attorney->address = $request->input('address');
        $attorney->save();
        return redirect()->route('attorney.index')->with('status', 'Attorney Created Successfully');
        //return redirect()->back()->with('status', 'Attorney Created Successfully');
    }
    public function assignCase($aid, $cid)
    {
        $attorney = Attorney::where('UserId', $aid)->first();
        $case = LegalCase::where('Case_Id', $cid)->first();
        $attorney->Cases()->save($case);
        $attorney->save();
        return redirect()->route('attorney.allcase',['uid'=>Auth::user()->UserId])->with('status','Case Assigned to '.$attorney->FirstName);
    }
    public function assign($cid)
    {
        $viewData = [];
        $viewData["case"] = $cid;
        $viewData["attornies"] = Attorney::all();
        return view("attorney.assign")->with('viewData', $viewData);

    }
    public function statusup($cid){
        $case = LegalCase::where('Case_Id',$cid)->first();
        $laststatus = substr($case->status,6);
        $laststatus = $laststatus + 0.5;
        if($laststatus == 2)
        $message = 'case Accepted';
        elseif($laststatus == 2.5)
        $message = 'case sent to judge for approval';
        $case->status = 'status' . $laststatus;
        $case->save();
        return redirect()->route('attorney.allcase',['uid'=>Auth::user()->UserId])->with('status',$message);
    }
    public function statusdown($cid){
        $case = LegalCase::where('Case_Id',$cid)->first();
        $laststatus = substr($case->status,6);
        $laststatus = $laststatus - 0.5;
        $case->status = 'status' . $laststatus;
        $case->save();
        return redirect()->route('attorney.allcase',['uid'=>Auth::user()->UserId])->with('status','case redirected back to detective');
    }
}
