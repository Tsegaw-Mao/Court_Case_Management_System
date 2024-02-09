<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;

class FileUploadController extends Controller
{
    public function index()
    {
        $fileUplaods = FileUpload::get();
        return view('file-upload', ['fileUploads' => $fileUplaods]);
    }

    public function multipleUpload(Request $request)
    {
        $this->validate($request, [
            'fileuploads' => 'required',
            'fileuploads.*' => 'mimes:doc,pdf,docx,pptx,zip,jpg,png,jpeg'
        ]);

        $files = $request->file('fileuploads');
        foreach($files as $file){
            $fileUpload = new FileUpload;
            $fileUpload->filename = $file->getClientOriginalName();
            $fileUpload->filepath = $file->store('fileuploads');
            $fileUpload->discription = $request->discription;
            $fileUpload->type= $file->getClientOriginalExtension();
            $fileUpload->save();
        }

        return redirect()->route('fileupload.index')->with('success','Files uploaded successfully!');
    }

    public function create()
    {

        return view('create');
    }
}
