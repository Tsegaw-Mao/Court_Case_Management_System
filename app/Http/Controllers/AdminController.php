<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $legal_cases = LegalCase::all();
        foreach ($legal_cases as $legal_case)
        {
            
            echo "Case ID : " .$legal_case->Case_Id;
            echo "<br>";
            echo "Case Title : " .$legal_case->Case_Type;
            echo "<br>";
            echo "Case Type : " .$legal_case->Case_Type;
            echo "<br>";
            echo "Case Detail : " .$legal_case->Case_Details;
            echo "<br>";
            echo "Cause of Action : " .$legal_case->Cause_of_Action;
            echo "<br>";
            echo "<br>";

        }
   
        

    }
    public function create(){
        
        return view("admin.createCase");
    }
    public function store(Request $request){
        $case = new LegalCase();

        $case->Case_Id = $request->id;
        $case->Case_Title = $request->title;
        $case->Case_Type = $request->type;
        $case->Case_Details = $request->details;

        $case->save();
        return redirect()->back()->with("success","Case Created Successfully");

       
    }
  
}
