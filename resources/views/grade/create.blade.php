@extends('layouts.app', ['page' => __('Class create'), 'pageSlug' => 'class'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Profile') }}</h5>
                </div>
                <form method="post" action="{{ route('class.store') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf

                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Class Name') }}</label>
                                <input type="text" name="class" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Class Name') }}" required>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group">
                                <label>{{ _('Course') }}</label>
                                <select name="course" class="form-control">
                                    @foreach ($ListCourse as $course)
                                        <option style="color: #9A9A9A;" value="{{ $course->course_id }}">
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
