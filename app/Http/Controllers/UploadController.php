<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
   
    public function store(Request $request)
    {
        // Handle file upload logic here
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
}
