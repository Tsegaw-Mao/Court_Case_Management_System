<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Defendant;
use App\Models\User;
use App\Models\LegalCase;
use Illuminate\Support\Facades\Auth;

class DefendantController extends Controller
{
    //
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Defendants List";

        $viewData["cases"] = Defendant::all();
        return view("admin.indexx")->with("viewData", $viewData);
    }

    public function allcase($uid)
    {
        $viewData = [];
        $viewData['title'] = 'Cases under Investigation';
        $viewData['cases'] = LegalCase::where('status', 'status3')->get();
        return view('admin.home')->with('viewData', $viewData);

    }
    public function mycases()
    {
        $viewData = [];
        $user = Auth::user();
        $viewData['title'] = 'Cases Under ' . $user->name;
        $defendant = Defendant::where('UserId', $user->UserId)->first();
        $viewData['cases'] = $defendant->Cases()->get();
        return view('admin.home')->with('viewData', $viewData);
    }
    public function show($id)
    {

        $viewData = [];
        $viewData['defendant'] = Defendant::where('UserId', $id)->get();
        return view('defendant.show')->with('viewData', $viewData);

    }
    public function create()
    {

        return view('defendant.create');

    }
    public function store(Request $request)
    {

        $defendant = new Defendant();
        $defendant->UserID = $request->input('id');
        $defendant->FirstName = $request->input('firstName');
        $defendant->LastName = $request->input('lastName');
        $defendant->email = $request->input('email');
        $defendant->address = $request->input('address');
        if (User::where('UserId', $defendant->UserID)->first() != null) {
            $user = User::where('UserId', $defendant->UserID)->first();
            $user->assignRole('defendant');

            $defendant->save();

            return redirect()->back()->with('status', 'defendant Created Successfully');
        } else {
            return redirect()->back()->with('status', 'No User by this User ID');
        }


    }
    public function delete($id)
    {
        $defendant = Defendant::where('UserId', $id)->first();
        $defendant->delete();
        // return redirect()->back()->with('success','Deleted');
        return redirect()->back()->with('status', 'Successfully Deleted');
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData['defendant'] = Defendant::where('UserId', $id)->first();
        return view('defendant.edit')->with('viewData', $viewData);

    }
    public function update(Request $request, $id)
    {
        $defendant = Defendant::where('Case_Id', $id)->first();
        $defendant->UserID = $request->input('id');
        $defendant->FirstName = $request->input('firstName');
        $defendant->LastName = $request->input('lastName');
        $defendant->email = $request->input('email');
        $defendant->address = $request->input('address');
        $defendant->save();
        // return redirect()->route('defendant.index')->with('success','');

        return redirect()->route('defendant.index')->with('status', 'defendant updated');

    }
}
