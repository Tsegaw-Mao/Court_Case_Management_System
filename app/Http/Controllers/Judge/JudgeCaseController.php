<?php

namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;
use Illuminate\Http\Request;

class JudgeCaseController extends Controller
{
    //
    public function index(){
        $cases = LegalCase::all();
        foreach ($cases as $case){
            echo $case->Case_Id."<br>";
            echo $case->Case_Title."<br>";
            echo $case->Case_Type."<br>";
            echo $case->Case_Details."<br>";
            echo $case->Cause_of_action."<br>";
        }

    }
}
