<?php

namespace App\Http\Controllers;


use App\Models\mymotivz\Education;
use App\Models\mymotivz\Industry;
use App\Models\mymotivz\user_job;
use Illuminate\Http\Request;


class MymotivzController extends Controller
{
    public function index()
    {
        return view('mymotivz.index');
    }

    public function jobDetails()
    {
        return view('mymotivz.job_details');
    }

    public function storeJobDetails(Request $request)
    {
        session()->put('job_title',$request->job_title);
        session()->put('service',$request->job_type);
        session()->put('location',$request->location);
        session()->put('job_description',$request->job_description);
        session()->put('job_opening',$request->num_hires);
        session()->put('applied_before',$request->applied_before);
        return redirect()->route('job.qualification');

    }

    public function jobQualification()
    {
        $industries = Industry::all();
        $educations = Education::all();
        return view('mymotivz.job_qualification', compact('industries', 'educations'));
    }

    public function storeJobQualification(Request $request)
    {
        $job = user_job::find(session()->get('job_id'));
        $job->industry_id = $request->industry;
        $job->education_id = $request->education;
        $job->required_experience = $request->required_experience;
        $job->required_skills = $request->required_skills;
        $job->certifications = $request->required_certification;
        $job->save();

        return redirect()->route('job.benefits');
    }

    public function jobBenefits()
    {
        return view('mymotivz.job_benefits');
    }

    public function storeJobBenefits(Request $request)
    {

    }

    public function jobReview()
    {
        return view('mymotivz.review_job');
    }
}
