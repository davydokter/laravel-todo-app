@extends('base.template')

@section('content')
    <section id="todo-list" class="w-full h-full max-w-screen-xl px-8 mx-auto">
        <div class="flex flex-col items-center justify-center h-full gap-y-12">
            <a class="p-4 bg-white border border-black rounded-lg hover:bg-gray-100" href="{{ route('todo.create') }}">Create
                new ToDo</a>
            <div x-cloak x-data="{ open: 0 }" class="flex flex-col items-center w-full gap-y-4">
                @if (!count($todoList))
                    <div>
                        No To-do list found
                    </div>
                @else
                    @foreach ($todoList as $key => $toDo)
                        @php
                            $key = $key + 1;
                        @endphp

                        <div @class([
                            'flex w-1/2 p-6 bg-white rounded-lg gap-x-2',
                            'border border-green-500' => $toDo->is_completed,
                            'border-red-400 border' =>
                                $toDo->due_date->isPast() && !$toDo->is_completed,
                        ])>
                            <div class="flex items-center gap-x-4">
                                @if ($toDo->due_date->isPast() && !$toDo->is_completed)
                                    <x-icons.clock @class(['w-6 aspect-square text-red-500 shrink-0']) />
                                @endif

                                @if ($toDo->is_completed)
                                    <x-icons.checkmark @class(['w-6 aspect-square shrink-0 text-green-500']) />
                                @endif

                                <p>
                                    {{ $toDo->title }}
                                </p>
                                <p class="line-clamp-4">
                                    {{ $toDo->description }}
                                </p>
                            </div>

                            <div class="ml-auto">
                                <button class="p-2 rounded-lg hover:bg-gray-200 bg-gray-50"
                                    @click="open !== {{ $key }} ? open = {{ $key }} : open = null">
                                    <x-icons.pen />
                                </button>
                            </div>
                        </div>

                        <div x-show="open == {{ $key }}"
                            class="absolute top-0 left-0 grid w-full h-full bg-black/10 place-items-center backdrop-blur-sm">
                            <div class="relative flex flex-col justify-center w-1/2 px-8 rounded-lg h-1/3 bg-blue-50">
                                <h2>
                                    {{ $toDo->title }}
                                </h2>
                                <p>
                                    {{ $toDo->description }}
                                </p>
                                <p>
                                    @if ($toDo->due_date->isPast())
                                        Due: {{ $toDo->due_date->diffForHumans() }}
                                    @else
                                        Due in: {{ $toDo->due_date->diffForHumans() }}
                                    @endif
                                </p>

                                <form action="{{ route('todo.update') }}" method="POST"
                                    class="flex flex-row items-center gap-x-2">
                                    @method('patch')
                                    @csrf
                                    <input hidden name="todo-id" value="{{ $toDo->id }}">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" {{ $toDo->is_completed ? 'checked' : '' }} name="completed">
                                    </label>
                                    <button type="submit" class="px-4 bg-white border hover:bg-gray-200">
                                        Save
                                    </button>
                                </form>


                                <button class="absolute top-0 right-0 p-2 m-4 rounded-lg hover:bg-gray-200 bg-gray-50"
                                    @click="open=null">
                                    <x-icons.cross />
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
