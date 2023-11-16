<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function registerApplication(Request $request)
    {
        $applicantName = $request->input('applicant_name');
        $nic = $request->input('applicant_nic');
        $applicationDate = $request->input('application_date');
        // $disease_id = $request->input('disease_type');
        $disease_id = 5;
        $uploadedFiles = $request->file('documents');
        $paths = [];

        //Inserting to applicants table
        $applicant_id = DB::table('applicants')->insertGetId([
            'full_name' => $applicantName,
            'nic' => $nic,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //Inserting to applications_header table
        $application_header_id = DB::table('applications_header')->insertGetId([
            'application_date' => $applicationDate,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //Inserting to header details table and documents table
        foreach ($uploadedFiles as $uploadedFile) {

            //Inserting to documents table
            $originalName = $uploadedFile->getClientOriginalName();
            $path = $uploadedFile->storeAs('uploads', $originalName, 'public');
            $paths[] = $path;

            $document_id = DB::table('documents')->insertGetId([
                'applications_header_id' => $application_header_id,
                'submitted_date' => date('Y-m-d'),
                'path' => $path,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            //Inserting to applications_details table
            $application_detail_id = DB::table('applications_details')->insertGetId([
                'applications_header_id' => $application_header_id,
                'document_id' => $document_id,
                'applicant_id' => $applicant_id,
                'disease_id' => $disease_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return back();
    }
}
