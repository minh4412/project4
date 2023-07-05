@extends('layouts.app', ['page' => __('Book create'), 'pageSlug' => 'book'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Create Book') }}</h5>
                </div>
                <form method="post" action="{{ route('book.store') }}" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                            @csrf

                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Book Name') }}</label>
                                <input type="text" name="name_book" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name Book') }}" required>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group">
                                <label>{{ _('Category') }}</label>
                                <select name="category" class="form-control">
                                    @foreach ($listcategory as $cate)
                                        <option style="color: #9A9A9A;" value="{{ $cate->category_id }}">
                                            {{ $cate->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>{{ _('Subject') }}</label>
                                <select name="subject" class="form-control">
                                    <option style="color: #9A9A9A;" value=""></option>
                                    @foreach ($listsubject as $subject)
                                        <option style="color: #9A9A9A;" value="{{ $subject->subject_id }}">
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>{{ _('Major') }}</label>
                                <select name="major" class="form-control">
                                    @foreach ($listmajor as $major)
                                        <option style="color: #9A9A9A;" value="{{ $major->major_id }}">
                                            {{ $major->major_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Price') }}</label>
                                <input type="text" name="price" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Price') }}" required>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Quantity') }}</label>
                                <input type="text" name="quantity" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Quantity') }}" required>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Image') }}</label>
                                <input type="file" name="book-image" class="form-control file-input" required>
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
