@extends('base.template')
@section('content')
    <section id="todo-create">
        <div>
            <form method="POST" action={{ route('todo.store') }}>
                @csrf
                <fieldset>
                    <label for="title">Title:</label>
                    <x-partials.form.input type="text" name="title" />
                </fieldset>

                <fieldset>
                    <label for="description">Description:</label>
                    <x-partials.form.input type="text" name="description" />
                </fieldset>

                <fieldset>
                    <label for="due_date">Due on:</label>
                    <x-partials.form.input type="datetime-local" name="due_date" />
                </fieldset>

                <button type="submit" class="border p-2 bg-white border-green-100">Add todo</button>
            </form>
        </div>
    </section>
@endsection
