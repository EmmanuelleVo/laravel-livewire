<div>
    <label for="per-page">Choose the pagination count</label>
    <select id="per-page" wire:model="perPage">
        @foreach($options as $option)
            <option value="{{ $option }}">{{ $option }}</option>
        @endforeach
    </select>
</div>
