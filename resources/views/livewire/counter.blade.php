<div>
    <form wire:submit.prevent="submit">

    <input type="text" wire:model="comment">

    @error('comment') <span class="error">{{ $message }}</span> @enderror



    <button type="submit">Save Comment</button>

</form>
</div>
