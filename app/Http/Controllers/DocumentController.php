<?php
namespace App\Http\Controllers;
use Illuminate\Support\Http\Request;
class DocumentController extends Controller
{

    public function uploadpage()
    {

        return view ('document');
    }
}
