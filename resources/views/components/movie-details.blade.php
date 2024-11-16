@props(['name', 'description', 'pg_rating', 'rating', 'budget', 'release_date', 'running_time', 'image_id'])

<!-- component -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">
    <!-- movie Cover Image --> 
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center"> 
        <!-- Image is further restricted to a smaller size --> 
        <img src="{{ asset('images/movies/' . $image_id) }}" alt="{{ $name }}" class="w-full max-w-xs h-auto object-cover"> <!-- Restrict image to max-w-xs (20rem) and ensure responsiveness --> 
    </div>

    <!-- movie title -->
    <h1 class="font-bold text-black-600 mb-2">
        {{$name}} 
    </h1>
    
    <!-- movie description + budget -->
    <h3 class="text-gray-800 font-semibold mb-2">
        {{$description}} and was produced with a budget of {{$budget}}
    </h3>

    <p class="text-gray-600">Rated PG-{{ $pg_rating }}</p>
    <p class="text-gray-800 mt-3">Budget: ${{ $budget }} million</p>
    <p class="text-gray-800 mt-3">Runtime: {{ $running_time }} minutes</p>

</div>