@extends('layouts.app', ['pageSlug' => ''])

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-black-50">{{ __('Welcome!') }}</h1>
                        <p class="text-lead text-light">
                            {{ __('Use White Dashboard theme to create a great project.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
