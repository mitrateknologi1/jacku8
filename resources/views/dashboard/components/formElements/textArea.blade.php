<label for="TextInput" class="form-label my-2">{{ $label }} {!! $wajib ?? '' !!}</label>
<textarea id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" class="form-control {{ $class ?? '' }}"
    {{ $attribute ?? '' }} placeholder="{{ $placeholder ?? '' }}">{{ $value ?? '' }}</textarea>
<span class="text-danger error-text {{ $name }}-error"></span>
