@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card" style="width: 50%;margin: 0 auto">

        <div class="card-header">

            <h5 class="my-1 float-left">Tasks</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('tasks.task.create') }}" class="btn btn-success" title="Create New Task">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Task
                </a>
            </div>

        </div>

        @if(count($tasks) == 0)
            <div class="card-body text-center">
                <h4>No Tasks Available.</h4>
            </div>
        @else
            <div class="card-body">

                <ul id="sortable" class="list-group">
                    @foreach($tasks as $task)
                        <li class="list-group-item" id="{{ $task->id }}">
                            <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                            <div class="row">
                                <div class="col">
                                    <label for="input{{$loop->index}}">
                                        <input {{ $task->is_completed?'checked':'' }} id="input{{$loop->index}}"
                                               data="{{$task->id}}"
                                               type="checkbox" class="task-checkbox">
                                        <span>{{ $task->name }} {{ $task->priority }}</span>
                                        <br>
                                        <small>{{ optional($task->project)->name }}</small>
                                        <br>
                                        <small><i>{{ $task->description }}</i></small>
                                    </label>
                                </div>
                                <div class="col">
                                    <form method="POST" action="{!! route('tasks.task.destroy', $task->id) !!}"
                                          accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-sm float-right " role="group">
                                            <a href="{{ route('tasks.task.show', $task->id ) }}" title="Show Task">
                                                <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('tasks.task.edit', $task->id ) }}" class="mx-4"
                                               title="Edit Task">
                                                <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                            </a>

                                            <button type="submit" style="border: none;background: transparent"
                                                    title="Delete Task"
                                                    onclick="return confirm(&quot;Click Ok to delete Task.&quot;)">
                                                <i class=" fas  fa-trash text-danger" aria-hidden="true"></i>
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </li>
                    @endforeach
                </ul>

            </div>




        @endif

    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"
        integrity="sha512-5x7t0fTAVo9dpfbp3WtE2N6bfipUwk7siViWncdDoSz2KwOqVC1N9fDxEOzk0vTThOua/mglfF8NO7uVDLRC8Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('js')

    <script>
        $(function () {
            let element = document.getElementById('sortable');
            new Sortable(element, {
                animation: 150,
                ghostClass: 'blue-background-class',
                onSort: function (e) {
                    console.log(e)

                    let tasks = [];

                    $('li').each(function (index) {
                        let task_id = $(this).attr('id')
                        tasks.push(task_id)
                    })

                    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
                    fetch("{{ route('tasks.task.sort') }}", {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-Token": csrfToken
                        },
                        method: "post",
                        credentials: "same-origin",
                        body: JSON.stringify({
                            sort: tasks,
                        })
                    })
                },

            });
            $('.task-checkbox').on('change', async function (e) {
                let task_id = $(this).attr('data');
                await fetch('{{url('/tasks')}}/' + task_id + '/toggle');
            })


        });


    </script>


@endsection


