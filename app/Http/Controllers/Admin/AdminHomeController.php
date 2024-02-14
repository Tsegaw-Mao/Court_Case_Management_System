<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
public function index(){
    $viewData=[];
    $viewData["title"]="Admin page document_manegement store";
    return view('admin.home.index')->with("viewData",$viewData);

}
}
