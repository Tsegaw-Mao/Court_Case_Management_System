<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plaintiff;
use App\Models\LegalCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlaintiffController extends Controller
{
    //
    public function index(){
        $viewData = [];
        $viewData['title'] = "Plaintiff List";
        $viewData["cases"] = Plaintiff::all();
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
        $plaintiff = Plaintiff::where('UserId',$user->UserId)->first();
        $viewData['cases'] = $plaintiff->Cases()->get();
        return view('admin.home')->with('viewData', $viewData);
    }


    public function show($id){

        $viewData = [];
        $viewData['plaintiff'] = Plaintiff::where('UserId', $id)->get();
        return view('plaintiff.show')->with ('viewData',$viewData);

    }
    public function create(){

        return view('plaintiff.create');

    }
    public function store(Request $request){

        $plaintiff = new Plaintiff();
        $plaintiff->UserID = $request->input('id');
        $plaintiff->FirstName = $request->input('firstName');
        $plaintiff->LastName = $request->input('lastName');
        $plaintiff->email = $request->input('email');
        $plaintiff->address = $request->input('address');
        if(User::where('UserId',$plaintiff->UserID)->first() != null){
        $user = User::where('UserId',$plaintiff->UserID)->first() ;
        $user->assignRole('plaintiff');
        $plaintiff->save();
        return redirect()->back()->with('status', 'plaintiff Created Successfully');
        }else{
            return redirect()->back()->with('status','No User By this User Id');
        }

    }
    public function delete($id){
        $plaintiff = Plaintiff::where('UserId',$id)->first();
        return redirect()->back()->with('status','Deleted Successfully');

    }
    public function edit($id){
        $viewData = [];
        $viewData["cases"] = Plaintiff::all();
        return view("admin.indexx")->with("viewData", $viewData);

    }
    public function update(Request $request, $id){
        $plaintiff = Plaintiff::where('Case_Id',$id)->first();
        $plaintiff->UserID = $request->input('id');
        $plaintiff->FirstName = $request->input('firstName');
        $plaintiff->LastName = $request->input('lastName');
        $plaintiff->email = $request->input('email');
        $plaintiff->address = $request->input('address');
        $plaintiff->save();
        return redirect()->route('plaintiff.index')->with('status','updated Successfully');

    }
}
