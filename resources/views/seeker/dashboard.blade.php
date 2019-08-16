@extends('layouts.seeker.main')

@section('content')
<style>
    .bg_apply{
        background: aquamarine;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="alert alert-success col-md-8 offset-md-2" style="display:none"></div>
        <div class="alert alert-danger col-md-8 offset-md-2" style="display:none"></div>
        @forelse($jobs as $job)
        <div class="col-md-4 mb-4">
            @php
            $switch = empty($job->applied)?1:0;
            @endphp
            <div class="card {{$switch?'':'bg_apply'}}" id="card{{$job->id}}">
                <div class="card-header">{{$job->title}}</div>

                <div class="card-body">
                {{$job->description}}
                </div>

                <button type="button" class="btn" onclick="{{$switch?'applyjob('.$job->id.')':''}}" >{{$switch?'Apply':'Applied'}}</button>

            </div>
        </div>
        @empty
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">No Jobs Posted</div>

                <div class="card-body">
                    Seemes pretty empty out here
                </div>
            </div>
        </div>
        @endforelse
        {{$jobs->links()}}
    </div>
    <input type="hidden" id="apply_url" value="{{route('seeker.apply','')}}">
</div>
@endsection
