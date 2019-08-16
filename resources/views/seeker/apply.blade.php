@extends('layouts.seeker.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Jobs Applied</div>

                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Posted at</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($applies as $apply)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$apply->title}}</td>
                        <td>
                            {{format_timestamp($apply->created_at)}}
                        </td>
                        </tr>
                    @empty
                        <tr>
                        <th scope="row" colspan="4">You have not applied to any job</th>
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
