<x-layout>
  
  <div class="container mx-auto max-w-5xl p-4 "> 

        <div class="mb-8 text-right">
           <x-a-link class="bg-purple-700 hover:bg-purple-800" :href="route('posts.create')">
            Add Pet
           </x-a-link>
           
            
        </div>

        @forelse ($pets as $pet )
          
            <x-card
            class="flex h-full w-full  gap-3 mb-4">
                <div class="w-1/3">
                  <img class=" w-full h-full  rounded-2xl"
                      src="{{ asset('storage/'.$pet->pet_image) }}" alt="" />
                </div>
                <div class="w-full h-full p-4">
                   <h5 class="mb-2 text-xl font-medium">{{ $pet->name }}</h5>
                   <p class="mb-4 text-base">
                       {{ $pet->description }}
                   </p>
                   <p class="text-xs text-surface/75 dark:text-neutral-300 mb-4">
                       Posted {{ $pet->created_at->diffForHumans() }}
                   </p>
                   <div class=" mb-4 items-center">
                    <p class="mb-2">Change Status :</p>
                    <div class="">
                      
                        @livewire('adoption-status-button', ['postId' => $pet->id])
                    </div>
                   </div>
                   <div class="flex space-x-2 items-center">
                       <x-a-link class="bg-blue-600 hover:bg-blue-700" :href="route('posts.edit' , $pet)">
                        Edit
                       </x-a-link>

                       <form method="post" action="{{ route('posts.destroy' , $pet) }}">
                           @csrf
                           @method('DELETE')
                           <x-btn class="bg-red-600 hover:bg-red-700">Delete</x-btn>
                       </form>

                       <x-a-link :href="route('pets.show' , $pet)"
                       class="bg-green-500 hover:bg-green-600">
                        Show
                      </x-a-link>

                      
                      
                </div>
          </x-card>


          
      
        @empty
          <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
              No pets posted
            </div>
            <div class="text-center">
              Post your first pet <a class="text-indigo-500 hover:underline"
                href="{{ route('posts.create') }}">here!</a>
            </div>
          </div>
        @endforelse
      </div>

      
</x-layout>