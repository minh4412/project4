@extends('layouts.app', ['page' => __('Course edit'), 'pageSlug' => 'course'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Course') }}</h5>
                </div>
                <form method="post" action="{{ route('course.update', $course->course_id ) }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')
                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Course Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name Course') }}" value="{{ $course->name }}" required>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group">
                                <label>{{ _('Content') }}</label>
                                <input type="text" name="content" class="form-control" placeholder="{{ _('Content') }}" value="{{ $course->content }}">
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
