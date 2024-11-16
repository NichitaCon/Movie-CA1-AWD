@props(['name', 'description', 'pg_rating', 'rating', 'budget', 'release_date', 'running_time', 'image_id'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $name }} ({{ $release_date }})</h4>
    <img class="w-full max-w-xs h-auto object-cover" src="{{asset( 'images\movies/' . $image_id)}}" alt="{{$name}}">
    <p class="text-gray-800 mt-3">Star Rating: {{ $rating }}/5</p>
    <p class="text-gray-800 mt-4">{{ $description }}</p>
</div>