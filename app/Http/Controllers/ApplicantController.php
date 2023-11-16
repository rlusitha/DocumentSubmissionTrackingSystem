<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function searchApplicant(Request $request)
    {
        $nic = $request->input('nic');

        return response()->json(['nic' => $nic]);
    }
}