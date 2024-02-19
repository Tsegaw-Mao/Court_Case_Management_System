<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LegalCase;
use Illuminate\Support\Facades\Auth;

class LawyerController extends Controller
{
    //
    public function index(){
        $viewData = [];
        $viewData['title'] = "Lawyer List";
        $viewData["cases"] = Lawyer::all();
        return view("admin.indexx")->with("viewData", $viewData);

    }
    public function allcase($uid)
    {
        $viewData = [];
        $viewData['title'] = 'Cases under Investigation';
        $viewData['cases'] = LegalCase::where('status', 'status3')->get();
        return view('admin.home')->with('viewData', $viewData);

    }
    public function mycases(){
        $viewData = [];
        $user = Auth::user();
        $viewData['title'] = 'Cases Under ' . $user->name;
        $lawyer = Lawyer::where('UserId',$user->UserId)->first();
        $viewData['cases'] = $lawyer->Cases()->get();
        return view('admin.home')->with('viewData', $viewData);
    }
    public function show($id){

        $viewData = [];
        $viewData['lawyer'] = Lawyer::where('UserId', $id)->get();
        return view('lawyer.show')->with ('viewData',$viewData);

    }
    public function create(){

        return view('lawyer.create');

    }
    public function store(Request $request){

        $lawyer = new Lawyer();
        $lawyer->UserID = $request->input('id');
        $lawyer->FirstName = $request->input('firstName');
        $lawyer->LastName = $request->input('lastName');
        $lawyer->email = $request->input('email');
        $lawyer->address = $request->input('address');
        if (User::where('UserId', $lawyer->UserID)->first() != null) {
            $user = User::where('UserId', $lawyer->UserID)->first();
            $user->assignRole('lawyer');
            $lawyer->save();
            return redirect()->back()->with("status", "Lawyer Created Successfully");
        } else {
            return redirect()->back()->with("status", "No User by this User ID");
        }

    }
    public function delete($id){
        $lawyer = Lawyer::where('UserId',$id)->first();
        $lawyer->delete();
        return redirect()->back()->with('status','Deleted sucessfully');

    }
    public function edit($id){
        $viewData = [];
        $viewData['lawyer'] = Lawyer::where('UserId',$id)->first();
        return view('lawyer.edit')->with('viewData',$viewData);

    }
    public function update(Request $request, $id){
        $lawyer = Lawyer::where('Case_Id',$id)->first();
        $lawyer->UserID = $request->input('id');
        $lawyer->FirstName = $request->input('firstName');
        $lawyer->LastName = $request->input('lastName');
        $lawyer->email = $request->input('email');
        $lawyer->address = $request->input('address');
        $lawyer->save();
        return redirect()->route('lawyer.index')->with('status','updated Successfully');

    }
}
