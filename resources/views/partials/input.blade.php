@php
    $feedBack ??= false;
    $needLabel ??= false;
    $isRequired = isset($isRequired) ? $isRequired : true;
    $isDisabled = isset($isDisabled) ? $isDisabled : false;
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $id ??= $name.ucfirst($type);
    $value ??= '';
    $messagePerso ??= 'Le champ n\'est pas conforme';
    $placeholder ??= ucfirst($name);
    $label ??= ucfirst($name);
@endphp
    @if ($needLabel)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    @if ($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}"
                  id="{{ $id }}" placeholder="{{ $placeholder }}" @if($isRequired) required @endif @if($isDisabled) disabled @endif>
        {{ old($name, $value) }}
    </textarea>
    @elseif($type === 'file')
        <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}" name="{{ $name }}[]" multiple>
    @else
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}"
               name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $id }}"
               placeholder="{{ $placeholder }}" @if($isRequired) required @endif @if($isDisabled) disabled @endif>
    @endif
    @if ($feedBack)
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    @else
        <div class="invalid-feedback">
            <strong> {{ $messagePerso }} </strong>
        </div>
    @endif

