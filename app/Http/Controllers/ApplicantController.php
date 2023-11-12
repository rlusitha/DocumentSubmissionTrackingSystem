<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant;
use Illuminate\Http\RedirectResponse;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("./Applicant/applicant-registration");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $applicant = new Applicant;

        $applicant->full_name = $request->full_name;
        $applicant->nic = $request->nic;
        $applicant->dob = $request->dob;
        $applicant->contact_number = $request->contact_number;

        $applicant->save();

        return redirect('/applicants');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
