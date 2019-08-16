@extends('layouts.employer.main')

@section('content')

@php
$status = empty($postjob) ? 1 : 0 ;
$title = $status ? 'Post Job' : 'Update Post Job';
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __($title) }}</div>

                <div class="card-body">
                    <form id="post_job" method="{{ $status? 'POST' : 'PUT' }}" action="{{ $status? route('employer.postJob') : route('employer.updatePostJob', $postjob->id) }}">

                        <input type="hidden" name="id" value="{{ $status? '' : $postjob->id }}">

                        <div class="form-group row ">
                            <div class="alert alert-success col-md-8 offset-md-2" style="display:none"></div>
                            <div class="alert alert-danger col-md-8 offset-md-2" style="display:none"></div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control " name="title" value="{{ $status? '' : $postjob->title }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Job Description') }}</label>

                            <div class="col-md-8">
                                <textarea rows="3" id="description" class="form-control " name="description" required>{{ $status? '' : $postjob->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Post Job') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
