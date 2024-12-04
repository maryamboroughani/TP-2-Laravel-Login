@extends('layouts.app')

@section('title', 'Welcome')

@section('content')


<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">
                        @lang('text_welcome')
                    </h1>
                </div>
                <div class="card-body">
                    @lang('text_welcome_paragraph')
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('etudiants.index') }}" class="btn btn-primary">@lang('text_go_students')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
