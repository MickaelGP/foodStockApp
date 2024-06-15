@props(['classDiv' => 'mb-3','type' => 'text', 'id' => '', 'name' => 'name', 'placeholder' => '' , 'value' => ''])

<div class="{{ $classDiv }}">
    {{ $slot }}
    <input type="{{ $type }}" {{ $attributes->merge(['class' => 'form-control']) }} id="{{ $id }}" name="{{ $name }}" required placeholder="{{ $placeholder }}" value="{{ $value }}">
</div>
