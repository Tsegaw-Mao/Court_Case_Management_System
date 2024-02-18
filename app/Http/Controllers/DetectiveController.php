<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Detective;
use App\Models\LegalCase;
use Illuminate\Http\Request;
use App\Models\User;

class DetectiveController extends Controller
{
    //
    public function index($id)
    {
        $viewData = [];
        $detective = Detective::where("UserId", $id)->first();
        $viewData["cases"] = $detective->Cases()->get();
        return view("detective.index")->with('viewData', $viewData);
    }
    public function allcase($uid){
        $viewData['cases'] = LegalCase::where('status','status1')->get();
        return view('admin.home')->with('viewData', $viewData);

    }
    public function mycases($uid){
        $user = User::find($uid);
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
    public function assign()
    {
        $viewData = [];
        $viewData["cases"] = LegalCase::all();
        return view("attorney.assign")->with('viewData', $viewData);

    }
}
