<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function create(Request $request) {
        $task = new Task();
        $task->task = $request->task;
        $task->save();

        return redirect('/');
    }

    public function complete($id) {
        $task = Task::findOrFail($id);
        $task->completed = true;
        $task->save();

        return redirect('/');
    }

    public function delete($id) {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/');
    }
}
