@extends('layouts.app')

@section('content')

<div class="card" style="width: 50%;margin: 0 auto">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($task->name) ? $task->name : 'Task' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('tasks.task.destroy', $task->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('tasks.task.index') }}" class="btn btn-primary mr-2" title="Show All Task">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Task
                    </a>

                    <a href="{{ route('tasks.task.create') }}" class="btn btn-success mr-2" title="Create New Task">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Task
                    </a>

                    <a href="{{ route('tasks.task.edit', $task->id ) }}" class="btn btn-primary mr-2" title="Edit Task">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Task
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Task" onclick="return confirm(&quot;Click Ok to delete Task.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Task
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Project</dt>
            <dd>{{ optional($task->project)->name }}</dd>
            <dt>Name</dt>
            <dd>{{ $task->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $task->description }}</dd>
            <dt>Is Completed</dt>
            <dd>{{ ($task->is_completed) ? 'Yes' : 'No' }}</dd>
            <dt>Priority</dt>
            <dd>{{ $task->priority }}</dd>

        </dl>

    </div>
</div>

@endsection
