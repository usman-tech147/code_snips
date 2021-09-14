<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeSnippetsController extends Controller
{
    public function singleImage(Request $request)
    {
        return view('files.single_image');
    }

    public function submitForm(Request $request)
    {
        return response()->json(['data' => $request->all()]);
    }
}
