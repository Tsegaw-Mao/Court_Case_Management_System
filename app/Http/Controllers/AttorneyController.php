<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attorney;
use Illuminate\Http\Request;

class AttorneyController extends Controller
{
    //
    public function index(){
        $viewData = [] ;
        $viewData["attornies"] = Attorney::all();
        return view("attorney.index")->with('viewData', $viewData);
    }
    public function show($id){

        $viewData = [];
        $viewData['attorney'] = Attorney::where('UserId', $id)->get();
        return view('attorney.show')->with ('viewData',$viewData);
    
    }
    public function create(){

        return view('attorney.create');

    }
    public function store(Request $request){

        $attorney = new Attorney();
        $attorney->UserID = $request->input('id');
        $attorney->FirstName = $request->input('firstName');
        $attorney->LastName = $request->input('lastName');
        $attorney->email = $request->input('email');
        $attorney->address = $request->input('address');

        $attorney->save();
        return redirect()->back()->with("success", "Case Created Successfully");

    }
    public function delete($id){
        $attorney = Attorney::where('UserId',$id)->first();
        $attorney->delete();
        return redirect()->back()->with('success','Deleted');

    }
    public function edit($id){
        $viewData = [];
        $viewData['attorney'] = Attorney::where('UserId',$id)->first();
        return view('attorney.edit')->with('viewData',$viewData);

    }
    public function update(Request $request, $id){
        $attorney = Attorney::where('Case_Id',$id)->first();
        $attorney->UserID = $request->input('id');
        $attorney->FirstName = $request->input('firstName');
        $attorney->LastName = $request->input('lastName');
        $attorney->email = $request->input('email');
        $attorney->address = $request->input('address');
        $attorney->save();
        return redirect()->route('attorney.index')->with('success','');

    }
}
