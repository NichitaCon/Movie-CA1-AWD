<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('All Movies') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="w-4/5 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Movies:</h3>
                    <div class="flex flex-wrap justify-center gap-6">
                        <!-- Loop that goes through each movie in the database -->
                        @foreach ($movies as $movie)
                            <div class="border rounded-lg shadow-md p-6 flex flex-col max-w-md bg-white hover:shadow-lg transition duration-300">
                                <a href="{{ route('movies.show',  $movie) }}">
                                    <x-movie-card
                                        :name="$movie->name"
                                        :description="$movie->description"
                                        :pg_rating="$movie->pg_rating"
                                        :rating="$movie->rating"
                                        :budget="$movie->budget"
                                        :release_date="$movie->release_date"
                                        :running_time="$movie->running_time"
                                        :image_id="$movie->image_id"
                                    />
                                </a>
                                
                                <!-- Edit and delete buttons container -->
                                <div class="mt-4 flex w-full justify-around space-x-2 mt-auto">

                                    <!-- Edit button/ Used the Movies object id so the right movie is edited -->
                                    <a href="{{ route('movies.edit', $movie) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 transition duration-300 rounded">
                                        Edit!
                                    </a>
                                    
                                    <form action="{{ route('movies.destroy', $movie)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 transition duration-300 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>