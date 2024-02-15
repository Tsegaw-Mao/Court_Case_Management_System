<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Detective;
use App\Models\LegalCase;
use Illuminate\Http\Request;

class DetectiveController extends Controller
{
    //
    public function index($id){
        $viewData = [] ;
        $detective = Detective::where("UserId", $id)->first();
        $viewData["cases"] = $detective->Cases()->get();
        return view("detective.index")->with('viewData', $viewData);
    }
    public function show($id){

        $viewData = [];
        $viewData['detective'] = Detective::where('UserId', $id)->get();
        return view('detective.show')->with ('viewData',$viewData);
    
    }
    public function create(){

        return view('detective.create');

    }
    public function store(Request $request){

        $detective = new Detective();
        $detective->UserID = $request->input('id');
        $detective->FirstName = $request->input('firstName');
        $detective->LastName = $request->input('lastName');
        $detective->email = $request->input('email');
        $detective->address = $request->input('address');

        $detective->save();
        return redirect()->back()->with("success", "Case Created Successfully");

    }
    public function delete($id){
        $detective = Detective::where('UserId',$id)->first();
        $detective->delete();
        return redirect()->back()->with('success','Deleted');

    }
    public function edit($id){
        $viewData = [];
        $viewData['detective'] = Detective::where('UserId',$id)->first();
        return view('detective.edit')->with('viewData',$viewData);

    }
    public function update(Request $request, $id){
        $detective = Detective::where('Case_Id',$id)->first();
        $detective->UserID = $request->input('id');
        $detective->FirstName = $request->input('firstName');
        $detective->LastName = $request->input('lastName');
        $detective->email = $request->input('email');
        $detective->address = $request->input('address');
        $detective->save();
        return redirect()->route('detective.index')->with('success','');

    }
    public function assignCase($did, $cid){
        $detective = Detective::where('UserId',$did)->first();
        $case = LegalCase::where('Case_Id',$cid)->first();
        $detective->Cases()->save($case);
        $detective->save();
        return redirect()->back();   
    }
}
