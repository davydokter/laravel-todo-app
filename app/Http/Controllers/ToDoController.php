<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToDoRequest;
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
}
