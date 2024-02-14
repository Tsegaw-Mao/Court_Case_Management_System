<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Defendant;

class DefendantController extends Controller
{
    //
    public function index(){
        $viewData = [] ;
        $viewData["defendants"] = Defendant::all();
        return view("defendant.index")->with('viewData', $viewData);
    }
    public function show($id){

        $viewData = [];
        $viewData['defendant'] = Defendant::where('UserId', $id)->get();
        return view('defendant.show')->with ('viewData',$viewData);
    
    }
    public function create(){

        return view('defendant.create');

    }
    public function store(Request $request){

        $defendant = new Defendant();
        $defendant->UserID = $request->input('id');
        $defendant->FirstName = $request->input('firstName');
        $defendant->LastName = $request->input('lastName');
        $defendant->email = $request->input('email');
        $defendant->address = $request->input('address');

        $defendant->save();
        return redirect()->back()->with("success", "Case Created Successfully");

    }
    public function delete($id){
        $defendant = Defendant::where('UserId',$id)->first();
        $defendant->delete();
        return redirect()->back()->with('success','Deleted');

    }
    public function edit($id){
        $viewData = [];
        $viewData['defendant'] = Defendant::where('UserId',$id)->first();
        return view('defendant.edit')->with('viewData',$viewData);

    }
    public function update(Request $request, $id){
        $defendant = Defendant::where('Case_Id',$id)->first();
        $defendant->UserID = $request->input('id');
        $defendant->FirstName = $request->input('firstName');
        $defendant->LastName = $request->input('lastName');
        $defendant->email = $request->input('email');
        $defendant->address = $request->input('address');
        $defendant->save();
        return redirect()->route('defendant.index')->with('success','');

    }
}
