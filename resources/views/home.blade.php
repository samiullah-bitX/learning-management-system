@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <h2 class="mb-1">Explore available courses</h2>
                            <p class="text-muted mb-0">Browse the latest learning content and continue your journey.</p>
                        </div>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary mt-3 mt-md-0">
                            <i class="fas fa-book-open mr-2"></i> View all courses
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse($courses as $course)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0 overflow-hidden">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img class="img-circle mr-3" src="{{ $course->teacher->avatar ?? asset('img/default-avatar.png') }}" alt="Instructor avatar" width="48" height="48">
                            <div>
                                <h5 class="mb-1">{{ $course->name }}</h5>
                                <p class="text-muted mb-0">{{ $course->teacher->name }}</p>
                            </div>
                        </div>

                        <p class="text-muted mb-4">
                            {{ Str::limit($course->description ?? 'A curated course designed to help learners grow with practical content.', 120) }}
                        </p>

                        <div class="row text-center">
                            <div class="col-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header mb-1">{{ $course->students()->count() }}</h5>
                                    <span class="description-text small text-muted">Students</span>
                                </div>
                            </div>
                            <div class="col-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header mb-1">{{ $course->lessons->count() }}</h5>
                                    <span class="description-text small text-muted">Lessons</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="description-block">
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="far fa-eye mr-1"></i> Open
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center py-5">
                        <h4 class="mb-2">No courses are available yet</h4>
                        <p class="text-muted mb-0">New learning content will appear here soon.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
