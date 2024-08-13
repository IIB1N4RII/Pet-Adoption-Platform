<x-layout>

    <div class="container mx-auto max-w-5xl p-4 ">

       
            <div class="grid grid-cols-3 gap-5">    
            @forelse($favs as $post )
                
                    <x-pet-card :$post>

                    </x-pet-card>

                
            
        
            @empty
            <div></div>
            

            <div class="rounded-md border border-dashed border-slate-300 p-8">
                <div class="text-center font-medium">
                    No pets Added
                </div>
                <div class="text-center">
                    Add your first Favorite <a class="text-indigo-500 hover:underline"
                        href="{{ route('adoptions.index') }}">here!</a>
                </div>
            </div>
            <div></div>
            @endforelse

    </div>      

        
    </div>

        
</x-layout>