<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attorney;
use App\Models\LegalCase;
use Illuminate\Http\Request;
use App\Models\User;

class AttorneyController extends Controller
{
    //
    public function index($id)
    {
        $viewData = [];
        $attorney = Attorney::where("UserId", $id)->first();
        $viewData["cases"] = $attorney->Cases()->get();
        return view("attorney.index")->with('viewData', $viewData);
    }
    public function allcase($uid){
        $viewData['cases'] = LegalCase::where('status','status2')->get();
        return view('admin.home')->with('viewData', $viewData);

    }
    public function mycases($uid){
        $user = User::find($uid);
        $attorney = Attorney::where('UserId',$user->UserId)->first();
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
        return redirect()->back();
    }
    public function assign()
    {
        $viewData = [];
        $viewData["cases"] = LegalCase::all();
        return view("attorney.assign")->with('viewData', $viewData);

    }
}
