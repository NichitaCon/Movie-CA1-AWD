@props(['name', 'description', 'pg_rating', 'rating', 'budget', 'release_date', 'running_time', 'image_id'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <img src="{{asset( 'public\images\movies' . $image_id)}}" alt="{{$name}}">
    <p class="text-gray-600">Pg rating: {{ $pg_rating }}</p>
    <p class="text-gray-800 mt-3">Rating: {{ $rating }}</p>
    <p class="text-gray-800 mt-4">{{ $description }}</p>
    <p class="text-gray-800 mt-3">budget: {{ $budget }}</p>
    <p class="text-gray-800 mt-3">Release year: {{ $release_date }}</p>
    <p class="text-gray-800 mt-3">Runtime: {{ $running_time }} minutes</p>
</div>