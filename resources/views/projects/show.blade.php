@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($project->name) ? $project->name : 'Project' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('projects.project.destroy', $project->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('projects.project.index') }}" class="btn btn-primary mr-2" title="Show All Project">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Project
                    </a>

                    <a href="{{ route('projects.project.create') }}" class="btn btn-success mr-2" title="Create New Project">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Project
                    </a>

                    <a href="{{ route('projects.project.edit', $project->id ) }}" class="btn btn-primary mr-2" title="Edit Project">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Project
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Project" onclick="return confirm(&quot;Click Ok to delete Project.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Project
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $project->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $project->description }}</dd>

        </dl>

    </div>
</div>

@endsection
