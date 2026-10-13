<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    //
    public function show(): View
    {
        $tasks_with_no_due_date = DB::table('tasks')->where('user_id', 1)->whereNull('due_to')->get(); // Replace 1 with the actual user ID
        $tasks_with_due_date = DB::table('tasks')->where('user_id', 1)->whereNotNull('due_to')->orderBy('due_to', 'asc')->get(); // Replace 1 with the actual user ID
        return view('tasks', [
            'name' => "hubert",
            'tasks_with_no_due_date' => $tasks_with_no_due_date,
            'tasks_with_due_date' => $tasks_with_due_date
        ]);
    }

    public function create(): View
    {
        return view('task.create',[]);
    }

    public function save()
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'due_to' => 'nullable|date',
        ]);

        DB::table('tasks')->insert([
            'name' => $data['name'],
            'due_to' => $data['due_to'],
            'completed' => false,
            'user_id' => 1, // Replace with the actual user ID
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/tasks');
    }

    public function edit($id): View
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        return view('task.edit', [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'due_to' => 'nullable|date',
            'completed' => 'boolean',
        ]);

        DB::table('tasks')->where('id', $id)->update([
            'name' => $data['name'],
            'due_to' => $data['due_to'],
            'completed' => $data['completed'] ?? false,
            'updated_at' => now(),
        ]);

        return redirect('/tasks');
    }

    public function destroy($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect('/tasks');
    }

    public function markAsCompleted($id)
    {
        DB::table('tasks')->where('id', $id)->update([
            'completed' => true,
            'updated_at' => now(),
            'completed_at' => now(),
        ]);

        return redirect('/tasks');
    }
}
