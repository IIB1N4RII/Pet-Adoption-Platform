<x-layout>
    

     <div class="container mx-auto p-4">
         <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
             <div class="flex flex-col md:flex-row">
                 <div class="md:flex-shrink-0">
                     <img class="h-64 w-full object-cover md:h-full md:w-64"
                         src="{{ asset('storage/'.$post->pet_image) }}"
                         alt="Pet Image">
                 </div>
                 <div class="p-6">
                     <div class="flex justify-between">
                        <div class="w-[500px]">
                            <h1 class="text-3xl font-bold text-gray-900 p-2 mb-2">{{ $post->name }}</h1>
                        </div>
                        <div class="">
                            @livewire('report-button', ['postId' => $post->id])
                        </div>
                     </div>

                     <p class="text-gray-700 text-sm">Posted {{ $post->created_at->diffForHumans() }} 
                     
                     <span
                             class="font-semibold">by {{ $post->user->name }}
                    </span>
                    <span
                            class="font-semibold"> {{ $post->user->phone_number }}
                    </span>
                            
                    </p>
                     <p class="mt-4 text-gray-600">{!! nl2br(e(($post->description))) !!}</p>

                     <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-3">
                         <div class="flex items-center">
                             <span class="text-gray-600 font-semibold">Age: </span>
                             <span class="ml-2 text-gray-800">{{ $post->age }}</span>
                         </div>
                         <div class="flex items-center">
                             <span class="text-gray-600 font-semibold">Gender:</span>
                             <span class="ml-2 text-gray-800">{{ $post->gender }}</span>
                         </div>
                         <div class="flex items-center">
                             <span class="text-gray-600 font-semibold">Specie:</span>
                             <span class="ml-2 text-gray-800">{{ $post->animal_type }}</span>
                         </div>
                         <div class="flex items-center">
                             <span class="text-gray-600 font-semibold">Color:</span>
                             <span class="ml-2 text-gray-800">{{ $post->color }}</span>
                         </div>
                         <div class="flex items-center">
                             <span class="text-gray-600 font-semibold">Size:</span>
                             <span class="ml-2 text-gray-800">{{ $post->size }}</span>
                         </div>
                         <div class="flex items-center">
                             <span class="text-gray-600 font-semibold">Breed:</span>
                             <span class="ml-2 text-gray-800">{{ $post->breed }}</span>
                         </div>
                         
                         <div class="flex items-center">
                             <span class="text-gray-600 font-semibold">Location:</span>
                             <span class="ml-2 text-gray-800">{{ $post->location->name }}</span>
                         </div>
                         <div class="flex items-center">
                             <span class="text-gray-600 font-semibold">Status:</span>
                             @if ( $post->is_adopted === 0 )
                                 <div class="flex items-center">
                                     
                                     <span class="ml-2 bg-green-400 rounded-sm text-green-600">Not Adopted Yet👍</span>
                                 </div>
                            @else( $post->is_adopted === 1 )
                                <span class="ml-2 bg-red-300 rounded-sm text-red-600">Adopted !!!</span>
                             
                             @endif
                         </div> 
                     </div>

                     

                     
                 </div>
                 
             </div>

             

             <!-- Comments Section -->
             <div class="p-6 border-t border-gray-200">
                 <h2 class="text-2xl font-semibold text-gray-900 mb-4">Comments</h2>

                @livewire('comments', ['postId' => $post->id])
             </div>
         </div>
     </div>
</x-layout>