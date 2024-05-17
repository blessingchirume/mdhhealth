<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class UploadController extends Controller
{
   
    public function store(Episode $episode, Request $request)
    {
        // Handle file upload logic here
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/'.$episode->episode_code), $fileName);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function show(Episode $episode)
    {
        
    }
}
