<x-layout>
    <div class =" ">
 <form action="{{ route('adoptions.index') }}" method="get">
            <div class=" grid grid-cols-3 items-center">
                
            
            <div></div>
            <div class=" w-full items-center mt-4 ">
                <label for="search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search" name="search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for pets name..."  />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </div>
        
        
                <div>
                    <div class="pl-52">
                        <label for="sort" class="block text-sm font-medium text-gray-700">Sort By:</label>
                        <select id="sort" name="sort"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12">
                            <option value="latest"
                                {{ request('sort') == 'latest' ? 'selected' : '' }}>
                                Latest</option>
                            <option value="oldest"
                                {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                                Oldest</option>
                            <option value="last_month"
                                {{ request('sort') == 'last_month' ? 'selected' : '' }}>
                                Last Month</option>
                            <option value="random"
                                {{ request('sort') == 'random' ? 'selected' : '' }}>
                                Randomize</option>
                        </select>
                    </div>
                </div>
        

        </div>
        

        

    </div>

    <div class="flex gap-3 ">

    <div class="w-1/3 ">
        <div class="">
            <h3 class="text-2xl text-slate-500 mb-3">Filters</h3>
            
                <label for="animal_type"
                    class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Choose Pet Species</label>
                <select name="animal_type" id="animal_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4">
                    <option value="any"
                        {{ request('animal_type') == 'any' ? 'selected' : '' }}>
                        any</option>
                    <option value="Cat"
                        {{ request('animal_type') == 'Cat' ? 'selected' : '' }}>
                       Show Only Cats</option>
                    <option value="Dog"
                        {{ request('animal_type') == 'Dog' ? 'selected' : '' }}>
                        Show Only Dogs</option>
                    <option value="Others"
                        {{ request('animal_type') == 'Others' ? 'selected' : '' }}>
                       Show Others</option>
                </select>
                

            

            <label for="age" class="block  text-sm font-medium text-gray-900 dark:text-white mb-1">Age</label>
            <select name="age" id="age"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4">
                <option value="any"
                    {{ request('age') == 'any' ? 'selected' : '' }}>
                    any</option>
                <option value="puppy"
                    {{ request('age') == 'puppy' ? 'selected' : '' }}>
                    Puppy</option>
                <option value="young"
                    {{ request('age') == 'young' ? 'selected' : '' }}>
                    Young</option>
                <option value="adult"
                    {{ request('age') == 'adult' ? 'selected' : '' }}>
                    Adult</option>
                <option value="senior"
                    {{ request('age') == 'senior' ? 'selected' : '' }}>
                    Senior</option>
            </select>


            <label for="gender" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Gender</label>
            <select name="gender" id="gender"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4">
                <option value="any"
                    {{ request('gender') == 'any' ? 'selected' : '' }}>
                    any</option>
                <option value="male"
                    {{ request('gender') == 'male' ? 'selected' : '' }}>
                    Male</option>
                <option value="female"
                    {{ request('animal_type') == 'female' ? 'selected' : '' }}>
                    Female</option>
                
            </select>


            <label for="color" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Color</label>
            <select name="color" id="color"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4">
                <option value="any"
                    {{ request('color') == 'any' ? 'selected' : '' }}>
                    any</option>
                <option value="sable"
                    {{ request('color') == 'sable' ? 'selected' : '' }}>
                    sable</option>
                <option value="golden"
                    {{ request('color') == 'golden' ? 'selected' : '' }}>
                    golden</option>
                <option value="harlequin"
                    {{ request('color') == 'harlequin' ? 'selected' : '' }}>
                    harlequin</option>
                <option value="brindle"
                    {{ request('color') == 'brindle' ? 'selected' : '' }}>
                    brindle</option>
                <option value="black"
                    {{ request('color') == 'black' ? 'selected' : '' }}>
                    black</option>
                <option value="bicolor"
                    {{ request('color') == 'bicolor' ? 'selected' : '' }}>
                    bicolor</option>
                <option value="Apricot/Beige"
                    {{ request('color') == 'Apricot/Beige' ? 'selected' : '' }}>
                    Apricot / Beige</option>
                <option value="White/Cream"
                    {{ request('color') == 'White/Cream' ? 'selected' : '' }}>
                    White / Cream</option>
                <option value="Yellow/Tan/Blond/Fawn"
                    {{ request('color') == 'Yellow/Tan/Blond/Fawn' ? 'selected' : '' }}>
                    Yellow / Tan / Blond / Fawn</option>
            </select>


            <label for="size" class="block  text-sm font-medium text-gray-900 dark:text-white mb-1">Size</label>
            <select name="size" id="size"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4">
                <option value="any"
                    {{ request('size') == 'any' ? 'selected' : '' }}>
                    any
                </option>
                <option value="small"
                    {{ request('size') == 'small' ? 'selected' : '' }}>
                    Small
                </option>
                <option value="medium"
                    {{ request('size') == 'medium' ? 'selected' : '' }}>
                    Medium
                </option>
                <option value="large"
                    {{ request('size') == 'large' ? 'selected' : '' }}>
                    Large
                </option>
                <option value="extra_large"
                    {{ request('size') == 'extra_large' ? 'selected' : '' }}>
                    extra large
                </option>

            </select> 


        @php
            $locations = \App\Models\Location::all();
        @endphp

        <label for="location_id" class="block  text-sm font-medium text-gray-900 dark:text-white mb-1">Location</label>
        <select name="location_id" id="location_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">All Locations</option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}"
                    {{ request('location_id') == $location->id ? 'selected' : '' }}>
                    {{ $location->name }}</option>
            @endforeach
        </select>

            
            
             <div class="mt-3 ">
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">

                    Filter
                </button>
             </div>
 
</form>

        </div>

        
    </div>
    <div class="w-full p-4 mt-4">
        
    <div class="grid grid-cols-3 gap-5 ">
        @foreach($posts as $post )
            <x-pet-card :$post>
            
            </x-pet-card>
        
        @endforeach
        
    </div>  
    <div class="mt-5">
        {{ $posts->appends(request()->except('page'))->links() }}
    </div>
    </div>
    
        
    </div>
</x-layout>