@extends('layouts.app')

@section('content')

    <div class="card" style="width: 50%;margin: 0 auto">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Task</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('tasks.task.index') }}" class="btn btn-primary" title="Show All Task">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Task
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('tasks.task.store') }}" accept-charset="UTF-8" id="create_task_form" name="create_task_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('tasks.form', [
                                        'task' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


