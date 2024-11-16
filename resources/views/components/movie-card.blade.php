@props(['name', 'description', 'pg_rating', 'rating', 'budget', 'release_date', 'running_time', 'image_id'])

<!-- card -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <!-- Movie name/title and release date -->
    <h4 class="text-2xl font-bold text-gray-900 mb-2 flex justify-center">{{ $name }} ({{ $release_date }})</h4>
    <!-- image justify-center container -->
    <div class="flex justify-center">
        <img class="w-full max-w-xs h-auto object-cover" src="{{asset( 'images\movies/' . $image_id)}}" alt="{{$name}}">
    </div>
    <!-- description and rating -->
    <p class="text-gray-800 mt-4">{{ $description }}</p>
    <p class="text-gray-600 mt-1">Star Rating: {{ $rating }}/5</p>
</div>