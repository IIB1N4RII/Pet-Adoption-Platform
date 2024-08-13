<x-layout>
    <header class="bg-green-300 p-3 shadow-lg rounded-md">
        <h1 class="text-white text-3xl text-center">Adopted Pets</h1>
    </header>
    <div class="container mx-auto max-w-5xl p-4 grid grid-cols-3 gap-5">
    
        @foreach($posts as $post )
            <x-pet-card :$post />
        @endforeach


    </div>
</x-layout>