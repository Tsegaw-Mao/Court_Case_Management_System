<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $legal_cases = LegalCase::all();
        foreach ($legal_cases as $legal_case) {

            echo "Case ID : " . $legal_case->Case_Id;
            echo "<br>";
            echo "Case Title : " . $legal_case->Case_Title;
            echo "<br>";
            echo "Case Type : " . $legal_case->Case_Type;
            echo "<br>";
            echo "Case Detail : " . $legal_case->Case_Details;
            echo "<br>";
            echo "Cause of Action : " . $legal_case->Cause_of_Action;
            echo "<br>";
            echo "<br>";
        }
    }
    public function create($id, $title, $type, $detail)
    {

        $case = new LegalCase();
        $case->Case_Id = $id;
        $case->Case_Title = $title;
        $case->Case_Type = $type;
        $case->Case_Details = $detail;
        $case->save();
        redirect()->route('admin.home');
    }
    public function store(Request $request)
    {
        $case = new LegalCase();

        $case->Case_Id = $request->id;
        $case->Case_Title = $request->title;
        $case->Case_Type = $request->type;
        $case->Case_Details = $request->details;

        $case->save();
        return redirect()->back()->with("success", "Case Created Successfully");
    }

    public function show($id)
    {
        $case = LegalCase::where("Case_id", $id)->first();
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
    public function edit($id, $title, $type, $detail)
    {
        $case = LegalCase::where("Case_Id", $id)->first();
        $case->Case_Title = $title;
        $case->Case_Type = $type;
        $case->Case_Details = $detail;
        $case->save();
        route("admin.home");
    }
    public function delete($id)
    {
        $case = LegalCase::where("Case_Id", $id)->first();
        $case->delete();
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
        $cases = LegalCase::withTrashed()->where("deleted_at",!(Null));
        foreach ($cases as $case) {

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
    }
    public function restoreSoftDeletes($id)
    {
        $case = LegalCase::withTrashed()->where("Case_Id", $id)->restore();
        
    }
}
