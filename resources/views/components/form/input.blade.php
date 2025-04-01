<input 
    id="{{ $id }}" 
    name="{{ $name }}" 
    type="{{ $type }}" 

    @if ($type === 'checkbox')
        value="1" 
        @if($checked) checked @endif
        class="form-check-input"
    @else
        value="{{ $value }}" 
        placeholder="{{ $placeholder }}" 
        class="form-control" 
        @if ($required) required @endif
    @endif
   
    @if ($disabled) disabled @endif
>