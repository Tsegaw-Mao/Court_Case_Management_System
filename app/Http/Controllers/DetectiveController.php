<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Detective;
use App\Models\LegalCase;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DetectiveController extends Controller
{
    //
    public function index()
    {
        $viewData = [];
        $viewData["cases"] = Detective::all();
        $viewData['title'] = "Detectives List";
        return view("admin.indexx")->with("viewData", $viewData);
    }
    public function allcase($uid){
        $viewData = [];
        $viewData['title'] = 'Cases under Investigation';
        $viewData['cases'] = LegalCase::where('status','status1')->orWhere('status','status1.0')->get();
        return view('admin.home')->with('viewData', $viewData);

    }
    public function mycases(){
        $viewData = [];
        $user = Auth::user();
        $viewData['title'] = 'Cases Under ' . $user->name;
        $detective = Detective::where('UserId',$user->UserId)->first();
        $viewData['cases'] = $detective->Cases()->get();
        return view('admin.home')->with('viewData', $viewData);
    }
    public function show($id)
    {

        $viewData = [];
        $viewData['detective'] = Detective::where('UserId', $id)->get();
        return view('detective.show')->with('viewData', $viewData);

    }
    public function create()
    {

        return view('detective.create');

    }
    public function store(Request $request)
    {

        $detective = new Detective();
        $detective->UserID = $request->input('id');
        $detective->FirstName = $request->input('firstName');
        $detective->LastName = $request->input('lastName');
        $detective->email = $request->input('email');
        $detective->address = $request->input('address');

        if (User::where('UserId', $detective->UserID)->first() != null) {
            $user = User::where('UserId', $detective->UserID)->first();
            $user->assignRole('detective');
            $detective->save();
            return redirect()->back()->with("status", "Detective Created Successfully");
        } else {
            return redirect()->back()->with("status", "No User by this User ID");
        }

    }
    public function delete($id)
    {
        $detective = Detective::where('UserId', $id)->first();
        $detective->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');

    }
    public function edit($id)
    {
        $viewData = [];
        $viewData['detective'] = Detective::where('UserId', $id)->first();
        return view('detective.edit')->with('viewData', $viewData);

    }
    public function update(Request $request, $id)
    {
        $detective = Detective::where('Case_Id', $id)->first();
        $detective->UserID = $request->input('id');
        $detective->FirstName = $request->input('firstName');
        $detective->LastName = $request->input('lastName');
        $detective->email = $request->input('email');
        $detective->address = $request->input('address');
        $detective->save();
        return redirect()->route('detective.index')->with('status', 'updated sucessfully');

    }
    public function assignCase($did, $cid)
    {
        $detective = Detective::where('UserId', $did)->first();
        $case = LegalCase::where('Case_Id', $cid)->first();
        $detective->Cases()->save($case);
        $detective->save();
        return redirect()->back();
    }
    public function assign($cid)
    {
        $viewData = [];
        $viewData["case"] = $cid;
        $viewData["detectives"] = Detective::all();
        return view("detective.assign")->with('viewData', $viewData);

    }
    public function statusup($cid){
        $case = LegalCase::where('Case_Id',$cid)->first();
        $laststatus = substr($case->status,6);
        $laststatus = $laststatus * 1;
        $laststatus = $laststatus + 0.5;
        $case->status = 'status' . $laststatus;
        $case->save();
        return redirect()->route('detective.allcase',['uid'=>Auth::user()->UserId])->with('status','case transfed to attorney for approval');
    }

}
