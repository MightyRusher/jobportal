<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostJob;
use App\Apply;
use Auth;

class SeekerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:ROLE_SEEKER');
    }

    public function dashboard()
    {
        $jobs = PostJob::LeftJoin('applies','applies.job_id','post_jobs.id')
        ->select('post_jobs.id','post_jobs.title','post_jobs.description','applies.id as applied')
        ->orderBy('post_jobs.id','desc')
        ->simplePaginate(9);
        return view('seeker.dashboard',compact('jobs'));
    }

    public function applyList()
    {
        $applies = Apply::LeftJoin('post_jobs','post_jobs.id','applies.job_id')
        ->where('applies.seeker_id',Auth::user()->id)
        ->select('applies.created_at','post_jobs.title')
        ->get();

        return view('seeker.apply',compact('applies'));
    }

    public function apply($jobid){
        $postjob = PostJob::where('id', $jobid)->first();

        $flight = Apply::firstOrCreate(
            [
                'seeker_id' => Auth::user()->id ,
                'job_id' => $jobid
            ],
            [
                'seeker_id' => Auth::user()->id ,
                'job_id' => $jobid,
                'employer_id' => $postjob->employer_id,
            ]
        );

        return response()
                ->json([
                    'status' => 'applied',
                    'message' => 'You Have Applied For Job Titled '.$postjob->title.' Successfully'
                ], 200);
    }
}
