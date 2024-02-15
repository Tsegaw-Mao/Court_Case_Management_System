<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Defendant;
use App\Models\LegalCase;
use Illuminate\Http\Request;
use App\Models\Plaintiff;

class AdminController extends Controller
{
    public function index()
    {
        $viewData =  [];
        $viewData['title'] = "Cases - CCMS";
        $viewData["cases"] = LegalCase::all();
        return view("admin.home")->with("viewData", $viewData);
    }
    public function index2(){
        $viewData = [];
        $viewData = null;
        return view("admin.index")->with("viewData",$viewData);
    }
    public function create(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Case Create - CCMS";
        return view("admin.createCase")->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        $case = new LegalCase();

        $plaintiff = Plaintiff::where("UserId", $request->input("pid"))->first();
        $defendant = Defendant::where("UserId", $request->input("did"))->first();

        $case->Case_Id = $request->input('id');
        $case->Case_Title = $request->input('title');
        $case->Case_Type = $request->input('type');
        $case->Case_Details = $request->input('details');

        $plaintiff->Case()->save( $case );
        $defendant->Cases()->attach([$request->input('id')]);
        return redirect()->back()->with('status', 'Case Created Successfully');

    }

    public function show($id)
    {
        $viewData =  [];
        $case = LegalCase::where("Case_Id", $id)->first();
        $viewData['title'] = $case->Case_Title . " - CCMS";
        $viewData["case"] = $case;
        return view("admin.show")->with("viewData", $viewData);
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = "Edit Case";
        $viewData["case"] = LegalCase::where('Case_Id', $id)->first();
        return view('admin.edit')->with('viewData', $viewData);


    }
    public function update(Request $request, $id)
    {
        $case = LegalCase::where('Case_Id', $id)->first();
        $plaintiff = $case->Plaintiff()->first();
        $case->Case_Id = $request->input('id');
        $case->Case_Title = $request->input('title');
        $case->Case_Type = $request->input('type');
        $case->Case_Details = $request->input('details');
        $case->save();
        // return view('master');
        // return redirect()->route('admin.home')->with('status', 'Case Edited Sussesfully');
       return redirect()->back()->with('status', 'Case Edited Sussesfully');
    }
    public function delete($id)
    {
        $case = LegalCase::where("Case_Id", $id)->first();
        $case->delete();
         return redirect()->route("admin.home")->with("status", "Case Deleted");

    }
    public function readSoftDeletes($id)
    {
        $case = LegalCase::withTrashed()->where("Case_Id", $id)->first();
        echo "Case ID : " . $case->Case_Id;
        echo "<br>";
        echo "Case Title : " . $case->Case_Type;
        echo "<br>";
        echo "Case Type : " . $case->Case_Type;
        echo "<br>";
        echo "Case Detail : " . $case->Case_Details;
        echo "<br>";
        echo "Cause of Action : " . $case->Cause_of_Action;
        echo "<br>";
        echo "<br>";
    }
    public function readAllSoftDeletes()
    {
        $viewData = [];
        $viewData['title'] = "Deleted Cases - CCMS";
        $viewData['cases'] = LegalCase::withTrashed()->whereNotNull("deleted_at")->get();
        return view('admin.restore')->with('viewData', $viewData);
    }
    public function restoreSoftDeletes($id)
    {
        $case = LegalCase::withTrashed()->where("Case_Id", $id)->restore();
        return redirect()->back()->with("success", "Case Restored");
    }
    public function restoreAllSoftDeletes()
    {
        $cases = LegalCase::withTrashed()->whereNotNull("deleted_at")->get();
        foreach ($cases as $case) {
            $case->restore();
        }
        return redirect()->back()->with("success", "All Deletes Restored");
    }
    public function permanentDelete($id)
    {
        LegalCase::onlyTrashed()->where("Case_Id", $id)->forceDelete();
        return redirect()->back()->with("success", "Case Deleted Permanently");
    }
}
