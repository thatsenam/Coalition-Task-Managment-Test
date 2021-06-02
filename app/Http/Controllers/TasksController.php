<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{


    public function index()
    {
        $tasks = Task::with('project')->orderBy('priority', 'desc')->get();

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        $projects = Project::pluck('name', 'id')->all();

        return view('tasks.create', compact('projects'));
    }


    public function store(Request $request)
    {


        $data = $this->getData($request, true);

        Task::create($data);

        return redirect()->route('tasks.task.index')
            ->with('success_message', 'Task was successfully added.');

    }


    public function show($id)
    {
        $task = Task::with('project')->findOrFail($id);

        return view('tasks.show', compact('task'));
    }


    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $projects = Project::pluck('name', 'id')->all();

        return view('tasks.edit', compact('task', 'projects'));
    }


    public function update($id, Request $request)
    {


        $data = $this->getData($request);

        $task = Task::findOrFail($id);
        $task->update($data);

        return redirect()->route('tasks.task.index')
            ->with('success_message', 'Task was successfully updated.');

    }


    public function destroy($id)
    {

        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.task.index')
            ->with('success_message', 'Task was successfully deleted.');

    }


    protected function getData(Request $request, $onStore = false)
    {
        $rules = [
            'project_id' => 'nullable',
            'name' => 'required|string',
            'description' => 'string|nullable',
            'is_completed' => 'boolean|nullable',
            'priority' => 'nullable',
        ];

        $data = $request->validate($rules);

        $data['is_completed'] = $request->has('is_completed');
        if ($onStore) {
            $first_priority = Task::query()->max('priority') + 1;
            $data['priority'] = $first_priority;
        }
        return $data;
    }

    public function toggleStatus($id)
    {
        $task = Task::findOrFail($id);
        $task->is_completed = !$task->is_completed;
        $task->save();
        return ['message' => 'Task Status Changed Successfully.'];
    }

    public function sort(Request $request)
    {
        $task_ids = $request->sort ?? [];
        foreach ($task_ids as $index => $task_id) {
            $task = Task::find($task_id);
            $task->priority = count($task_ids) - $index;
            $task->save();
        }
        dd($request->all());
    }

}
