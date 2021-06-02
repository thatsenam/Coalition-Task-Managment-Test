@extends('layouts.app')

@section('content')

    <div class="card" style="width: 50%;margin: 0 auto">

        <div class="card-header">

            <h5 class="my-1 float-left">{{ !empty($task->name) ? $task->name : 'Task' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('tasks.task.index') }}" class="btn btn-primary mr-2" title="Show All Task">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Task
                </a>

                <a href="{{ route('tasks.task.create') }}" class="btn btn-success" title="Create New Task">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Task
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

            <form method="POST" action="{{ route('tasks.task.update', $task->id) }}" id="edit_task_form"
                  name="edit_task_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('tasks.form', ['task' => $task])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
