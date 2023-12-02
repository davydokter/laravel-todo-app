@extends('base.template')

@section('content')
    <section id="todo-list">
        @if (!count($todoList))
            <div>
                No To-do list found
            </div>
        @else
            @foreach ($todoList as $toDo)
                {{ $toDo->title }}
            @endforeach
        @endif
    </section>
@endsection
