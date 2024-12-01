@props(['name', 'description', 'pg_rating', 'rating', 'budget', 'release_date', 'running_time', 'image_id'])

<!-- card -->
<div>
    <!-- Movie name/title and release date -->
    <h4 class="text-2xl font-bold text-gray-900 mb-2 flex justify-center">{{ $name }} ({{ $release_date }})</h4>
    <!-- image justify-center container -->
    <div class="flex justify-center">
        <img class="w-full max-w-xs h-auto object-cover" src="{{asset( 'images\movies/' . $image_id)}}" alt="{{$name}}">
    </div>
    <!-- description and rating -->
    <div>
        <p class="text-gray-800 mt-4">{{ $description }}</p>
        <p class="text-gray-600 mt-1 mb-2">Star Rating: {{ $rating }}/5</p>
    </div>

</div>