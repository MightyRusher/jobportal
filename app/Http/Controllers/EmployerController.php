<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PostJob;
use Auth;

class EmployerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:ROLE_EMPLOYER');
    }

    public function dashboard()
    {
        return view('employer.dashboard');
    }

    public function postJobForm()
    {
        return view('employer.post_job');
    }

    public function postJob(Request $request)
    {

        $post_job = new PostJob;
        $post_job->employer_id = Auth::user()->id;
        $post_job->title = $request->title;
        $post_job->description = $request->description;
        $post_job->save();

        return response()
                ->json([
                    'status' => 'inserted',
                    'message' => 'Job Titled '.$post_job->title.' Posted Successfully'
                ], 200);

    }

    public function postJobList()
    {
        $postjobs = PostJob::where('employer_id', Auth::user()->id)->orderBy('id','desc')->simplePaginate(6);
        return view('employer.post_job_list',compact('postjobs'));
    }

    public function updatePostJobForm($postjob_id)
    {
        $postjob = PostJob::where('employer_id', Auth::user()->id)
        ->where('id', $postjob_id)
        ->select(
            'id', 
            'title', 
            'description'
            )
        ->first();

        if(empty($postjob))
        {
            return Redirect::back()->withErrors(['msg', 'The Message']);
        }

        return view('employer.post_job', compact('postjob'));
    }

    public function updatePostJob(Request $request, $postjob_id)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'title' => 'required|max:100',
            'description' => 'required|max:255',
        ]);
        
        $update = PostJob::find($postjob_id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->save();

        return response()
                ->json([
                    'status' => 'updated',
                    'message' => 'Job Titled '.$update->title.' Updated Successfully'
                ], 200);
    }

    public function postjobapplicants(Request $request)
    {
        $applicants = User::LeftJoin('applies', 'applies.seeker_id', 'users.id')
        ->where('applies.employer_id',Auth::user()->id)
        ->select('users.name', 'users.email')
        ->get();

        return view('employer.applicant', compact('applicants'));
    }
}
