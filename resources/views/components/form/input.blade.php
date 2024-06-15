@props(['classDiv' => 'mb-3','type' => 'text', 'id' => '', 'name' => 'name', 'placeholder' => '' , 'value' => ''])

<div class="{{ $classDiv }}">
    {{ $slot }}
    <input type="{{ $type }}" {{ $attributes->class(["form-control", 'is-invalid' => $errors->has($name)]) }} id="{{ $id }}" name="{{ $name }}" required placeholder="{{ $placeholder }}" value="{{ $value }}">
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
