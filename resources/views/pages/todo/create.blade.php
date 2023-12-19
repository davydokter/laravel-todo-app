@extends('base.template')
@section('content')
    <section id="todo-create" class="w-full h-full max-w-screen-xl px-8 mx-auto">
        <div class="flex items-center justify-center w-full h-full">
            <form method="POST" action={{ route('todo.store') }} class="flex flex-col gap-y-4">
                @csrf
                <fieldset class="flex flex-col">
                    <label for="title">Title:</label>
                    <x-partials.form.input type="text" name="title" />
                </fieldset>

                <fieldset class="flex flex-col">
                    <label for="description">Description:</label>
                    <x-partials.form.input type="text" name="description" maxlength="255" />
                </fieldset>

                <fieldset class="flex flex-col">
                    <label for="due_date">Due on:</label>
                    <x-partials.form.input type="datetime-local" name="due_date" />
                </fieldset>

                <button type="submit" class="p-2 bg-white border border-green-100">Add todo</button>
            </form>
        </div>
    </section>
@endsection
