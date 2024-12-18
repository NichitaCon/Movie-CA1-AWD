<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">  
            {{ __('All Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-wrap justify-center gap-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">
                        Movie Details
                    </h3>
                    <x-movie-details
                        :name="$movie->name"
                        :description="$movie->description"
                        :pg_rating="$movie->pg_rating"
                        :rating="$movie->rating"
                        :budget="$movie->budget"
                        :release_date="$movie->release_date"
                        :running_time="$movie->running_time"
                        :image_id="$movie->image_id"
                    />

                    <!-- Production Companies -->
                    @if($movie->prodcompanies->isEmpty())
                        <p class="text-gray-500 mt-6">(No production companies available for this movie.)</p>
                    @else
                        <div class="mt-4">
                            <h3 class="text-xl font-semibold text-gray-800">Production Companies:</h3>
                            <ul class="list-disc ml-5 mt-2">
                                @foreach($movie->prodcompanies as $prodCompany)
                                    <li class="text-gray-700">
                                        <strong>{{ $prodCompany->name }}</strong> - ${{ $prodCompany->company_value }} million
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form to Add New Production Company -->
                    <div class="mt-6">
                        <h3 class="text-xl font-semibold text-gray-800">Add a Production Company:</h3>
                        <form action="{{ route('prodcompanies.store', $movie) }}" method="POST">
                            @csrf
                            <input type="hidden" name="movie_id" value="{{ $movie->id }}">

                            <div class="mt-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
                                <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" required value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="company_value" class="block text-sm font-medium text-gray-700">Company Value ($ millions)</label>
                                <input type="number" id="company_value" name="company_value" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" required value="{{ old('company_value') }}">
                                @error('company_value')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="w-10 h-10 rounded-full flex items-center justify-center bg-blue-100 hover:bg-blue-400 border border-blue-200 hover:border-blue-400 transition duration-300 ">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>