@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-0 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('supervisor.dashboard') }}">
                            <span class="fas fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('supervisor.lecturer.index') }}">Lecturer List</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a
                            href="{{ route('supervisor.lecturer.show', $lecturer->id) }}">{{ $lecturer->detailable->nip }}</a>
                    </li>
                </ol>
            </nav>
            <h2 class="h4">
                <span class="fa fa-user mr-2"></span>Lecturer Profile
            </h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12 col-xl-8">
            @include('supervisor.user.lecturer.card.info')
        </div>
        <div class="col-12 col-xl-4">
            <div class="row">
                <div class="col-12 mb-4">
                    @include('supervisor.user.lecturer.card.detail')
                </div>
            </div>
        </div>
    </div>
    @include('supervisor.user.lecturer.table.project')
@endsection

