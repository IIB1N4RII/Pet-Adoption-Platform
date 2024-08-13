<section style="background-image: url({{ asset('images/slider_8.jpg') }})"
    class="bg-center bg-no-repeat h-[450px] bg-cover bg-gray-700 bg-blend-multiply rounded-xl flex items-center justify-center">
    <div class="px-4 mx-auto text-center">
        <h1 class="p-4 mb-4 text-3xl font-extrabold tracking-tight leading-none text-white md:text-4xl lg:text-5xl">
            Find Your New Best Friend</h1>

        <form action="{{ route('adoptions.index') }}" method="get" class="max-w-md mx-auto">
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input  id="search" name="search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-600 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-600 dark:focus:border-purple-600 mb-4"
                    placeholder="Search for pets name..."  />
                <x-btn type="submit"
                    class="absolute bg-purple-700 hover:bg-purple-800">Search
                </x-btn >
                
            </div>
        
        </form>
            <div>
                <div class="flex m-2 p-2 max-w-md mx-auto">

                    <div class="bg-gray-300 m-4 p-4 rounded-lg  h-full w-full  hover:bg-slate-100" ">
                        <div class="grid grid-cols-1 ">
                            <div>
                                <form action="{{ route('adoptions.index') }}" method="get">
                                    <input type="hidden" name="animal_type" value="cat">
                                    <button type="submit">
                                        <img src="/images/cat.png" alt="Cat logo" class="h-14 w-full" />
                                    </button>
                                </form>
                            </div>
                            <div>
                                <p class="">Cats</p>
                            </div>
                            
                        </div>    
                    </div>

                    <div class="bg-gray-300 p-4 rounded-lg m-4 h-full w-full  hover:bg-slate-100"">
                        <div class="grid grid-cols-1 ">
                            <div>
                                <form action="{{ route('adoptions.index') }}" method="get"> 
                                    <input type="hidden" name="animal_type" value="dog">
                                    <button type="submit">
                                        <img src="/images/dog.png" alt="dog logo" class="h-14 w-full" />
                                    </button>
                                </form>
                            </div>
                            <div>
                                <p class="">Dogs</p>
                            </div>

                        </div>

                    </div>

                    <div class="bg-gray-300 p-4 rounded-lg m-4 h-full w-full hover:bg-slate-100" ">
                        <div class="grid grid-cols-1 ">
                            <div>
                                <form action="{{ route('adoptions.index') }}" method="get">
                                    <input type="hidden" name="animal_type" value="others">
                                    <button type="submit">
                                        <img src="/images/paw.png" alt="other logo" class="h-14 w-full" />
                                    </button>
                                </form>
                            </div>
                            <div>
                                <p class="">Others</p>
                            </div>

                        </div>

                    </div>

            </div>
        
        
            
                

            
        </div>
    </div>
</section>
