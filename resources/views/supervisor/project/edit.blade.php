@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('supervisor.dashboard') }}"><span
                                    class="fas fa-home"></span></a></li>
                        <li class="breadcrumb-item">Projects</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('supervisor.project.index') }}">Project List</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('supervisor.project.show', $project->id) }}">{{$project->id}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{ route('supervisor.project.edit', $project->id) }}">Edit
                                Project</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('supervisor.project.update', $project->id) }}" method="POST"
                enctype="multipart/form-data">
                <div class="card card-body bg-white border-light shadow-sm mb-4">
                    <h2 class="h5 mb-4">Edit Project</h2>
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="project_name"><span class="fa fa-clipboard-list"></span> Project
                                    Name</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Project Name"
                                    value="{{ $project->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category"><span class="fa fa-tag"></span> Category</label>
                            <select class="form-select w-100 mb-0" id="category" name="category">
                                <option value="0" @if ($project->category == 0) selected
                                    @endif>Event</option>
                                <option value="1" @if ($project->category == 1) selected
                                    @endif>Education</option>
                                <option value="2" @if ($project->category == 2) selected
                                    @endif>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div>
                                <label for="description"><span class="fa fa-align-justify"></span> Project
                                    Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description"
                                    required>{{ $project->description }}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="deadline"><span class="fa fa-hourglass-end"></span> Deadline</label>
                            <input class="form-control" id="deadline" name="deadline" type="date" placeholder="Deadline"
                                min="{{ $currentperiod->start }}" max="{{ $currentperiod->end }}"
                                value="{{ $project->deadline }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="duration"><span class="fa fa-clock"></span> Period</label>
                            <input type="hidden" name="period" value="{{ $currentperiod->id }}">
                            @if ($project->period->term == 0)
                                <input class="form-control" type="text"
                                    value="{{ date('Y', strtotime($currentperiod->start)) }}-{{ date('Y', strtotime($currentperiod->start)) + 1 }} / Odd"
                                    placeholder="Period" disabled>
                            @else
                                <input class="form-control" type="text"
                                    value="{{ idate('Y', strtotime($currentperiod->end)) - 1 }}-{{ date('Y', strtotime($currentperiod->end)) }} / Even"
                                    placeholder="Period" disabled>
                            @endif
                        </div>
                    </div>
                    <h2 class="h5 mb-4">Upload Attachments</h2>
                    <div class="d-xl-flex align-items-center">
                        <div class="file-field">
                            <div class="d-flex justify-content-xl-center ml-xl-3">
                                <div class="d-flex">

                                    <span class="icon icon-md">
                                        <span class="fas fa-paperclip mr-3"></span>
                                    </span>
                                    <input type="file" name="attachments[]" id="attachments" multiple>
                                    <div class="d-md-block text-left">

                                        <div class="font-weight-normal text-dark mb-1" id="pp-name">Choose File</div>
                                        <div class="text-gray small">Max size of 800K</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                    @foreach($project->attachments as $attachment)
                        <p class="text-info"><span class="fa fa-paperclip"></span>
                            <a href="/attachments/project/{{ $attachment->name }}">
                                {{ $attachment->name }}
                            </a>
                        </p>
                    @endforeach
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Edit Project</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
