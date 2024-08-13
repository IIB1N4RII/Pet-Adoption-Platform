<x-layout>
    
<x-bg-image />
    

<div class="flex justify-center items-center mt-7 mb-3 pt-4">
  <a href="{{route('adoptions.index')}}"
      class="inline-flex items-center font-medium text-3xl text-purple-600 dark:text-purple-500 hover:underline">
      Latest added pets ➜
      
  </a>
</div>

<div class="container mx-auto max-w-5xl p-4 grid grid-cols-3 gap-5">
    
    @foreach ($posts as $post )
      <x-pet-card :$post />
    @endforeach
    
    
</div>

</x-layout>

