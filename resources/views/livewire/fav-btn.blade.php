<div>
    <button type="button" wire:click.prevent="toggleFavorite({{$post}})"
        class="flex items-center justify-center w-12 h-12 rounded-full bg-white border border-gray-300 hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current transition duration-300 ease-in-out"
            :class="{'text-red-500': {{ $liked ? 'true' : 'false' }}, 'text-gray-500': {{ $liked ? 'false' : 'true' }}}"
            viewBox="0 0 24 24">
            <path
                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
        </svg>
    </button>

    
</div>