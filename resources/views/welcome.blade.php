@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row align-items-center justify-content-center text-center font-weight-bolder h4">
                            <div class="col-3">
                                <div class="card p-4">
                                    <a href="{{ route('tasks.task.index') }}">Tasks</a>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card p-4">
                                    <a href="{{ route('projects.project.index') }}">Projects</a>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
