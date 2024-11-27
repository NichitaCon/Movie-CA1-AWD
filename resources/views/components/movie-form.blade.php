@props(['action', 'method', 'movie'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif
    
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $movie->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <input
            type="text"
            name="description"
            id="description"
            value="{{ old('description', $movie->description ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="rating" class="block text-sm text-gray-700">Star rating</label>
        <input
            type="text"
            name="rating"
            id="rating"
            value="{{ old('rating', $movie->rating ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('rating')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="pg_rating" class="block text-sm text-gray-700">Pg rating</label>
        <input
            type="text"
            name="pg_rating"
            id="pg_rating"
            value="{{ old('pg_rating', $movie->pg_rating ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('pg_rating')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="budget" class="block text-sm text-gray-700">Budget</label>
        <input
            type="text"
            name="budget"
            id="budget"
            value="{{ old('budget', $movie->budget ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('budget')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="release_date" class="block text-sm text-gray-700">Release date</label>
        <input
            type="text"
            name="release_date"
            id="release_date"
            value="{{ old('release_date', $movie->release_date ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('release_date')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="running_time" class="block text-sm text-gray-700">Running_time</label>
        <input
            type="text"
            name="running_time"
            id="running_time"
            value="{{ old('running_time', $movie->running_time ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('running_time')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image_id" class="block text-sm font-medium text-gray-700">Movie Image</label>
        <input 
            type="file"
            name="image_id"
            id="image_id"
            {{ isset($movie) ? '' : 'required'}}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($movie->image_id)
        <div class="mb-4">
            <img src="{{ asset('images/movies/' . $movie->image_id)}}" alt="Movie image" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($movie) ? 'Update Movie' : 'Add Movie'}}
        </x-primary-button>
    </div>
</form>