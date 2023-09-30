<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function uploadFile(Request $request)
    {

        $validation_rules["file"][] = "required";
        $validation_rules["file"][] = "max:8098";
        $validation_rules["file"][] = "mimes:jpeg,png,jpg";


        $validator = Validator::make($request->all(), $validation_rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 401);
        }
        if ($file = $request->file('file')) {
            
            $name = $file->getClientOriginalName() . '_' . time();
            $filePath = '/uploads/product/' . $name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/product/'), $name . '.' . $file->getClientOriginalExtension());

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $filePath
            ]);
        }
    }
}
