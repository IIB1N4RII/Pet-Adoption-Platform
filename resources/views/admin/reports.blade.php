<x-layout>
   <div class="container mx-auto max-w-5xl p-4">
       <h1 class="text-2xl font-bold mb-6">Reported Posts</h1>

       

       @foreach($reports as $report)
           <div class="bg-white shadow rounded-lg p-6 mb-4">
               <h2 class="text-xl font-semibold mb-2">Post by: {{ $report['post']->user->name }}
               </h2>
               
               <p><strong>Total Reports:</strong> {{ $report['totalReports'] }}</p>
               <p><strong>Report Reasons:</strong></p>
               <ul class="list-disc list-inside">

                    @if(isset($report['reasonsCount']) && $report['reasonsCount']->isNotEmpty())
                        
                    
                        @foreach($report['reasonsCount'] as $reason => $count)
                            <li>{{ $reason }}: {{ $count }}</li>
                        @endforeach
                    @else
                        <li>No specific reasons reported.</li>
                    @endif
               </ul>

               <div class="mt-4 space-x-2">
                   <form 
                       action="{{ route('admin.reports.ignore', $report['post']) }}"
                       method="POST" class="inline-block">
                       @csrf
                       <x-btn class="bg-blue-600 hover:bg-blue-700">
                           Ignore
                       </x-btn>
                   </form>
                   <form
                       action="{{ route('admin.reports.delete', $report['post']) }}"
                       method="POST" class="inline-block ">
                       @csrf
                       @method('DELETE')
                       <x-btn class="bg-red-600 hover:bg-red-700">
                           Delete Post
                       </x-btn>
                   </form>
                   <x-a-link :href="route('pets.show', $report['post'])" class="bg-green-500 hover:bg-green-600">
                       View Post
                   </x-a-link>
               </div>
           </div>
       @endforeach
   </div>
</x-layout>