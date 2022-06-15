<div class="field">
    <label class="label">{{ $title ?? $name }}</label>
    <div class="control">
        <input name="{{ $name }}" class="input @error($name) is-danger @enderror" type="{{ $type ?? 'text' }}"
            placeholder="{{ $title ?? $placeholder }}" value="{{ old($name) }}">
    </div>
    @error($name)<p class="help is-danger">{{ $message }}</p>@enderror
</div>