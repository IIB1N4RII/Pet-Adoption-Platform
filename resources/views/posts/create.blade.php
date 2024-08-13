<x-layout>
    

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mx-auto max-w-5xl p-4">
            <div class=" grid gap-6 mb-6 md:grid-cols-2">
                <div >
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pet name</label>

                    <input name="name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Pets name" required value="{{old('name')}}" />
                    @error('name')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="pet_image">Upload image</label>

                <input name="pet_image"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help" id="pet_image" type="file" 
                    value="{{ old('pet_image') }}">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG  (MAX. 800x400px).</p>
                @error('pet_image')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror

                </div>

                <div>
                    
        
                <label for="animal_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Species</label>
                <select name="animal_type" id="animal_type" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                    
                    <option value="any"
                        {{ old('animal_type') == 'any' ? 'selected' : '' }}>
                        any</option>
                    <option value="Cat"
                        {{ old('animal_type') == 'Cat' ? 'selected' : '' }}>
                        Cat</option>
                    <option value="Dog"
                        {{ old('animal_type') == 'Dog' ? 'selected' : '' }}>
                        Dog</option>
                    <option value="Others"
                        {{ old('animal_type') == 'Others' ? 'selected' : '' }}>
                        Others</option>
                    
                </select>
                @error('animal_type')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
        

                </div>

                <div>
                    
                    <label for="description" 
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea name="description" id="description" rows="1" 
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe your pets here..."></textarea>
                    @error('description')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                
                <div>
                    
        
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                <select name="gender" id="gender" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <option value="any"
                        {{ old('gender') == 'any' ? 'selected' : '' }}>
                        any
                    </option>
                    <option value="male"
                        {{ old('gender') == 'male' ? 'selected' : '' }}>
                        male
                    </option>
                    <option value="female"
                        {{ old('gender') == 'female' ? 'selected' : '' }}>
                        female
                    </option>
                    
                </select>
                    @error('gender')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
        

                </div>


                <div>
                    
            
                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                <select name="age"  id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="any"
                        {{ old('age') == 'any' ? 'selected' : '' }}>
                        Any
                    </option>
                    <option value="puppy"
                        {{ old('age') == 'puppy' ? 'selected' : '' }}>
                        Puppy
                    </option>
                    <option value="young"
                        {{ old('age') == 'young' ? 'selected' : '' }}>
                        Young
                    </option>
                    <option value="adult"
                        {{ old('age') == 'adult' ? 'selected' : '' }}>
                        Adult
                    </option>
                    <option value="senior"
                        {{ old('age') == 'senior' ? 'selected' : '' }}>
                        Senior
                    </option>
                    
                </select>
                @error('age')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            

                </div>
                
                <div>
                    
                
                <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                <select name="color" id="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="any"
                        {{ old('color') == 'any' ? 'selected' : '' }}>
                        any
                    </option>
                    <option value="sable"
                        {{ old('color') == 'sable' ? 'selected' : '' }}>
                        sable
                    </option>
                    <option value="golden"
                        {{ old('color') == 'golden' ? 'selected' : '' }}>
                        golden
                    </option>
                    <option value="harlequin"
                        {{ old('color') == 'harlequin' ? 'selected' : '' }}>
                        harlequin
                    </option>
                    <option value="brindle"
                        {{ old('color') == 'brindle' ? 'selected' : '' }}>
                        brindle
                    </option>
                    <option value="black"
                        {{ old('color') == 'black' ? 'selected' : '' }}>
                        black
                    </option>
                    <option value="bicolor"
                        {{ old('color') == 'bicolor' ? 'selected' : '' }}>
                        bicolor
                    </option>
                    <option value="Apricot / Beige"
                        {{ old('color') == 'Apricot / Beige' ? 'selected' : '' }}>
                        Apricot / Beige
                    </option>
                    <option value="White / Cream"
                        {{ old('color') == 'White / Cream' ? 'selected' : '' }}>
                        White / Cream
                    </option>
                    <option value="Yellow / Tan / Blond / Fawn"
                        {{ old('color') == 'Yellow / Tan / Blond / Fawn' ? 'selected' : '' }}>
                        Yellow / Tan / Blond / Fawn
                    </option>
                    
                </select>
                @error('color')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            

                </div>
                

                <div>
                    <label for="size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
                <select name="size" id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="any"
                        {{ old('size') == 'any' ? 'selected' : '' }}>
                        any
                    </option>
                    <option value="small"
                        {{ old('size') == 'small' ? 'selected' : '' }}>
                        small
                    </option>
                    <option value="medium"
                        {{ old('size') == 'medium' ? 'selected' : '' }}>
                        medium
                    </option>
                    <option value="large"
                        {{ old('size') == 'large' ? 'selected' : '' }}>
                        large
                    </option>
                    <option value="extra_large"
                        {{ old('size') == 'extra large' ? 'selected' : '' }}>
                        extra large
                    </option>
                    
                </select>
                </div>
                @error('size')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
                
                <div >
                    <label for="breed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Breed</label>
                    <input name="breed" type="text" id="breed" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Pets breed" required />
                    @error('breed')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    @php
                        $locations = \App\Models\Location::all();
                    @endphp

                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                    <select name="location_id" id="location" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                        <option value=""
                            {{ old('location_id') == '' ? 'selected' : '' }}>
                            Select a location</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}"
                                {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                @error('location')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror

                

                <div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-7">Submit</button>
                </div>
                
                </div>

                <div id="map" style="height: 500px;"></div>
            
            
        </div>
        </form>

</x-layout>