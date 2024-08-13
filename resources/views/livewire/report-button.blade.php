<div x-data="{ open: @entangle('open') }" class="relative ml-4">
    

    <button @click="open = !open"
        class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-500 focus:outline-none">
        Report
    </button>
    <div x-show="open" @click.away="open = false"
        class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg">
        <a  wire:click.prevent="reportPost('wrong Information')"
            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Wrong Information</a>
        <a  wire:click.prevent="reportPost('Inappropriate')"
            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Inappropriate</a>
        <a  wire:click.prevent="reportPost('Other')"
            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Other</a>
    </div>
</div>