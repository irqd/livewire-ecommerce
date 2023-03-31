<form wire:submit.prevent="updateAccount">
    <button type="submit" class="btn btn-outline-success shadow-sm">
        <i class="fa-solid fa-check"></i> Confirm
    </button>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary shadow-sm">
        Cancel
    </a>
</form>
  
