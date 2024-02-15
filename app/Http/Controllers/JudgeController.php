<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Judge;
use App\Models\LegalCase;
use Illuminate\Http\Request;

class JudgeController extends Controller
{
    //
    public function index($id){
        $viewData = [];
        $judge = Judge::where("UserId", $id)->first();
        $viewData["cases"] = $judge->Cases()->get();
        return view("judge.index")->with ("viewData",$viewData);

    }
    public function show($id){

        $viewData = [];
        $viewData['judge'] = Judge::where('UserId', $id)->get();
        return view('judge.show')->with ('viewData',$viewData);
    
    }
    public function create(){

        return view('judge.create');

    }
    public function store(Request $request){

        $judge = new Judge();
        $judge->UserID = $request->input('id');
        $judge->FirstName = $request->input('firstName');
        $judge->LastName = $request->input('lastName');
        $judge->email = $request->input('email');
        $judge->address = $request->input('address');

        $judge->save();
        return redirect()->back()->with("success", "Case Created Successfully");

    }
    public function delete($id){
        $judge = Judge::where('UserId',$id)->first();
        $judge->delete();
        return redirect()->back()->with('success','Deleted');

    }
    public function edit($id){
        $viewData = [];
        $viewData['judge'] = Judge::where('UserId',$id)->first();
        return view('judge.edit')->with('viewData',$viewData);

    }
    public function update(Request $request, $id){
        $judge = Judge::where('Case_Id',$id)->first();
        $judge->UserID = $request->input('id');
        $judge->FirstName = $request->input('firstName');
        $judge->LastName = $request->input('lastName');
        $judge->email = $request->input('email');
        $judge->address = $request->input('address');
        $judge->save();
        return redirect()->route('judge.index')->with('success','');

    }
    public function assignCase($jid, $cid){
        $judge = Judge::where('UserId',$jid)->first();
        $case = LegalCase::where('Case_Id',$cid)->first();
        $judge->Cases()->save($case);
        $judge->save();
        return redirect()->back();   
    }
}
