<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">  
            {{ __('All Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>