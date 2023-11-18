<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    public function searchApplicant(Request $request)
    {
        $nic = $request->input('nic');

        $applications = DB::select("SELECT
        applications_header.id,
        applicants.nic,
        applicants.full_name,
        documents.path,
        documents.submitted_date,
        documents.original_name,
        documents.id
        FROM
        applications_header
        INNER JOIN applications_details ON applications_header.id = applications_details.applications_header_id
        INNER JOIN applicants ON applicants.id = applications_details.applicant_id
        INNER JOIN documents ON applications_header.id = documents.applications_header_id
        WHERE
        applicants.nic = '$nic'");

        return response()->json(['applications' => $applications]);
    }
}