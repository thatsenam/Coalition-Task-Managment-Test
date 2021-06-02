<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::view('/', 'welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| Project Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'projects'], function () {
    Route::get('/', [ProjectsController::class, 'index'])->name('projects.project.index');
    Route::get('/create', [ProjectsController::class, 'create'])->name('projects.project.create');
    Route::get('/show/{project}', [ProjectsController::class, 'show'])->name('projects.project.show')->where('id', '[0-9]+');
    Route::get('/{project}/edit', [ProjectsController::class, 'edit'])->name('projects.project.edit')->where('id', '[0-9]+');
    Route::post('/', [ProjectsController::class, 'store'])->name('projects.project.store');
    Route::put('project/{project}', [ProjectsController::class, 'update'])->name('projects.project.update')->where('id', '[0-9]+');
    Route::delete('/project/{project}', [ProjectsController::class, 'destroy'])->name('projects.project.destroy')->where('id', '[0-9]+');
});


/*
|--------------------------------------------------------------------------
| Task Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'tasks'], function () {

    Route::get('/', [TasksController::class, 'index'])->name('tasks.task.index');
    Route::get('/create', [TasksController::class, 'create'])->name('tasks.task.create');
    Route::get('/show/{task}', [TasksController::class, 'show'])->name('tasks.task.show')->where('id', '[0-9]+');
    Route::get('/{task}/edit', [TasksController::class, 'edit'])->name('tasks.task.edit')->where('id', '[0-9]+');
    Route::get('/{task}/toggle', [TasksController::class, 'toggleStatus'])->name('tasks.task.toggle')->where('id', '[0-9]+');
    Route::post('/', [TasksController::class, 'store'])->name('tasks.task.store');
    Route::post('/sort', [TasksController::class, 'sort'])->name('tasks.task.sort');
    Route::put('task/{task}', [TasksController::class, 'update'])->name('tasks.task.update')->where('id', '[0-9]+');
    Route::delete('/task/{task}', [TasksController::class, 'destroy'])->name('tasks.task.destroy')->where('id', '[0-9]+');

});
