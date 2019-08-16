@extends('layouts.employer.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Job List</div>

                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Total Applies</th>
                        <th scope="col">Posted at</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($postjobs as $postjob)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$postjob->title}}</td>
                        @php
                            $applies = DB::table('applies')->where('job_id',$postjob->id)->select('id')->get();
                            $count = count($applies);
                        @endphp
                        @if($count)
                        <td>
                            <a href = "{{route('employer.postjobapplicants',$postjob->id)}}">
                                {{$count}}
                            </a>
                        </td>
                        
                        @else
                        <td>0</td>
                        @endif
                        <td>
                            {{format_timestamp($postjob->created_at)}}
                        </td>
                        <td>
                            <a href="{{route('employer.updatePostJobForm', $postjob->id)}}">
                                <span class="glyphicon glyphicon-pencil">Edit</span>
                            </a>
                            <!-- <a href="">
                                <span class="glyphicon glyphicon-trash">| Delete</span>
                            </a> -->
                        </td>
                        </tr>
                    @empty
                        <tr>
                        <th scope="row" colspan="4">No Job Posted</th>
                        </tr>
                    @endforelse
                    </tbody>
                    </table>
                    {{ empty($postjobs) ? "" : $postjobs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
