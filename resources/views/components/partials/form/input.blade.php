@props(['id', 'name', 'type', 'value' => null])

<input
    {{ $attributes->merge([
            'id' => $name,
            'type' => $type,
            'name' => $name,
            'value' => $value ? $value : old($name),
        ])->class([
            'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500' => $errors->has(
                $name,
            ),
        ]) }} />

<ul class="list-disc">
    @foreach ($errors->get($name) as $error)
        <li class="list-disc text-red-900">{{ $error }}</li>
    @endforeach
</ul>
