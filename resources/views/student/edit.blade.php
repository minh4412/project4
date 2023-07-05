@extends('layouts.app', ['page' => __('Edit Student'), 'pageSlug' => 'student'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Student') }}</h5>
                </div>
                <form class="editstudent" method="post" action="{{ route('student.update', $student->user_id ) }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')
                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Student Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Name') }}" value="{{ $student->name }}" required>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group">
                                <label>{{ _('Class') }}</label>
                                <select name="grade" class="form-control">
                                    @foreach ($listgrade as $grade)
                                        <option style="color: #9A9A9A;" value="{{ $grade->class_id }}"
                                            @if ($grade->class_id == $student->class_id)
                                                selected 
                                            @endif
                                            >
                                            {{ $grade->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ _('Gender') }}</label>
                                <select name="gender" class="form-control">
                                    <option style="color: #9A9A9A;" value="0"
                                        @if ($student->gender == 0)
                                            selected 
                                        @endif
                                        >
                                        {{ "Male" }}
                                    </option>
                                    <option style="color: #9A9A9A;" value="1"
                                        @if ($student->gender == 1)
                                            selected 
                                        @endif
                                        >
                                        {{ "Female" }}
                                    </option>
                                </select>
                            </div>
                            
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Student Name') }}</label>
                                <input type="date" name="date" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Name') }}" value="{{ $student->date }}" required>
                                @include('alerts.feedback', ['field' => 'name'])
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
