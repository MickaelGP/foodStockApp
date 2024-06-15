@props([
    'divClass' => 'text-center pb-3',
    'type' => 'submit'
])

<div class="{{ $divClass }}">
    <button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn bg-black shadow  text-white']) }}>{{ $slot }}</button>
</div>
