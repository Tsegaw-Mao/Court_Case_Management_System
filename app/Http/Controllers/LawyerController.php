<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    //
    public function index(){
        $viewData = [];
        $viewData["lawyers"] = Lawyer::all();
        return view("lawyer.index")->with ("viewData",$viewData);

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

        $lawyer->save();
        return redirect()->back()->with('status', 'lawyer Created Successfully');

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
