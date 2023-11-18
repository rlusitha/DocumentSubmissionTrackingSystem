<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;

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
        $originalNameOfDocs = [];

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
            $originalNameOfDocs[] = $uploadedFile->getClientOriginalName();
            $path = Storage::putFileAs('docs', $uploadedFile, $originalName);
            $paths[] = $path;
        }

        //Concatenate paths into a comma-separated string
        $pathsString = implode(',', $paths);

        $originalNameOfDocsString = implode(',', $originalNameOfDocs);

        //Inserting to Documents table
        $document_id = DB::table('documents')->insertGetId([
            'applications_header_id' => $application_header_id,
            'submitted_date' => date('Y-m-d'),
            'original_name' => $originalNameOfDocsString,
            'path' => $pathsString,
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

        return back();
    }

    public function stramDocument(Request $request)
    {
        $link = $request->input('data');
        // dd(storage_path());
        // $contents = Storage::get($link);
        // return response()->Storage::download($link);
        // return response($contents)->header('Content-Type', 'application/pdf');  
        // return Pdf::loadFile(storage_path().'\app\docs\mother_pawning_clearens_letter_for_NSB.pdf')->stream();
        return "Hey";
    }
}
