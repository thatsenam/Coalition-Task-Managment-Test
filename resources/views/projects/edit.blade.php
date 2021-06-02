@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($project->name) ? $project->name : 'Project' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('projects.project.index') }}" class="btn btn-primary mr-2" title="Show All Project">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Project
                </a>

                <a href="{{ route('projects.project.create') }}" class="btn btn-success" title="Create New Project">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Project
                </a>

            </div>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('projects.project.update', $project->id) }}" id="edit_project_form" name="edit_project_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('projects.form', [
                                        'project' => $project,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
