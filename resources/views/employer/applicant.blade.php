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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($applicants as $applicant)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$applicant->name}}</td>
                        <td>{{$applicant->email}}</td>
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
