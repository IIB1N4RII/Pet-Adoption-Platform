<button wire:click="toggleAdoptionStatus"
    class="px-4 py-2 font-bold text-white {{ $isAdopted ? 'bg-red-600 hover:bg-red-500' : 'bg-green-500 hover:bg-green-700' }} rounded">
    {{ $isAdopted ? 'Is Adopted' : 'Not Adopted' }}
</button>