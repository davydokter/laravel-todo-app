<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToDoRequest;
use App\Http\Requests\UpdateToDoRequest;
use App\Models\ToDo;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ToDoController extends Controller
{
    public function show(): View
    {
        $todoList = ToDo::all();

        return view('pages.todo.show', [
            'todoList' => $todoList
        ]);
    }

    public function create(): View
    {
        return view('pages.todo.create');
    }

    public function store(StoreToDoRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        ToDo::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
        ]);

        return redirect(route('todo.show'))->with('status', $validated);
    }

    public function update(UpdateToDoRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        abort_if(!isset($validated['todo-id']), '500');

        $toDo = ToDo::findOrFail($validated['todo-id']);

        if (isset($validated['completed']) && $validated['completed'] === 'on') {
            $toDo->update([
                'is_completed' => true
            ]);

            return redirect(route('todo.show'));
        } else {
            $toDo->update([
                'is_completed' => false
            ]);

            return redirect(route('todo.show'));
        };
    }
}
