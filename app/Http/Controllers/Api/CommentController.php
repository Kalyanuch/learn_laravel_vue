<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'subject' => 'required|min:6',
            'body' => 'required|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 'error',
                'msg' => 'Error',
                'errors' => $validator->errors()
            ], 422);
        }



        return response()->json([
            'status' => 'success',
        ], 200);
    }
}
